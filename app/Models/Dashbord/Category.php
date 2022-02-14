<?php

namespace App\Models\Dashbord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Category extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['name','description','locale'];
    protected $table = 'categories';
    protected $fillable =['parent_id','slug','is active','image','admin_create'];
    protected $hidden = ['translations'];
    protected $casts = ['is_active' => 'boolean'];


    public function scopeParent($query){
        return $query->whereNull('parent_id');
    }

    public function scopeChild($query){
        return $query->whereNotNull('parent_id');
    }


    public function  scopeActive($query){
        return $query->where('is_active',1);
    }
    public function  scopeInactive($query){
        return $query->where('is_active',1);
    }
    public function catChild(){
        $this ->hasMany(self::class,'parent_id');
    }
    public function  product(){
        $this ->belongsTo(Product::class,'product_categories');
    }
    public function getTranslationRelationKey(): string
    {
        if ($this->translationForeignKey) {
            return $this->translationForeignKey;
        }

        return $this->getForeignKey();
    }
    public function categoryTag(){
        return $this -> hasMany(Category::class,'category_id','id');
    }

}
