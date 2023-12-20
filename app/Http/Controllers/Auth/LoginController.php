<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // protected function authenticated($request, $user)
    // {
    //     if ($user->role == 'admin') {
    //         return redirect()->route('admin.dashboard');
    //     } else {
    //         return redirect()->route('user.dashboard');
    //     }
    // }

    public function autthenticated(){

        if(auth::user()->role == '1'){

            return redirect('admin/dashboard')->with('status', ' welcome to admin dashboard');
        }
        else if (auth::user()->role == '0'){

            return redirect('/home')->with('status', ' login successfull');

        }
        else{
            return redirect('/');
        }
    }

}
