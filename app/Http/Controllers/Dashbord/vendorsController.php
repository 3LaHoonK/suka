<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Dashbord\vendor;
use App\Http\Requests\Dashbord\vendorRequest;
use App\Models\Dashbord\mainCategorie;
use App\Notifications\vendorCreated;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class vendorsController extends Controller
{

    public function view(){
        $dataBack = vendor::Selection();
       return view('pages.admin.vendors.view',compact('dataBack'));
    }
    public function select($action){
        if($action == 'all'){
            return redirect()->route('admin.vendors');
        }if($action == 'active'){
            $dataBack = vendor::active()->get();
        }if($action == 'inactive'){
            $dataBack = vendor::where('active',0)->get();
        }
        return view('pages.admin.vendors.view',compact('dataBack'));
    }
    public function addform(){

         $category = mainCategoriesActive();
        return view('pages.admin.vendors.add',compact('category'));


    }
    public function editform($id){
        $dataBack = vendor::Selection()->find($id);
        if(!isset($dataBack)){
            return redirect()->route('admin.erorr');
        }
        $category = mainCategorie::where('translation_of',0)->active()->get();
        return view('pages.admin.vendors.edit',compact('category','dataBack'));

    }
    public function addcheck(vendorRequest $request){


         try{
            if($request->has('logo')){
            $newLogo = $request -> logo = uploadeImage('vendors',$request->logo);
            }
            $vendor = vendor::create([
                'name' => $request ->name ,
                'email' => $request ->email ,
                'address' => $request ->address ,
                'password' => $request ->password ,
                'mobile' => $request ->mobile ,
                'logo' => $request ->logo ,
                'active' => $request ->active ,
                'category_id' => $request ->category_id
            ]);
            //Notification::send($vendor , new vendorCreated($vendor));
             $alert = __('admin.success-vendor-add') ;
             return redirect()->route('admin.vendors')->with(['success' => $alert]);
         }catch(\Exception $ex){
             return $ex;
             //$alert = __('admin.erorr-vendor-add') ;
                 //return redirect()->route('admin.vendors')->with(['erorr' => $alert]);
         }


    }
    public function editcheck(vendorRequest $request , $id){

        try{

            $vendor =vendor::find($id);
            if(isset($request->logo)){
                $logoPath = uploadeImage('vendors',$request->logo);
                    $vendor -> update(['logo'=>$logoPath]);
            }
            if(isset($request->password)){
                $newPass = bcrypt($request -> password);
                    $vendor -> update(['password'=>$newPass]);
            }
            $vendor->update([
                'name' => $request ->name,
                'address' => $request ->address,
                'mobile' => $request ->mobile,
                'email' => $request ->email,
                'category_id' => $request ->category_id,
                'active' => $request ->active
            ]);

        $alert = __('admin.success-vendor-add') ;
            return redirect()->route('admin.vendors')->with(['success' => $alert]);
    }catch(\Exception $ex){

        $alert = __('admin.erorr-vendor-add') ;
            return redirect()->route('admin.vendors')->with(['erorr' => "$alert"]);
    }
}

    public function deleteVendors($id){
        $vendors = vendor::find($id);
        if(!$vendors){
            return redirect()->route('admin.error');
        }
        try{
        $vendors -> delete();
            $alert = __('admin.success-vendor-active') ;
                return redirect()->route('admin.vendors')->with(['success' => $alert]);
        }catch (\Exception $ex){
            $alert = __('admin.erorr-vendor-active') ;
            return redirect()->route('admin.vendors')->with(['erorr' => "$alert"]);
        }

    }
    public function activeVendors($id){
            $vendors = vendor::find($id);
        if(!$vendors){
            return redirect()->route('admin.error');
        }
        try{
            $active = $vendors -> active == 0 ? 1 : 0 ;
            $vendors -> update(['active' => $active]);
            $alert_caption = $active == 1 ? 'active' : 'inactive' ;
            $alert = __('admin.success-vendor-'.$alert_caption) ;
            return redirect()->back()->with(['success' => $alert]);
        }catch (\Exception $ex){
            $alert = __('admin.erorr-vendor-'.$alert_caption) ;
            return redirect()->back()->with(['erorr' => $alert]);
        }

    }







}





