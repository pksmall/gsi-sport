<?php

namespace App\Http\Controllers\Auth;

use App;
use App\Http\Controllers\Controller;
use App\Role;
use App\Settings;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

    public function register(Request $request)
    {
        $status = "error";

        Log::info($request);
        $data = array();
        foreach ($request->request as $key => $value) {
            $data[$key] = $value;
        }

        Log::info($data);
        $redirect = "";
        if ($this->validator($data)) {
            $user = $this->create($data);
            if ($user) {
                Auth::attempt(['email' => $user->email, 'password' => $data['password']]);
                $status  = "success";
                $redirect = url('/profile');
            }
        }

        return response()->json(['response' => $status, 'data' => $redirect]);
    }


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
            'ip' => $this->getIp(),
            'password' => bcrypt($data['password']),
            'status_id' => 1,
            'is_subscribe' => false
        ]);

        $user->roles()->attach(Role::where('name', 'Клиент')->first());
        /*
         * Спасибо за регистрация на сайте GSI-Sport
Ваши данные для входа в личный кабинет:
Логин:
Пароль:

Удачных вам покупок!
         */
        $message = "Спасибо за регистрация на сайте GSI-Sport
Ваши данные для входа в личный кабинет:
Логин: " . $data['email'] ."
Пароль: " . $data['password'] ."

Удачных вам покупок!";
        $subject = "Регистрация на сайте GSI-Sport";
        $this->mail_send_to_client($user->email, $user->name, $subject, $message);

        if (isset(Settings::first()->email) && Settings::first()->email != null) {
            $message = "На вашем сайте зарегестрировался новый пользователь - по имени " . $data['name'] .", его почта " . $data['email'];
            $subject = "Новая регистрация на сайте gsi-sport.com";
            $this->mail_send_to_admin($message, $subject);
        }

        return $user;
    }

    private function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        if(strlen($ip) > 0) {return $ip;} else { \request()->ip(); }
                    }
                }
            }
        }
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
    private function mail_send_to_client($email, $owner, $subject, $message) {
        $data = array(
            'messagetext' => $message
        );

        Mail::send(['text'=>'emailmessage'], $data, function ($message) use ($email, $owner, $subject) {
            $to_email = $email;
            $to_name = $owner;
            $subj = $subject;

            $message->subject($subj);
            $message->from(Settings::first()->email, "Gsi-Sport WebMaster");
            $message->to($to_email, $to_name);
        });

    }

    private function mail_send_to_admin($message, $sub) {
        $data = array(
            'messagetext' => $message
        );

        Mail::send(['text'=>'emailmessage'], $data, function ($message) use ($sub) {
            $to_email = Settings::first()->email;
            $to_name = Settings::first()->owner;
            $subject = $sub;

            $message->subject($subject);
            $message->from(Settings::first()->email, "Gsi-Sport WebMaster");
            $message->to($to_email, $to_name);
        });

    }

}
