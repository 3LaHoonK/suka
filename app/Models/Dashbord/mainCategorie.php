<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class mainCategorie extends Model
{
    use HasFactory;
    protected $table = 'mainCategories';
    protected $fillable = [
        'id',
        'translation_lang',
        'translation_of',
        'name',
        'slug',
        'image',
        'active',
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
    public function vendor()
    {
       return $this -> hasMany('App\Models\Dashbord\vendor','category_id','id');
    }

    public function mainCat(){
        return $this->where('translation_of',0);
    }

}
