<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function authenticated($request , $user){

        $user_id= auth()->user()->id;
        $user=User::find($user_id);
        $userArray=$user->roles->toArray();

        if($userArray[0]['id'] == 3){

            return redirect('/admin');

        }else if($userArray[0]['id'] == 2){

            return redirect('/operador');

        }else{

            return redirect('/');

        }
    }


    public function showLoginForm()
    {
        return view('login.index');
    }
}
