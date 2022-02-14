<?php

namespace App\Models\Dashbord;

use App\Observers\Admin\subCagegories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategories extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable = [
        'id',
        'lang_id',
        'translation_of',
        'name',
        'slug',
        'image',
        'active',
        'perant_id',
        'created_at',
        'updated_at',
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [

    // ];

    public function getActive(){
        return $this -> active  == 1 ? "Active" : "Inactive";
    }
    public function scopeActive($query){
        return $query ->where('active',1);
    }
    // public function get_selection($query){
    //     // return language::select('id','name','abbr','direction','locale','active')->get();
    //     return $query -> select('id','name','translation_lang','slug','image','active')->get();
    // }
    // vendor relation
    public function scopeSubCat($query){
        return $this -> where('translation_of',0);
    }
    public  function mainCat(){
        return $this -> belongsTo('App\Models\mainCategorie' , 'perant_id' ,'id');
    }
    public  function language()
    {
        return $this->belongsTo('App\Models\language', 'lang_id', 'id');
    }
    protected static function boot(){
        parent::boot();
        subcategories::observe(subCagegories::class);
    }



}
