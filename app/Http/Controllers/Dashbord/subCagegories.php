<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\subCagegoriesRequest;
use App\Models\Dashbord\subcategories;
use Illuminate\Support\Facades\DB;

class subCagegories extends Controller
{
    public function view(){
        $categorie = subcategories::select()->get();
        return view('pages.admin.sub_categories.view',compact('categorie'));
    }
    public function select($action){
        if($action == 'all'){
            return redirect()->route('admin.viewsubcategories');
        }if($action == 'main'){
            $categorie = subcategories::where('translation_of',0)->get();
        }if($action == 'active'){
            $categorie = subcategories::active()->get();
        }if($action == 'inactive'){
            $categorie = subcategories::where('active',0)->get();
        }
        return view('pages.admin.sub_categories.view',compact('categorie'));
    }
    public function addForm(){
        $main_cat = mainCategoriesActive();
        $activeLanguage = languageActive();
        return view('pages.admin.sub_categories.add',compact('activeLanguage','main_cat'));
    }
    public function editForm($id){
        try{

            $main  = subcategories::select()->find($id);
            if(!$main){
                return redirect()->route('admin.error');
            }
            $other = subcategories::where('translation_of',$id)->select()->get();
            return view('pages.admin.sub_categories.edit',compact('main','other'));
        }catch(Exception $ex){
            $alert = __('admin.erorr-cat-edit') ;
            return redirect()->route('admin.viewsubcategories')->with(['erorr' => $alert]);
        }

    }

    // check for add , editcategories

    public function addCheck(subCagegoriesRequest $request){

        // add categories function

        try {
            $selectDefultCat = collect($request->category);
            $filter = $selectDefultCat->filter(function ($value, $key) {
                return $value['lang'] == appLocale();
            });
            $category = array_values($filter->all())[0];
            $filePath = $request->has('image') ? uploadeImage('subCategorie', $request->image) : '';
            DB::beginTransaction();
            $getId = subcategories::insertGetId([
                'name' => $category['name'],
                'lang_id' => $category['lang_id'],
                'translation_of' => 0,
                'slug' => $category['slug'],
                'perant_id' => $request['perant_id'],
                'image' => $filePath,
                'active' => $category['active']
            ]);

            $filter_other = $selectDefultCat->filter(function ($value, $key) {
                return $value['lang'] != appLocale();
            });

            // add other categories function

            $otherCategory = array_values($filter_other->all());
            if (isset($otherCategory)) {
                $otherCat_arr = [];
                foreach ($otherCategory as $otherCategoryes) {
                    $otherCat_arr[] = [
                        'name' => $otherCategoryes['name'],
                        'translation_of' => $getId,
                        'slug' => $otherCategoryes['slug'],
                        'lang_id' => $otherCategoryes['lang_id'],
                        'image' => $filePath,
                        'active' => $otherCategoryes['active'],
                        'perant_id' => $request['perant_id'],
                    ];
                };


                subcategories::insert($otherCat_arr);
                DB::commit();
            }

            $alert = __('admin.success-cat-add');
            return redirect()->route('admin.viewsubcategories')->with(['success' => $alert]);

        }
        catch
        (\Exception $ex){

            DB::rollback();
            return $ex;
            $alert = __('admin.erorr-cat-add');
            return redirect()->route('admin.viewsubcategories')->with(['erorr' => "$alert"]);
        }
    }
    public function editCheck( $id,  subCagegoriesRequest   $request){
        if(!$id){
            $alert = __('admin.erorr-cat-edit') ;
            return redirect()->route('admin.viewsubcategories')->with(['erorr'=>$alert]);
        }

        try{
            if($request -> lang  == appLocale()){


                $findDefultId = subcategories::find($id);
                $findDefultId->update($request->except(['_token','lang','translation_of','lang_id']));

                if(isset($request -> image )){
                    $filePath = $request->has('image') ? uploadeImage('mainCategorie',$request->image) : '' ;
                    $findDefultId->update(['image'=>$filePath]);
                }
            }
            // Other Categoryes
            $selectDefultCat = collect($request->category);
            $filter_other = $selectDefultCat -> filter(function($value,$key){
                return $value['lang'] != appLocale();
            });
            $otherCategory = array_values($filter_other->all());
            if(isset($otherCategory)){
                foreach($otherCategory as $key =>  $otherCategoryes){
                    if(isset($otherCategoryes -> image )){
                        $filePath = $otherCategoryes->has('image') ? uploadeImage('mainCategorie',$otherCategoryes->image) : '' ;
                        subcategories::where('translation_of',$otherCategoryes['translation_of'])->where('lang_id',$otherCategoryes['lang_id'])->update([
                            'image' => $filePath ,
                        ]);
                    }
                    subcategories::where('translation_of',$otherCategoryes['translation_of'])->where('lang_id',$otherCategoryes['lang_id'])->update([
                        'name' => $otherCategoryes['name'] ,
                        'slug' => $otherCategoryes['slug'] ,
                        'active' => $otherCategoryes['active']
                    ]);
                };
            }
            $alert = __('admin.success-cat-add') ;
            return redirect()->route('admin.viewsubcategories')->with(['success' => $alert]);
        }catch(\Exception $ex){

            $alert = __('admin.erorr-cat-edit') ;
            return redirect()->route('admin.viewsubcategories')->with(['erorr'=>$alert]);
        }
    }
    public function deletesubCategorie($id){
        $categorie = subcategories::find($id);
        if(!$categorie){
            return redirect()->route('admin.erorr');
        }
        try{
            $chackIssetProducte = $categorie-> vendor();
            if(isset($chackIssetProducte) && $chackIssetProducte -> count() > 0){
                $alert = __('admin.erorr-cat-delete') ;
                return redirect()->back()->with(['erorr' => $alert]);
            }
            $categorie -> delete();
            $alert = __('admin.success-cat-delete') ;
            return redirect()->back()->with(['success' => $alert]);
        }catch(Exception $ex){
            $alert = __('admin.erorr-cat-delete') ;
            return redirect()->back()->with(['erorr' => $alert]);
        }
    }
    public function activesubCategorie($id){
        $categorie = subcategories::find($id);

        if(!$categorie){
            return redirect()->route('admin.erorr');
        }
        try{
            $active = $categorie -> active == 0 ? 1 : 0 ;
            $categorie -> update(['active' => $active]);
            $alert = __('admin.success-cat-active') ;
            return redirect()->back()->with(['success' => $alert]);
        }catch(Exception $ex){
            $alert = __('admin.erorr-cat-active') ;
            return redirect()->back()->with(['erorr' => $alert]);
        }
    }
}
