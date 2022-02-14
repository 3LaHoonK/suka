<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['id','brand_id','name','locale','description'];
}
