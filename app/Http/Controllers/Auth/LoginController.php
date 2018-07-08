<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

    use AuthenticatesUsers;

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

    public function authenticated(Request $request)
    {
        //dd($request);

        $redirect = $request->get('redirect');
        if (isset($redirect) && $redirect == 'cart') {
            if (App::getLocale() == 'ru') {
                return redirect()->route('cart_ru');
            } elseif (App::getLocale() == 'ua') {
                return redirect()->route('cart');
            } elseif (App::getLocale() == 'en') {
                return redirect()->route('cart_en');
            }
        }
        $locale_redirect = $request->get('locale_redirect');

        if ($request->user()->status_id == 3)
        {
            if (isset($locale_redirect)) {
                Auth::logout();
                if ($locale_redirect == 'ru') {
                    return redirect()->route('banned_ru')->with('banned', true);
                } elseif ($locale_redirect == 'ua') {
                    return redirect()->route('banned')->with('banned', true);
                } elseif ($locale_redirect == 'en') {
                    return redirect()->route('banned_en')->with('banned', true);
                }
            }
        }

        if (isset($locale_redirect)) {
            if ($locale_redirect == 'ru') {
                return redirect()->route('profile_ru');
            } elseif ($locale_redirect == 'ua') {
                return redirect()->route('profile');
            } elseif ($locale_redirect == 'en') {
                return redirect()->route('profile_en');
            }
        }

        if ($request->user()->hasRole(1)) {
            return redirect('/admin');
        }
        return redirect('/profile');
    }

    public function logout(Request $request)
    {
        if (Auth::check())
        {
            Auth::logout();
        }
        $route_locale = 'index';
        if (App::getlocale() == 'ru') {
            $route_locale = 'index_ru';
        }
        if (App::getlocale() == 'en') {
            $route_locale = 'index_en';
        }
        return redirect()->route($route_locale);
    }
}
