<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


//    public function authenticated()
//    {
//        if (Auth::user()->role_as == 1 ) // admin login
//        {
//            return redirect()->route('Dashbord')->with(['success' , 'welcome ' . Auth::user()->name ]);
//        }
//        elseif (Auth::user()->role_as == 0 )  // normal login
//        {
//            return redirect()->back()->with(['success'  , Auth::user()->name . 'you are favorite user in suka' ]);
//        }
//    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   // public function redirectTo(){
     //   if (Auth::user()->role_as == 1 ) //admin login
      //  {
       //     return 'admin';
        //}
        //elseif (Auth::user()->role_as == 0 )  //normal login
      //  {
    //        return '/';
  //      }
//    }


}
