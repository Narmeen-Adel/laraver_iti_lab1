<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
        
       // return Socialize::with('github')->redirect()
    }


    public function handleProviderCallback( $provider)
    {
        $user = Socialite::driver('github')->user();
        //dd($provider);
        $email=$user->getEmail();
        $name=$user->getName();
        User::create(["name"=>$name,"email"=>$email]);
        //dd($name);

       
        //$user = Socialize::with('github')->user();

       // $user->token;
       return redirect()->rout("home");
    }

}
