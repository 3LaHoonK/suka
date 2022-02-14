<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $hidden = ['password'];
    protected $casts =['is_active'=>'boolean'];
}
