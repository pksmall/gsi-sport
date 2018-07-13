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
            if (Auth::check()) {
                $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
                $cart = new GuestCart($old_cart);
                $cart->add_item($item, $item->id, $request->get('qty'), $request->get('size'));

                $request->session()->put('cart', $cart);

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
                $sumItems = ClientCart::count();
            } else {
                $old_cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
                $cart = new GuestCart($old_cart);
                $cart->add_item($item, $item->id, $request->get('qty'), $request->get('size'));

                $request->session()->put('cart', $cart);
                //$request->session()->save();
                ClientActivity::create([
                    'action_id' => 5,
                    'ip' => $request->ip()
                ]);
                $sumItems = count($cart->items);
            }
            //Session::flush();
            $request->session()->flash('cart-success', true);
            $status = 'success';
        }

        return response()->json(['response' => $status, 'data' => $sumItems]);
    }
}

