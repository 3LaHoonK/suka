<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class language extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = [
        'id',
        'abbr',
        'name',
        'locale',
        'active',
        'direction',
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
    public function selectLang(){
        // return language::select('id','name','abbr','direction','locale','active')->get();
        return  DB::table('languages')->select('id','name','abbr','direction','locale','active')->get();
    }

    public function FunctionName( $var = null)
    {
        # code...
    }



}
