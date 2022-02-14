<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['id','tag_id','name','locale','description'];
}
