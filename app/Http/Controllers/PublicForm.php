<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicForm extends Controller
{
    public function send(Request $request)
    {
//        $request->validate([
//            'name'      =>  'required',
//            'company'   =>  'required',
//            'game_url'  => 'required',
//            'email'     => 'required',
//            'skype'     =>  'required',
//            'message'   => 'required'
//        ]);

        $data = [
            'name'      => $request->input('name'),
            'company'   => $request->input('company'),
            'gameUrl'   => $request->input('game_url'),
            'email'     => $request->input('email'),
            'skype'     => $request->input('skype'),
            'message'   => $request->input('message')
        ];





        Mail::send('emails.public', $data, function ($message) {
            $setting = Setting::all();

            if (count($setting) > 0) {
                $message->from('no-reply@greenpanda.ceant.net', 'New publication request');
                $message->to($setting[0]->data->publishing_form_email);
            }

        });

        return response()->json(['message' => 'Request completed']);
    }
}
