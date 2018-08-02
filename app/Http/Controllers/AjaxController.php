<?php

namespace App\Http\Controllers;

use App\BlogArticlesTranslation;
use App\ClientActivity;
use App\ClientCart;
use App\Config;
use App\GuestCart;
use App\Http\Requests\AddToCartRequest;
use App\Item;
use App\LiqPay;
use App\NpCities;
use App\NpWarehouses;
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
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->config = Config::first();
    }

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
            $subject = "Вопрос с сайта GSI-Sport";

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

        Log::info(print_r($reqdata, true));
        $is_reg = null;
        if (isset($reqdata['weareregister'])) {
            $is_reg = 1;
        }
        if (isset($is_reg)) {
            if (!Auth::check()) {
                $user = null;
                $user_pass = str_random('8');

                $message = "Спасибо за регистрация на сайте GSI-Sport
Ваши данные для входа в личный кабинет:
Логин: " . $reqdata['reg-email'] ."
Пароль: " . $user_pass ."

Удачных вам покупок!";
                $subject = "Регистрация на сайте GSI-Sport";
                $this->mail_send_to_client($reqdata['reg-email'], $reqdata['reg-name'], $subject, $message);

                $user = User::where('email', $reqdata['reg-email'])->first();
                Log::info(print_r($user, true));
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
                Log::info("is regster but not auth");
            }
        } else {
            if (Auth::check()) {
                $user = Auth::user();
                $reqdata['reg-name'] = $user->name;
                $reqdata['reg-email'] = $user->email;
                $reqdata['reg-telephone'] = $user->telephone;
            }
        }
        $cart = $this->get_cart();

        if (isset($reqdata['deliverychoose'])) {
            switch ($reqdata['deliverychoose']) {
                case 2:
                    $city = NpCities::where('ref', '=', $reqdata['npcities'])->first();
                    $reqcity = $city['nameru'];
                    $warehouse = NpWarehouses::where('sitekey', '=', $reqdata['npposts'])->first();
                    if (strlen($warehouse['descriptionru']) == 0) {
                        $reqmore = $warehouse['description'];
                    } else {
                        $reqmore = $warehouse['descriptionru'];
                    }
                    break;
                case 3:
                    $reqcity = "Одеcса";
                    $reqmore = $reqdata['fxaddr'];
                    break;
                default:
                    $reqdata['deliverychoose'] = 1;
                    $reqcity = "Одеcса";
                    $reqmore = "Самовывоз";

                    break;

            }
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
        }

        if ($order ){
            $message = "Спасибо за заказ на GSI-Sport Подробно про ваш заказ можно узнать в вашем аккаунте: " . url('/profile');
            $subject = "Новый заказ на Gsi-Sport";
            $this->mail_send_to_client($order->guest_email, $order->guest_name, $subject, $message);
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
            $message->from(Settings::first()->email, "Gsi-Sport WebMaster");
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
            $message->from(Settings::first()->email, "Gsi-Sport WebMaster");
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
        app('debugbar')->disable();
        Log::info("========== Liqpay Start ========== ");
        Log::info($request);

        $ligpay_sign = $request['signature'];
        $data = json_decode(base64_decode($request['data']));
        Log::info(print_r($data));
        //echo "==========";

        $order = Order::find($data->order_id);

        $sign = base64_encode( sha1(env('LIQPAY_PRIVATE_KEY') . $request['data'] . env('LIQPAY_PRIVATE_KEY'), 1 ));

        //echo $sign."\n";
        //echo $ligpay_sign."\n";

        if ($order && ($sign == $ligpay_sign)) {
            $order->status_id = 3;  //оплачено см. App\Order -> $orderStatuses
            $order->update();
        }
        Log::info("========== Liqpay End ========== ");
    }

    public function forgot(Request $request)
    {
        $status = "error";

        Log::info($request['email']);
        if (!Auth::check()) {
            $user = null;
            $user_pass = str_random('8');

            $user = User::where('email', $request['email'])->first();

            Log::info(print_r($user, true));
            if ($user) {
                $status = "success";

                $user_data['password'] = bcrypt($user_pass);
                $user->update($user_data);

                $message = "Генерация пароля на GSI-Sport.\nВот сгенерированный пароль для вашей учетной записи: " . $user_pass;
                $subject = "Восстановлние пароля сайте Gsi-Sport";
                $this->mail_send_to_client($user->email, $user->name, $subject, $message);
            }
        }

        return response()->json(['response' => $status]);
    }

    public function getItemsData(Request $request)
    {
        $status = "error";

        $cid = $request['cid'];
        $page = $request['page'];

        // all in category
        $allCidItems = Item::query();
        $allCidItems->with('preview', 'locales');
        $allCidItems->whereHas('categories', function($q) use ($cid) {
            $q->where([['category_id', '=', $cid]])->orWhere([['parent_id',  '=',  $cid]]);
        })->where('is_active', true)->get();

        // custom pagenator
        $items = Item::query();
        $items->with('preview', 'locales');
        $items->whereHas('categories', function($q) use ($cid) {
            $q->where([['category_id', '=', $cid]])->orWhere([['parent_id',  '=',  $cid]]);
        })->where('is_active', true)->limit($this->config->item_limit);
        if ($page > 1) {
            $items->offset($this->config->item_limit * ($page - 1));
        }

        if (($filter = $this->get_filter()) != null) {
            switch ($filter) {
                case 'abc-asc':
                    $items = $items->join('item_translations', 'item_translations.item_id', '=', 'items.id')
                        ->orderBy('item_translations.name', 'asc')->select('items.*');
                    break;
                case 'abc-desc':
                    $items = $items->join('item_translations', 'item_translations.item_id', '=', 'items.id')
                        ->orderBy('item_translations.name', 'desc')->select('items.*');
                    break;
                case 'price-desc':
                    $items->orderBy('price', 'desc');
                    break;
                case 'price-asc':
                    $items->orderBy('price', 'asc');
                    break;
                default:
                    $items->orderBy('price', 'desc');
                    break;
            }
        }
        $items = $items->get();
        Log::info("cid: " . $cid . " page: " . $page . " filter: " . $filter);

        $pagenator = "";
        if ($items) {
            $countItems = $allCidItems->count();
            //Log::info("NC:" . $countItems);
            $status = 'success';
            if ($page == 1) {
                $numpages = ceil($countItems / $this->config->item_limit);
                if ($numpages > 1) {
                    for ($i = 1; $i <= $numpages; $i++) {
                        if ($i == 1) {
                            $active = 'active';
                        } else {
                            $active = "";
                        }
                        $pagenator = $pagenator .
                            '<a href="#" class="page ' . $active . '" data-json-cid=' . $cid . ' data-json-page="' . $i . '" data-json-path="' . url('/get_items_data') . '">' . $i . '</a>';
                    }
                }
            }

            $dataitems = "";
            foreach ($items as $item) {
                $dataitems = $dataitems . '
                <div class="product-item col-12">
                    <a class="product-image" href="/products/' . $item->locales[0]->slug . '" style="background-image: url('.url($item->preview->path ).')"></a>
                    <div class="product-info text-block-wrap">
                        <div class="text-block"><a class="product-title" href="/products/' . $item->locales[0]->slug . '">' . $item->locales[0]->name . '</a>
                            <div class="product-code">Код товара: ' . $item->code . '</div>
                            <div class="product-more">
                                <div class="product-price">' . $item->price . ' грн</div>
                                <button class="btn blue" data-content-id="' . $item->id . '">в корзину</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn blue mobile-button" data-content-id="' . $item->id . '">в корзину</button>          
                ';
            }
        }
        return response()->json(['response' => $status, 'data' => $dataitems, 'pagenator' => $pagenator]);

    }

    private function get_filter()
    {
        return  request()->session()->has('filter') ? request()->session()->get('filter') : null;
    }
}

