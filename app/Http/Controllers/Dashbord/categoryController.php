<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\CategoriesRequest;
use App\Models\Dashbord\Category;
use App\Models\Dashbord\CategoryTranslation;
use App\Http\Enumerations\CategoryType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class categoryController extends Controller
{
    // get html for view,add,edit categories

    public function view($type){
        try {

           $category = $type == 'main' ? Category::OrderBy('id','DESC')->where('parent_id',null)->paginate(20)->all() :
                        Category::OrderBy('id','DESC')->paginate(20)->where('parent_id',true);
           return view('dashbord.categories.view',compact(['category','type']));

        }catch (\Exception $ex){
            return redirect()->route('Dashbord');
        }
    }
    public function select($type , $action){
        try{
        if($action == 'active'){
            $category = $type == 'main' ? Category::OrderBy('id','DESC')->where('parent_id',null)->where('is_active',1)->paginate(15) :
                    Category::OrderBy('id','DESC')->paginate(15)->where('parent_id',true)->where('is_active',1);
        }if($action == 'inactive'){
            $category = $type == 'main' ? Category::OrderBy('id','DESC')->where('parent_id',null)->where('is_active',0)->paginate(15) :
                Category::OrderBy('id','DESC')->paginate(15)->where('parent_id',true)->where('is_active',0);
        }
        return view('dashbord.categories.view',compact(['category','type']));
        }catch (\Exception $ex){
         return redirect()->route('admin.categories',$type);
        }

    }
    public function createForm($type){
        $category = Category::select('id','parent_id')->get();
        return view('dashbord.categories.add',compact(['type','category']));
    }
    public function detail($type,$id ){
        $category = Category::orderBy('id', 'DESC')->find($id);
        return view('dashbord.categories.detail',compact(['category','type']));
    }
    public function editForm($type , $slug){
        try{

            $catSelect = $type == 'sub' ?  Category::orderBy('id', 'DESC')->get() : '';
            $category = Category::orderBy('id', 'DESC')->where('slug',$slug)->get()[0];
            $catTrans = CategoryTranslation::where('category_id',$category->id)->select()->get();
            return view('dashbord.categories.edit',compact(['catSelect','category','catTrans','type']));

        }catch(Exception $ex){
            $alert = __('admin/category.error-cat-edit') ;
            return redirect()->route('admin.categories')->with(['error' => $alert]);
        }

    }

//     check for add , editCategories

    public function storeDb(categoriesRequest $request , $type){

        try {
            $request -> image = $request->has('image') ? uploadeImage('mainCategory',$request->image) : '' ;
        DB::beginTransaction();
           $data = $request->except(['_token','category']);
            $category_id = Category::insertGetId($data);
            $cat = [];
           foreach ($request->category as $category){
                $cat[]=[
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'locale' => $category['locale'],
                    'category_id' => $category_id,
               ];
           }
            CategoryTranslation::insert($cat);

        DB::commit();
               $alert = __('admin/category.success-cat-add');
               return redirect()->route('admin.categories',$type)->with(['success' => $alert]);
           }catch(\Exception $ex){
            return $ex ;
                DB::rollback();
               $alert = __('admin/category.error-cat-add');
               return redirect()->route('admin.categories',$type)->with(['error' => $alert]);
           }
    }

    public function updateDb($type,$id,categoriesRequest $request){

        try{
            if($id){
                $updateCat = Category::find($id);
                $updateCat->update($request->except(['_token','category','type','image']));
                if(isset($request -> image )){
                    $filePath = $request->has('image') ? uploadeImage('mainCategory',$request->image) : '' ;
                    $updateCat->update(['image'=>$filePath]);
                }

                foreach($request->category as  $category){
                    CategoryTranslation::where('id',$category['id'])->update([
                    'name'=>$category['name'],
                    'description'=> $category['description']
                    ]);
                }
            $alert = __('admin/category.success-cat-edit') ;
            return redirect()->route('admin.categories',$type)->with(['success' => $alert]);
            }
        }catch(\Exception $ex){
            $alert = __('admin.error-cat-edit') ;
            return redirect()->route('admin/category.categories',$type)->with(['error'=>$alert]);
        }
    }
    public function isActive($type , $id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('admin.error');
        }
        try{
            $active = $category -> is_active == 1 ? 0 : 1 ;
             Category::where('id',$id)->update(['is_active' => $active]);
            $action = $active == 1 ? 'active' : 'inactive' ;
                    $alert = __('admin/category.success-cat-' . $action ) ;
            return redirect()->back()->with(['success' => $alert]);
        }catch(\Exception $ex){
            $alert = __('admin/category.error-cat-'. $action ) ;
            return redirect()->back()->with(['error' => $alert]);
        }
    }
    public function deleteCategorie($id){
        $categorie = Category::find($id);
        if(!$categorie){
            return redirect()->route('admin.error');
        }
        try{
            $categorie -> delete();
            $alert = __('admin.success-cat-delete') ;
            return redirect()->route('admin/category.viewcategories')->with(['success' => $alert]);
        }catch(Exception $ex){
            $alert = __('admin.error-cat-delete') ;
            return redirect()->route('admin/category.viewcategories')->with(['error' => $alert]);
        }
    }
}
