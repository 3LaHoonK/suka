<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;


class MainCategories extends Controller
{
    // get html for view,add,editcategories

//    public function view(){
//        $categorie = mainCategorie::select()->get();
//        return view('pages.admin.main_categories.view',compact('categorie'));
//    }
//    public function select($action){
//        if($action == 'all'){
//            return redirect()->route('admin.viewcategories');
//        }if($action == 'main'){
//            $categorie = mainCategorie::where('translation_of',0)->get();
//        }if($action == 'active'){
//            $categorie = mainCategorie::active()->get();
//        }if($action == 'inactive'){
//            $categorie = mainCategorie::where('active',0)->get();
//        }
//        return view('pages.admin.main_categories.view',compact('categorie'));
//    }
    public function addForm(){

        return view('dashbord.main_categories.add');
    }
//    public function editForm($id){
//        try{
//
//            $main  = mainCategorie::select()->find($id);
//             if(!$main){
//                 return redirect()->route('admin.error');
//             }
//            $other = mainCategorie::where('translation_of',$id)->select()->get();
//            return view('pages.admin.main_categories.edit',compact('main','other'));
//        }catch(Exception $ex){
//            $alert = __('admin.erorr-cat-edit') ;
//            return redirect()->route('admin.viewcategories')->with(['erorr' => $alert]);
//        }
//
//    }
//
//    // check for add , editcategories
//
//    public function addCheck(categoriesRequest $request){
//
//        // add categories function
//
//        try {
//            $selectDefultCat = collect($request->category);
//            $filter = $selectDefultCat->filter(function ($value, $key) {
//                return $value['lang'] == appLocale();
//            });
//            $category = array_values($filter->all())[0];
//            $filePath = $request->has('image') ? uploadeImage('mainCategorie', $request->image) : '';
//            DB::beginTransaction();
//            $getId = mainCategorie::insertGetId([
//                'name' => $category['name'],
//                'lang_id' => $category['lang_id'],
//                'translation_of' => 0,
//                'slug' => $category['slug'],
//                'image' => $filePath,
//                'active' => $category['active']
//            ]);
//
//            $filter_other = $selectDefultCat->filter(function ($value, $key) {
//                return $value['lang'] != appLocale();
//            });
//
//            // add other categories function
//
//            $otherCategory = array_values($filter_other->all());
//            if (isset($otherCategory)) {
//                $otherCat_arr = [];
//                foreach ($otherCategory as $otherCategoryes) {
//                    $otherCat_arr[] = [
//                        'name' => $otherCategoryes['name'],
//                        'lang_id' => $otherCategoryes['lang_id'],
//                        'translation_of' => $getId,
//                        'slug' => $otherCategoryes['slug'],
//                        'image' => $filePath,
//                        'active' => $otherCategoryes['active']
//                    ];
//                };
//
//
//                mainCategorie::insert($otherCat_arr);
//                DB::commit();
//            }
//
//                $alert = __('admin.success-cat-add');
//                return redirect()->route('admin.viewcategories')->with(['success' => $alert]);
//
//            }
//        catch
//            (\Exception $ex){
//
//                DB::rollback();
//                $alert = __('admin.erorr-cat-add');
//                return redirect()->route('admin.viewcategories')->with(['erorr' => "$alert"]);
//            }
//    }
//    public function editCheck( $id,  categoriesRequest   $request){
//        if(!$id){
//            $alert = __('admin.erorr-cat-edit') ;
//            return redirect()->route('admin.viewcategories')->with(['erorr'=>$alert]);
//        }
//        try{
//            if($request -> lang  == appLocale()){
//
//
//                $findDefultId = mainCategorie::find($id);
//                $findDefultId->update($request->except(['_token','lang','translation_of','lang_id']));
//
//                if(isset($request -> image )){
//                    $filePath = $request->has('image') ? uploadeImage('mainCategorie',$request->image) : '' ;
//                    $findDefultId->update(['image'=>$filePath]);
//                }
//            }
//            // Other Categoryes
//            $selectDefultCat = collect($request->category);
//            $filter_other = $selectDefultCat -> filter(function($value,$key){
//                return $value['lang'] != appLocale();
//            });
//           $otherCategory = array_values($filter_other->all());
//            if(isset($otherCategory)){
//                foreach($otherCategory as $key =>  $otherCategoryes){
//                    if(isset($otherCategoryes -> image )){
//                        $filePath = $otherCategoryes->has('image') ? uploadeImage('mainCategorie',$otherCategoryes->image) : '' ;
//                        mainCategorie::where('translation_of',$otherCategoryes['translation_of'])->where('lang_id',$otherCategoryes['lang_id'])->update([
//                            'image' => $filePath ,
//                        ]);
//                    }
//                    mainCategorie::where('translation_of',$otherCategoryes['translation_of'])->where('lang_id',$otherCategoryes['lang_id'])->update([
//                        'name' => $otherCategoryes['name'] ,
//                        'slug' => $otherCategoryes['slug'] ,
//                        'active' => $otherCategoryes['active']
//                    ]);
//                };
//            }
//            $alert = __('admin.success-cat-add') ;
//            return redirect()->route('admin.viewcategories')->with(['success' => $alert]);
//        }catch(\Exception $ex){
//
//            $alert = __('admin.erorr-cat-edit') ;
//            return redirect()->route('admin.viewcategories')->with(['erorr'=>$alert]);
//        }
//    }
//    public function deleteCategorie($id){
//        $categorie = mainCategorie::find($id);
//            if(!$categorie){
//                return redirect()->route('admin.erorr');
//            }
//            try{
//            $chackIssetVendor = $categorie-> vendor();
//            if(isset($chackIssetVendor) && $chackIssetVendor -> count() > 0){
//                $alert = __('admin.erorr-cat-delete') ;
//                return redirect()->route('admin.viewcategories')->with(['erorr' => $alert]);
//            }
//            $categorie -> delete();
//            $alert = __('admin.success-cat-delete') ;
//                return redirect()->route('admin.viewcategories')->with(['success' => $alert]);
//            }catch(Exception $ex){
//                $alert = __('admin.erorr-cat-delete') ;
//                    return redirect()->route('admin.viewcategories')->with(['erorr' => $alert]);
//            }
//    }
//    public function activeCategorie($id){
//        $categorie = mainCategorie::find($id);
//
//        if(!$categorie){
//            return redirect()->route('admin.erorr');
//        }
//        try{
//            $active = $categorie -> active == 0 ? 1 : 0 ;
//            $categorie -> update(['active' => $active]);
//                    $alert = __('admin.success-cat-active') ;
//            return redirect()->back()->with(['success' => $alert]);
//        }catch(Exception $ex){
//            return $ex;
//            $alert = __('admin.erorr-cat-active') ;
//            return redirect()->back()->with(['erorr' => $alert]);
//        }
//    }
}
