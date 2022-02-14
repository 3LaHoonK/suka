<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\VendorRequest;
use App\Models\Dashbord\Category;
use App\Models\Dashbord\vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vendorController extends Controller
{
    // get html for view,add,edit vendors

    public function view(){

        $data = vendor::OrderBy('id','DESC')->paginate(20) ;
        return view('dashbord.vendors.view',compact('data'));
    }
    public function select($action){
        try{
            if($action == 'active'){
                $data = vendor::OrderBy('id','DESC')->paginate(15)->where('is_active',1);
            }if($action == 'inactive'){
                $data = vendor::OrderBy('id','DESC')->paginate(15)->where('is_active',0);
            }
            return view('dashbord.vendors.view',compact('data'));
        }catch (\Exception $ex){
            return redirect()->route('admin.vendors');
        }

    }
    public function createForm(){
        $data = Category::select()->get();
        return view('dashbord.vendors.add',compact('data'));
    }
    public function detail($slug ){
        $data = vendor::orderBy('id', 'DESC')->where('slug',$slug)->get()[0];
        return view('dashbord.vendors.detail',compact('data'));
    }
    public function editForm($slug){
        try{
            $select_data = Category::select()->get();
            $data = vendor::orderBy('id', 'DESC')->where('slug',$slug)->get()[0];
            return view('dashbord.vendors.edit',compact(['data','select_data']));

        }catch(Exception $ex){
            $alert = __('admin/vendor.error-cat-edit') ;
            return redirect()->route('admin.vendors')->with(['error' => $alert]);
        }

    }

//    // check for add , editvendors

    public function storeDb(VendorRequest $request ){

        try {
            DB::beginTransaction();
            $password = $request->slug;
            $data = $request->except(['_token','add']);
            vendor::create($data);
            DB::commit();
            $alert = __('admin/category/add.success-vendor-add');
            return redirect()->route('admin.vendors')->with(['success' => $alert]);
        }catch(\Exception $ex){
            return $ex;
            DB::rollback();
            $alert = __('admin/category/add.error-vendor-add');
            return redirect()->route('admin.vendors')->with(['error' => $alert]);
        }
    }

    public function updateDb($id,VendorRequest $request){

        try{
            if($id){
                $update = vendor::find($id);
                $update->update($request->except(['_token']));
                $alert = __('admin/vendor.success-vendor-edit') ;
                return redirect()->route('admin.vendors')->with(['success' => $alert]);
            }
        }catch(\Exception $ex){
            return $ex;
            $alert = __('admin/vendor.error-vendor-edit') ;
            return redirect()->route('admin.vendors')->with(['error'=>$alert]);
        }
    }
    public function isActive($id){
        $check = vendor::find($id);
        if(!$check){
            return redirect()->route('admin.error');
        }
        try{
            $active = $check -> is_active == 1 ? 0 : 1 ;
            vendor::where('id',$id)->update(['is_active' => $active]);
            $action = $active == 1 ? 'active' : 'inactive' ;
            $alert = __('admin/vendor.success-vendor-' .$action) ;
            return redirect()->back()->with(['success' => $alert]);
        }catch(\Exception $ex){
            $alert = __('admin/vendor.error-vendor-') ;
            return redirect()->back()->with(['error' => $alert]);
        }
    }
    public function deleteCategorie($id){
        $categorie = vendor::find($id);
        if(!$categorie){
            return redirect()->route('admin.error');
        }
        try{
            $categorie -> delete();
            $alert = __('admin/vendor.success-vendor-delete') ;
            return redirect()->route('admin.viewvendors')->with(['success' => $alert]);
        }catch(Exception $ex){
            $alert = __('admin/vendor.error-vendor-delete') ;
            return redirect()->route('admin.viewvendors')->with(['error' => $alert]);
        }
    }
}
