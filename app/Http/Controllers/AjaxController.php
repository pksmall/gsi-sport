<?php

namespace App\Http\Controllers;

use App\ClientActivity;
use App\ClientCart;
use App\GuestCart;
use App\Http\Requests\AddToCartRequest;
use App\Item;
use App\Settings;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mail;

class AjaxController extends Controller
{
    public function send(Request $request){

        //dd($request);
        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'messagetext'=>$request->message
        );

        Mail::send('contacttext', $data, function ($message) use ($request){

            /* Config ********** */
            $to_email = Settings::first()->email;
            $to_name  = Settings::first()->owner;
            $subject  = Settings::first()->title_shop;

            $message->subject ($subject);
            $message->from ($request->email, $request->name);
            $message->to ($to_email, $to_name);
        });

        if(count(Mail::failures()) > 0){
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
        if (!isset($item))
        {
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
        if (!isset($item))
        {
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

            $jsonRet = '{ "qty": ' . $qty . ', "total": ' . $cart->total_price . ', "itemtotal": ' . $cart->total_qty. '}';
            
            $request->session()->flash('cart-success', true);
            $status = 'success';
        }
        return response()->json(['response' => $status, 'data' => $jsonRet]);
    }

    public function cart_qty_down(Request $request)
    {
        $item = Item::find($request['item_id']);
        $jsonRet = '{ "qty": 0, "total": 0}';
        if (!isset($item))
        {
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

            $jsonRet = '{ "qty": ' . $qty . ', "total": ' . $cart->total_price . ', "itemtotal": ' . $cart->total_qty. '}';

            $request->session()->flash('cart-success', true);
            $status = 'success';
        }
        return response()->json(['response' => $status, 'data' => $jsonRet]);
    }

    public function item_delete(Request $request)
    {
        $item = Item::find($request['item_id']);
        $jsonRet = '{ "total": 0, "itemtotal": 0 }';
        if (!isset($item))
        {
            $status = 'error';
        } else {
            $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
            $cart = new GuestCart($old_cart);
            $cart->item_delete($item, $item->id);

            $request->session()->put('cart', $cart);
            if (Auth::check()) {
                if (isset($cart_item))
                {
                    if (Auth::user()->id == $cart_item->client_id)
                    {
                        $cart_item->delete();
                        Session::flash('cart-update', true);
                    }
                }
            }
            //Log::info(print_r($cart->items, true));

            $jsonRet = '{ "total": ' . $cart->total_price . ', "itemtotal": ' . $cart->total_qty. '}';

            $request->session()->flash('cart-success', true);
            $status = 'success';
        }
        return response()->json(['response' => $status, 'data' => $jsonRet]);
    }

}

