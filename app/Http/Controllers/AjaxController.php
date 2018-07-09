<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
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
}
