<?php

namespace App\Http\Controllers\Auth;

use App;
use App\ClientCart;
use App\Role;
use App\Settings;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'telephone' => 'required|min:6',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if (isset($data['locale_redirect'])){
            if ($data['locale_redirect'] == 'ru' || $data['locale_redirect'] == 'en') {
                $this->redirectTo = '/' . $data['locale_redirect'] . '/profile';
            }
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'company' => null,
            'telephone' => $data['telephone'],
            'ip' => \Request::ip(),
            'password' => bcrypt($data['password']),
            'status_id' => 1,
            'is_subscribe' => false
        ]);

        $user->roles()->attach(Role::where('name', 'Клиент')->first());

        /*
        if (isset(Settings::first()->email) && Settings::first()->email != null)
        {
            mail(Settings::first()->email, "Нова реєстрація клієнта на Camo-tec", 'Ось профіль клієнта: ' . route('show_client', $user->id) . '.',
                "From: webmaster@camo-tec.com\r\n"
                ."X-Mailer: PHP/" . phpversion());
        }

        if ($user)
        {

            if (App::getLocale() == 'ua') {
                mail($user->email, "Дякуємо за реєстрацію на сайті нашого магазину Camo-tec!", 'Текст листа',
                    "From: webmaster@camo-tec.com\r\n"
                    ."X-Mailer: PHP/" . phpversion());
            }

            if (App::getLocale() == 'ru') {
                mail($user->email, "Спасибо за регистрацию на сайте нашего магазина Camo-tec!", 'Текст письма',
                    "From: webmaster@camo-tec.com\r\n"
                    ."X-Mailer: PHP/" . phpversion());
            }

            if (App::getLocale() == 'en') {
                mail($user->email, "Thanks for registering on our Camo-tec website!", 'Text',
                    "From: webmaster@camo-tec.com\r\n"
                    ."X-Mailer: PHP/" . phpversion());
            }
        }*/

        return $user;
    }

    public function showRegistrationForm()
    {
        \App\Http\Controllers\PageController::prepare_page();

        $cartTotal = $this->carttotal();

        return view('auth.register', compact('cartTotal'));
    }

    private function get_cart()
    {
        $cart = null;
        $client = null;
        if (Auth::check()) {
            $cart = Auth::user()->cart;
            $client = Auth::user()->id;
        } else {
            $cart = request()->session()->has('cart') ? request()->session()->get('cart') : null;
        }
        return ['cart' => $cart, 'client' => $client];
    }

    private function check_client_session_cart()
    {
        $cart = $request->get('cart');
        if (isset($cart->items) && count($cart->items) > 0) {
            foreach ($cart->items as $item)
            {
                ClientCart::create([
                    'client_id' => Auth::user()->id,
                    'item_id' => $item['item']->id,
                    'qty' => $item['qty']
                ]);
            }
            $request->forget('cart');
        }
    }
    private  function carttotal()
    {
        if (Auth::check()) {
            $this->check_client_session_cart();
        }
        $cart = $this->get_cart();
        if (!empty($cart['cart'])) {
            $cartTotal = $cart['cart']->total_qty;
        } else {
            $cartTotal = 0;
        }

        return $cartTotal;
    }

}
