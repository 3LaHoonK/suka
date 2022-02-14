<?php

namespace App\Models\Dashbord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $guard = 'admin';
    protected $guarded = [];
    public $timestamps = true ;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public function role(){
        return
            $this->belongsTo(Role::class,'role_id');
    }

}
