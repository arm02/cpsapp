<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    public function login(Request $request)
    {
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
          if (Auth::user()->role == 1 && Auth::user()->status == 1) {
            return redirect('/admin');
          }
          if (Auth::user()->role == 2 && Auth::user()->status == 1) {
            return redirect('/operator');
          }
          if (Auth::user()->role == 3 && Auth::user()->status == 1) {
            return redirect('/super');
          }
          elseif (Auth::user()->role == 1 && Auth::user()->status == 2) {
            return redirect('/')->with('alert', 'Akun anda telah di Banned');
          }
          elseif (Auth::user()->role == 2 && Auth::user()->status == 2) {
            return redirect('/')->with('alert', 'Akun anda telah di Banned');
          }
          elseif (Auth::user()->role == 3 && Auth::user()->status == 2) {
            return redirect('/')->with('alert', 'Akun anda telah di Banned');
          }
          elseif (Auth::user()->role == 1 && Auth::user()->status == 3) {
            return redirect('/')->with('alert2', 'Akun di NonAktifkan sementara');
          }
          elseif (Auth::user()->role == 2 && Auth::user()->status == 3) {
            return redirect('/')->with('alert2', 'Akun di NonAktifkan sementara');
          }
          elseif (Auth::user()->role == 3 && Auth::user()->status == 3) {
            return redirect('/')->with('alert2', 'Akun di NonAktifkan sementara');
          }
            return $this->sendLoginResponse($request);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
}
