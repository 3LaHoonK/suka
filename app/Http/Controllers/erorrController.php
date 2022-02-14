<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class erorrController extends Controller
{
    public function erorr404(){
        return view('pages.admin.erorr404');
    }
}
