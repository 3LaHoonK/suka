<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\LanguagesRequest;
use App\Models\Dashbord\language;
use Exception;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    // get html for view,add,editlanguages

    public function view(){
        $language = language::select()->get();
        // $language = language::select(' abbr' , 'name' , 'locale' , 'direction' , 'active')->paginate(PAGINATION_COUNT);
        return view('Dashbord.languages.view',compact('language'));
    }
    public function select($action){
        if($action == 'all'){
            return redirect()->route('admin.languages');
        }if($action == 'active'){
            $dataBack = language::active()->get();
        }if($action == 'inactive'){
            $dataBack = language::where('active',0)->get();
        }
        return view('Dashbord.languages.view',compact('dataBack'));
    }
    public function addForm(){
        return view('Dashbord.admin.languages.add');
    }
    public function editForm($id){
        try{
            $language = language::find($id);
        }catch(Exception $ex){
            return redirect()->route('pages.admin.languages.view');
        }
        return view('Dashbord.admin.languages.edit',compact('language'));
    }

    // check for add , editlanguages

    public function addCheck(LanguagesRequest $request ){


        try{
            if(!$request -> has('active')){
                $request -> request->add(['active'=> 0 ]);}
            language::create($request->except(['_token']));
            $alert = __('admin.success-lang-add') ;
            return redirect()->route('admin.languages')->with(['success' => $alert]);
        }catch(Exception $ex){
            $alert = __('admin.erorr-lang-add') ;
                return redirect()->route('admin.languages')->with(['erorr' => $alert]);
        }

    }
    public function editCheck( $id,  LanguagesRequest   $request){

            $language = language::find($id);
            if(!$language){
                return redirect()->route('admin.languages');
            }
            try{
                if(!$request -> has('active'))
                    $request -> request->add(['active'=> 0 ]);
                $language -> update($request->except(['_token']));
                $alert = __('admin.success-lang-edit') ;
                return redirect()->route('admin.languages')->with(['success' => $alert]);
            }catch(Exception $ex){
                $alert = __('admin.erorr-lang-edit') ;
                return redirect()->route('admin.languages')->with(['erorr' => $alert]);
            }



    }


    public function deletelanguage($id){
        $language = language::find($id);
            if(!$language){
                return view('Dashbord.admin.languages.view',$id);
            }
            try{
                $categoryIsset= $language ->mainCategorie()  ;
                if(isset($categoryIsset)&&$categoryIsset ->count()>0){
                    $alert = __('admin.erorr-lang-delete') ;
                    return redirect()->route('admin.languages')->with(['erorr' => $alert]);
                }
            $language -> delete();
                $alert = __('admin.success-lang-delete') ;
                    return redirect()->route('admin.languages')->with(['success' => $alert]);
            }catch(Exception $ex){
                $alert = __('admin.erorr-lang-delete') ;
                return redirect()->route('admin.languages')->with(['erorr' => $alert]);
            }
    }
    public function activelanguage($id){
        $languge = language::find($id);
        if(!$languge){
            return redirect()->route('admin.erorr');
        }
        try {
            $active = $languge -> active == 0 ? 1 : 0 ;
                $languge -> update(['active' => $active]);
                    $alert = __('admin.success-lang-active') ;
                        return redirect()->route('admin.languages')->with(['success' => $alert]);
        }catch (\Exception $ex){
            return $ex;
            $alert = __('admin.erorr-lang-active') ;
            return redirect()->route('admin.languages')->with(['erorr' => $alert]);
        }

    }
}
