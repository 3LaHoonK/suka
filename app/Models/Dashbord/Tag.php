<?php

namespace App\Models\Dashbord;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Tag extends Model
{
    use Translatable;
    protected $with = ['translations'];
    protected  $translatedAttributes = ['name','description','locale'];
    protected $table = 'tags';
    protected $fillable =['product_id','brand_id','category_id','slug','is active','admin_create'];

    protected $casts = ['is_active' => 'boolean'];
    public function getTranslationRelationKey(): string
    {
        if ($this->translationForeignKey) {
            return $this->translationForeignKey;
        }

        return $this->getForeignKey();
    }
    public function categoryName(){
        return $this -> belongsTo(Category::class,'category_id','id');
    }
    public function brandName(){
        return $this -> belongsTo(brand::class,'brand_id','id');
    }
    public function parent_name($query){
        if( $query-> where('brand_id',true)){
            return 'brand_id';
        }
        if( $query-> where('category_id',true)){
            return 'category_id';
        }
        if( $query-> where('product_id',true)){
            return 'product_id';
        }
    }

}
