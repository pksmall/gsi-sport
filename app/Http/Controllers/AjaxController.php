<?php

namespace App\Http\Controllers;

use App\BlogArticlesTranslation;
use App\ClientActivity;
use App\ClientCart;
use App\GuestCart;
use App\Http\Requests\AddToCartRequest;
use App\Item;
use App\LiqPay;
use App\Order;
use App\OrderItem;
use App\Settings;
use App\User;
use App\Role;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mail;

class AjaxController extends Controller
{
    public function send(Request $request)
    {

        //dd($request);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'messagetext' => $request->message
        );

        Mail::send('contacttext', $data, function ($message) use ($request) {

            /* Config ********** */
            $to_email = Settings::first()->email;
            $to_name = Settings::first()->owner;
            $subject = Settings::first()->title_shop;

            $message->subject($subject);
            $message->from($request->email, $request->name);
            $message->to($to_email, $to_name);
        });

        if (count(Mail::failures()) > 0) {
            $status = 'error';
        } else {
            $status = 'success';
        }

        return response()->json(['response' => $status]);
    }

    public function add_to_cart(Request $request)
    {
        $sumItems = 0;
        $item = Item::find($request['item_id']);
        if (!isset($item)) {
            $status = 'error';
        } else {
            $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
            $cart = new GuestCart($old_cart);
            $cart->add_item($item, $item->id, $request->get('qty'), $request->get('size'));

            $request->session()->put('cart', $cart);
            if (Auth::check()) {
                $client_cart_in = ClientCart::where('item_id', $item->id)->first();
                if (isset($client_cart_in) && $client_cart_in->size == $request->get('size')) {
                    $client_cart_in->update([
                        'qty' => $client_cart_in->qty + $request->get('qty')
                    ]);
                } else {
                    ClientCart::create([
                        'client_id' => Auth::user()->id,
                        'item_id' => $item->id,
                        'qty' => $request->get('qty'),
                        'size' => $request->get('size')
                    ]);
                }
                //
                ClientActivity::create([
                    'user_id' => Auth::user()->id,
                    'action_id' => 5,
                    'ip' => $request->ip()
                ]);
            } else {
                //$request->session()->save();
                ClientActivity::create([
                    'action_id' => 5,
                    'ip' => $request->ip()
                ]);
            }
            $sumItems = $cart->total_qty;
            //Session::flush();
            $request->session()->flash('cart-success', true);
            $status = 'success';
        }

        return response()->json(['response' => $status, 'data' => $sumItems]);
    }

    public function cart_qty_up(Request $request)
    {
        $item = Item::find($request['item_id']);
        $jsonRet = '{ "qty": 0, "total": 0}';
        if (!isset($item)) {
            $status = 'error';
        } else {
            $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
            $cart = new GuestCart($old_cart);
            $qty = $cart->qty_up($item, $item->id, $request->get('qty'), $request->get('size'));

            $request->session()->put('cart', $cart);
            if (Auth::check()) {
                $client_cart_in = ClientCart::where('item_id', $item->id)->first();
                $client_cart_in->update([
                    'qty' => $client_cart_in->qty + $request->get('qty')
                ]);
            }
            //Log::info(print_r($cart->items, true));

            $jsonRet = '{ "qty": ' . $qty . ', "total": ' . $cart->total_price . ', "itemtotal": ' . $cart->total_qty . '}';

            $request->session()->flash('cart-success', true);
            $status = 'success';
        }
        return response()->json(['response' => $status, 'data' => $jsonRet]);
    }

    public function cart_qty_down(Request $request)
    {
        $item = Item::find($request['item_id']);
        $jsonRet = '{ "qty": 0, "total": 0}';
        if (!isset($item)) {
            $status = 'error';
        } else {
            $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
            $cart = new GuestCart($old_cart);
            $qty = $cart->qty_down($item, $item->id, $request->get('qty'), $request->get('size'));

            $request->session()->put('cart', $cart);
            if (Auth::check()) {
                $client_cart_in = ClientCart::where('item_id', $item->id)->first();
                if (($client_cart_in->qty - $request->get('qty')) > 0) {
                    $client_cart_in->update([
                        'qty' => $client_cart_in->qty - $request->get('qty')
                    ]);
                } else {
                    $client_cart_in->update([
                        'qty' => 1
                    ]);
                }
            }
            //Log::info(print_r($cart->items, true));

            $jsonRet = '{ "qty": ' . $qty . ', "total": ' . $cart->total_price . ', "itemtotal": ' . $cart->total_qty . '}';

            $request->session()->flash('cart-success', true);
            $status = 'success';
        }
        return response()->json(['response' => $status, 'data' => $jsonRet]);
    }

    public function item_delete(Request $request)
    {
        $item = Item::find($request['item_id']);
        $jsonRet = '{ "total": 0, "itemtotal": 0 }';
        if (!isset($item)) {
            $status = 'error';
        } else {
            $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
            $cart = new GuestCart($old_cart);
            $cart->item_delete($item, $item->id);

            $request->session()->put('cart', $cart);
            if (Auth::check()) {
                if (isset($cart_item)) {
                    if (Auth::user()->id == $cart_item->client_id) {
                        $cart_item->delete();
                        Session::flash('cart-update', true);
                    }
                }
            }
            //Log::info(print_r($cart->items, true));

            $jsonRet = '{ "total": ' . $cart->total_price . ', "itemtotal": ' . $cart->total_qty . '}';

            $request->session()->flash('cart-success', true);
            $status = 'success';
        }
        return response()->json(['response' => $status, 'data' => $jsonRet]);
    }

    public function update_views(Request $request)
    {
        $status = 'error';

        $posts = BlogArticlesTranslation::find($request['post_id']);

        if (!isset($posts)) {
            return response()->json(['response' => $status]);
        } else {
            $status = 'success';

            //Log::info(print_r($posts, true));
            $posts->increment('count_views');

            return response()->json(['response' => $status, 'data' => $posts->count_views]);
        }
    }

    public function change_filter(Request $request)
    {
        $status = 'success';

        $newfilter = $request->get('filter');
        $request->session()->put('filter', $newfilter);
        $request->session()->flash('filter-success', true);

        return response()->json(['response' => $status]);
    }

    /**
     * Get NovaPochta cities
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNpCities(Request $request)
    {
        $status = 'error';

        $result = "";

        //Log::info(print_r(json_decode($request)));

        $url = $_ENV['NP_CITIES_GET_URL'];
        $jsonReq = "
        {
            \"modelName\": \"AddressGeneral\",
            \"calledMethod\": \"getSettlements\",
            \"methodProperties\": {
		        \"FindByString\": \"".$request->get('obj') ."\",
		        \"Warehouse\": \"1\",
                \"Page\": \"1\"
            },
            \"apiKey\": \"".$_ENV['NP_APIKEY']."\"
        }";

        //Log::info("Url: " . $url . " jsonreq: " . $jsonReq);

        $ch = curl_init($url);
        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonReq);
        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($ch);
        //Log::info($result);
        //Log::info(print_r(json_decode($result), true));
        $resData = json_decode($result);
        curl_close($ch);

        $retData = array();
        foreach ($resData->data as $key => $val) {
            if(isset($val->Ref)) {
                //Log::info("key:" . $key);
                //Log::info(print_r($val, true));
                $strToArr = $val->Description;
                if (isset($val->RegionsDescription) && strlen($val->RegionsDescription) > 0) {
                    $strToArr .= " - " . $val->RegionsDescription;
                }
                $retData[] = array("name" => $strToArr, "SettlementRef" => $val->Ref);
                $status = "success";
            }
        }
        //Log::info(print_r($retData, true));


        return response()->json(['response' => $status, 'data' => json_encode($retData)]);
    }

    public function getNpPosts(Request $request)
    {
        $status = 'error';

        $result = "";

        //Log::info(print_r(json_decode($request)));

        $url = $_ENV['NP_CITIES_GET_URL'];
        $jsonReq = "{
            \"modelName\": \"AddressGeneral\",
            \"calledMethod\": \"getWarehouses\",
            \"methodProperties\": {
                \"Language\": \"ru\",
                \"SettlementRef\": \"".$request->get('obj') ."\"
            },
    	    \"apiKey\": \"".$_ENV['NP_APIKEY']."\"
	    }";

        Log::info("Url: " . $url . " jsonreq: " . $jsonReq);

        $ch = curl_init($url);
        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonReq);
        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($ch);
        //Log::info($result);
        //Log::info(print_r(json_decode($result), true));
        $resData = json_decode($result);
        curl_close($ch);

        $retData = array();
        foreach ($resData->data as $key => $val) {
            if(isset($val->Ref)) {
                //Log::info("key:" . $key);
                //Log::info(print_r($val, true));
                //$strToArr = $val->Description;
                $aShort = explode(",", $val->ShortAddress);
                $shortStart  = "";
                foreach ($aShort as $tkey => $tval) {
                    if ($tkey == 0) {continue;}
                    //Log::info("k");
                    $shortStart = $shortStart ." ".$tval;
                }
                $strToArr = "Відділення №" . $val->Number .", ". $shortStart;
                $retData[] = array("name" => $strToArr);
                $status = "success";
            }
        }
        Log::info(print_r($retData, true));


        return response()->json(['response' => $status, 'data' => json_encode($retData)]);
    }

    public function saveOrder(Request $request)
    {
        $status = 'success';
        $headers[] = "From: webmaster@gsi-sport.ua";
        $headers[] = "X-Mailer: PHP/" . phpversion();
        $headers[] = "Content-type: text/plain; charset=uft-8";
        $headers[] = "Content-Language: ru";

        $data = $request->json()->all();
        //Log::info(print_r($data, true));
        $reqdata = array();
        foreach ($data as $val) {
            foreach ($val as $key => $value) {
                $reqdata[$key] = $value;
            }
        }

        //Log::info(print_r($reqdata, true));
        $is_reg = null;
        if (isset($reqdata['weareregister'])) {
            $is_reg = 1;
        }
        if (isset($is_reg) && !Auth::check()) {
            $user = null;
            $user_pass = str_random('8');

            $message = "Генерация пароля на GSI-Sport.\nВот сгенерированный пароль для вашей учетной записи: " . $user_pass;
            $subject = "Новый пароль на сайт Gsi-Sport";
            $this->mail_send_to_client($reqdata['reg-email'], $reqdata['reg-name'], $subject, $message);

//            mail($request->get('guest_email'), "Генерация пароля на GSI-Sport",
//                'Вот сгенерированный пароль для вашей учетной записи: ' . $user_pass . '.',
//                implode("\r\n",$headers));

            $user = User::where('email', $reqdata['reg-email'])->first();
            //Log::info(print_r($user, true));
            if (!$user) {
                $user = User::create([
                    'name' => $reqdata['reg-name'],
                    'email' => $reqdata['reg-email'],
                    'telephone' => $reqdata['reg-telephone'],
                    'ip' => $this->getIp(),
                    'password' => bcrypt($user_pass),
                    'status_id' => 1,
                    'is_subscribe' => false
                ]);
                $user->roles()->attach(Role::where('name', 'Клиент')->first());
            } else {
                $user_data['password'] = bcrypt($user_pass);
                $user->update($user_data);
            }

            Auth::attempt(['email' => $user->email, 'password' => $user_pass]);
        } else {
            $user = Auth::user();
            $reqdata['reg-name'] = $user->name;
            $reqdata['reg-email'] = $user->email;
            $reqdata['reg-telephone'] = $user->telephone;
        }
        $cart = $this->get_cart();

        if (isset($reqdata['deliverychoose'])) {
            if ($reqdata['deliverychoose'] != 2) {
                $reqcity = "Одеса";
                if (isset($reqdata['fxaddr'])) {
                    $reqmore = $reqdata['fxaddr'];
                }
            } else {
                $reqcity = $reqdata['city'];
                $reqmore = $reqdata['npposts'];
            }
        } else {
            $reqdata['deliverychoose'] = 1;
            $reqcity = "Одеса";
            $reqmore = "Самовывоз";
        }
        $returl = url('/order_success');
        $order = Order::create([
            'client_id' => isset(Auth::user()->id) ? Auth::user()->id : 0,
            'guest_name' => $reqdata['reg-name'],
            'guest_city' => $reqcity,
            'guest_email' => $reqdata['reg-email'],
            'guest_telephone' => $reqdata['reg-telephone'],
            'status_id' => 1,
            'total' => $cart['cart']->total_price_delivery,
            'pay_id' => $reqdata['paytype'],
            'delivery_id' => $reqdata['deliverychoose'],
            'more' => $reqmore,
            'mail_number' => ""
        ]);

        if (isset(Settings::first()->email) && Settings::first()->email != null) {
            $this->mail_send_to_admin("Новый заказ на GSI-Sport Делатали заказа: " .  route('show_order', $order->id));
//            mail(Settings::first()->email, "Новый заказ на GSI-Sport", 'Делатали заказа: ' .
//                route('show_order', $order->id) . '.', implode("\r\n",$headers));
        }

        if ($order ){
            $message = "Спасибо за заказ на GSI-Sport Подробно про ваш заказ можно узнать в вашем аккаунте.";
            $subject = "Новый заказ на Gsi-Sport";
            $this->mail_send_to_client($order->guest_email, $order->guest_name, $subject, $message);
//            mail($order->guest_email, "Спасибо за заказ на GSI-Sport",
//                'Подробно про ваш заказ можно узнать в вашем аккаунте.', implode("\r\n",$headers));
        }

        foreach($cart['cart']->items as $z) {
            //Log::info(print_r($z, true));
            OrderItem::create([
                'client_id' => 0,
                'order_id' => $order->id,
                'item_id' => $z['item']->id,
                'qty' => $z['qty']
            ]);
        }

        $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
        $postarr = $liqpay->cnb_array(array(
            'action'         => 'pay',
            'amount'         => $cart['cart']->total_price_delivery,
            'currency'       => 'UAH',
            'description'    => 'Оплата заказа № ' . $order->id .' магазине в  GSI-Sport ',
            'order_id'       => $order->id,
            'version'        => '3'
        ));
        Log::info(print_r($postarr, true));

        if ($reqdata['paytype'] == 2) {
            request()->session()->put('liqpay', $postarr);
            request()->session()->flash('liqpay-success', true);
            $returl = url('/liqpay_redirect');
        }

        $this->empty_cart($cart);

        return response()->json(['response' => $status, 'data' => $returl]);
    }

    private function empty_cart($cart)
    {
        if (!empty($cart['cart']->items)){
            //dd($cart['cart']->items);
            foreach($cart['cart']->items as $item) {
                if (Auth::check()) {
                    //dd($item['item']->id);
                    $cart_item = ClientCart::where('item_id', $item['item']->id);
                    //dd($cart_item);
                    $cart_item->delete();
                }

            }
        }

        unset($cart['cart']);
        if (empty($cart['cart'])) {
            request()->session()->forget('cart');
        }

        request()->session()->flash('cart-update', true);
    }

    private function get_cart()
    {
        $cart = null;
        $client = null;

        // $cart = Auth::user()->cart;
        if (Auth::check()) {
            $client = Auth::user()->id;
        }

        $cart = request()->session()->has('cart') ? request()->session()->get('cart') : null;

        return ['cart' => $cart, 'client' => $client];
    }

    private function mail_send_to_admin($message) {
        $data = array(
            'messagetext' => $message
        );

        Mail::send(['text'=>'emailmessage'], $data, function ($message) {
            $to_email = Settings::first()->email;
            $to_name = Settings::first()->owner;
            $subject = "Новый заказ Gsi-Sport";

            $message->subject($subject);
            $message->from("webmaster@gsi-sport.ua", "Gsi-Sport WebMaster");
            $message->to($to_email, $to_name);
        });

    }

    private function mail_send_to_client($email, $owner, $subject, $message) {
        $data = array(
            'messagetext' => $message
        );

        Mail::send(['text'=>'emailmessage'], $data, function ($message) use ($email, $owner, $subject) {
            $to_email = $email;
            $to_name = $owner;
            $subject = $subject;

            $message->subject($subject);
            $message->from("webmaster@gsi-sport.ua", "Gsi-Sport WebMaster");
            $message->to($to_email, $to_name);
        });

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

    public function liqpayStatus(Request $request)
    {
        $data = request()->session()->has('liqpay') ? request()->session()->get('liqpay') : null;

        Log::info("========== Liqpay Start ========== ");
        Log::info(print_r($data, true));
        Log::info(print_r($request, true));
        Log::info("========== Liqpay Eend ========== ");
    }
}

