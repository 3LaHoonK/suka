<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\tagRequest;
use App\Models\Dashbord\brand;
use App\Models\Dashbord\Category;
use App\Models\Dashbord\CategoryTranslation;
use App\Models\Dashbord\Product;
use App\Models\Dashbord\Tag;
use App\Models\Dashbord\TagTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tagController extends Controller
{
    // get html for view,add,edit tags

    public function view(){

        $data = Tag::OrderBy('id','DESC')->paginate(20) ;
        return view('dashbord.tags.view',compact('data'));
    }
    public function select($action){
        try{
            if($action == 'active'){
                $data = Tag::OrderBy('id','DESC')->paginate(15)->where('is_active',1);
            }if($action == 'inactive'){
                $data = Tag::OrderBy('id','DESC')->paginate(15)->where('is_active',0);
            }
            return view('dashbord.tags.view',compact('data'));
        }catch (\Exception $ex){
            return redirect()->route('admin.tags');
        }

    }
    public function createForm(){
        $data = ["brand"=>'brand',"cat"=>'category'];
        $ax = 'Brand';
        $cat = Category::select()->get();
        $brand = brand::select()->get();
        return view('dashbord.tags.add',compact(['cat','brand','data','ax']));
    }
    public function detail($slug ){
        $data = Tag::OrderBy('id', 'DESC')->where('slug',$slug)->get()[0];
        return view('dashbord.tags.detail',compact('data'));
    }
    public function editForm($slug){
        try{
            $data = Tag::OrderBy('id', 'DESC')->where('slug',$slug)->get()[0];
            if ($data->brand_id == true){
                $selectData = brand::select()->get();
                $selectName = 'brand';
            }
            if ($data->category_id == true){
                $selectData = Category::select()->get();
                $selectName = 'category';
            }
            if ($data ->producrt_id == true) {
                $selectData = Product::select()->get();
                $selectName = 'product';
            }
            $selectId = $selectName . "_id";
            $dataTranslation = TagTranslation::OrderBy('id', 'DESC')->where('tag_id',$data->id)->get();
            return view('dashbord.tags.edit',compact(['data','selectData','selectName','dataTranslation','selectId']));

        }catch(Exception $ex){
            $alert = __('admin/tag.error-cat-edit') ;
            return redirect()->route('admin.tags')->with(['error' => $alert]);
        }

    }

//    // check for add , edittags

    public function storeDb(tagRequest $request ){
        try {

            DB::beginTransaction();
            $data = $request->except(['_token','lang','type']);
            $tag_id = Tag::insertGetId($data);
            $cat = [];
            foreach ($request->lang as $data){
                $arr[]=[
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'locale' => $data['locale'],
                    'tag_id' => $tag_id,
                ];
            }
            TagTranslation::insert($arr);

            DB::commit();
            $alert = __('admin/tags/add.success-tag-add');
            return redirect()->route('admin.tags')->with(['success' => $alert]);
        }catch(\Exception $ex){
            return $ex ;
//            DB::rollback();
            $alert = __('admin/tag/add.error-tag-add');
            return redirect()->route('admin.tags')->with(['error' => $alert]);
        }
    }

    public function updateDb($id,tagRequest $request){

        try{
            if($id){
                $update = Tag::find($id);
                $update->update($request->except(['_token','lang']));
                foreach ($request->lang as $data){
                    TagTranslation::where('tag_id',$id)->update([
                        'name' => $data['name'],
                        'description' => $data['description']
                    ]);
                }
                $alert = __('admin/tag.success-tag-edit') ;
                return redirect()->route('admin.tags')->with(['success' => $alert]);
            }
        }catch(\Exception $ex){
            return $ex;
            $alert = __('admin/tag.error-tag-edit') ;
            return redirect()->route('admin.tags')->with(['error'=>$alert]);
        }
    }
    public function isActive($id){
        $check = tag::find($id);
        if(!$check){
            return redirect()->route('admin.error');
        }
        try{
            $active = $check -> is_active == 1 ? 0 : 1 ;
            tag::where('id',$id)->update(['is_active' => $active]);
            $action = $active == 1 ? 'active' : 'inactive' ;
            $alert = __('admin/tag.success-tag-' .$action) ;
            return redirect()->back()->with(['success' => $alert]);
        }catch(\Exception $ex){
            $alert = __('admin/tag.error-tag-' . $action) ;
            return redirect()->back()->with(['error' => $alert]);
        }
    }
    public function delete($id){
        $categorie = tag::find($id);
        if(!$categorie){
            return redirect()->route('admin.error');
        }
        try{
            $categorie -> delete();
            $alert = __('admin/tag.success-tag-delete') ;
            return redirect()->back()->with(['success' => $alert]);
        }catch(Exception $ex){
            $alert = __('admin/tag.error-tag-delete') ;
            return redirect()->back()->with(['error' => $alert]);
        }
    }
}
