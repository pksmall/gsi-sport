<?php

namespace App\Http\Controllers\Auth;

use App\ClientCart;
use App\Config;
use App\GuestCart;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PageController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $req)
    {
        $lifetime = config('session.lifetime');
        $remember = $req->get('remember');
        config(['session.lifetime' =>   43800]);
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password], $remember))
        {
            //Log::info("ST: '" .config('session.lifetime') . "'");
            if ($req->user()->hasRole(1)) {
                return redirect('/admin');
            }
            return redirect('/profile');
        }
        config(['session.lifetime' =>   $lifetime]);
        //Log::info("ST: '" .config('session.lifetime') . "'");
        return back()->withInput()->with('message', 'Login Failed');
    }

    public function authenticated(Request $request)
    {
        if ($request->user()->hasRole(1)) {
            return redirect('/admin');
        }
        return redirect('/profile');
    }


    public function logout()
    {
        if (Auth::check())
        {
            Auth::logout();
            Session::flush();
        }

        $route_locale = 'index';
        return redirect()->route($route_locale);
    }

    public function showLoginForm()
    {
        \App\Http\Controllers\PageController::prepare_page();
        $cartTotal = $this->carttotal();

        return view('auth.login', compact('cartTotal'));
    }

    private function get_cart()
    {
        $cart = null;
        $client = null;
        if (Auth::check()) {
            $cart = Auth::user()->cart;
            $client = Auth::user()->id;
        } else {
            $cart = Session::has('cart') ? Session::get('cart') : null;
        }
        return ['cart' => $cart, 'client' => $client];
    }

    private  function carttotal()
    {
        $cart = $this->get_cart();
        if (!empty($cart['cart'])) {
            $cartTotal = $cart['cart']->total_qty;
        } else {
            $cartTotal = 0;
        }

        return $cartTotal;
    }
}
