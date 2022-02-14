<?php

use App\Models\language;
use App\Models\mainCategorie;
use Illuminate\Support\Facades\Config;

function getLanguage(){

   return language::active() -> select()->get();

}

function appLocale(){
    return Config::get('app.locale');

}
function uploadeImage($folder,$image){
    $image ->store('/',$folder);
    $fileName = $image -> hashName();
        return $fileName;
}

function status($vall){
    return $vall == 1 ? 'is_active' : 'is_inactive';
}
function statusSetting($vall){
    return $vall == 0 ? 'active' : 'inactive';
}

function statusColor($vall){
    return $vall == 1 ? 'success' : 'danger';
}

function mainCategoriesActive(){
    return mainCategorie::where('translation_of',0)->active()->get();
}

function languageActive(){
    return language::active()->select()->get();
}
function editMainCategorie($id){
    // return $main =  mainCategorie::select()->find($id) ;
    // return $other =  mainCategorie::where('translation_of',$id)->select()->get();
}




