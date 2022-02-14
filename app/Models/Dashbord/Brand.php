<?php

namespace App\Models\Dashbord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class brand extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected  $translatedAttributes = ['name','description','locale'];
    protected $table = 'brands';
    protected $fillable =['slug','image','admin_create'];
    protected $hidden = ['translations'];
    protected $casts = ['is_active' => 'boolean'];


    public function getTranslationRelationKey(): string
    {
        if ($this->translationForeignKey) {
            return $this->translationForeignKey;
        }

        return $this->getForeignKey();
    }
    public function brandTag(){
        return $this -> hasMany(Tag::class,'brand_id','id');
    }

}
