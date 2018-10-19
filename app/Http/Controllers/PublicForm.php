<?php

namespace App\Http\Controllers;

use App\Mail\PublicMailable;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PublicForm extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'company'   =>  'required',
            'game_url'  => 'required',
            'email'     => 'required',
            'skype'     =>  'required',
            'message'   => 'required'
        ]);

        $data = [
            'name'      => $request->input('name'),
            'company'   => $request->input('company'),
            'game_url'   => $request->input('game_url'),
            'email'     => $request->input('email'),
            'skype'     => $request->input('skype'),
            'message'   => $request->input('message')
        ];

        $setting = DB::table('settings')->first();

        print_r($setting->data->publishing_form_email);
        exit;
//        exit;
        Mail::to($setting->data['publishing_form_email'])->send(new PublicMailable(
            $data['name'],
            $data['company'],
            $data['game_url'],
            $data['email'],
            $data['skype'],
            $data['message']
        ));
//        Mail::send('emails.public', $data, function ($message) {
//            $setting = Setting::all();
//            $message->from('no-reply@greenpanda.ceant.net', 'New publication request');
//            $message->to('korman.yuri@gmail.com');
//            if (count($setting) > 0) {
//
//            }
//
//        });

        return response()->json($data);
    }
}
