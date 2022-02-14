<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\AdminRequest;
use App\Models\Dashbord\Admin;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function loginPage(){
        return view('Dashbord.login');
    }
    public function checkLogin(AdminRequest $request){

        $email = $request ->input('email');
        $password = $request ->input('password');
        $remember_me =$request->has('remember_me') ? true : false  ;

        if(auth()->guard('admin')->attempt(['email'=>$email,'password'=>$password],$remember_me)){
            return redirect()->route('Dashbord');
        }else{
            return redirect()->back()->with(['error'=>'rong_input'])->withInput($request->all());
        };
    }
}
