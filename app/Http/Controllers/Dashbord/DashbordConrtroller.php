<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashbordConrtroller extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('Dashbord.index');
    }
}
