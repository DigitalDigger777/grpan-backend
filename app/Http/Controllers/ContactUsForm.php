<?php

namespace App\Http\Controllers;

use App\Mail\PublicMailable;
use App\Mail\SupportMailable;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactUsForm extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'game'      => 'required',
            'name'      => 'required',
            'email'     => 'required',
            'message'   => 'required'
        ]);

        $data = [
            'game'      => $request->input('game'),
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'message'   => $request->input('message')
        ];

        $setting = DB::table('settings')->first();

        $dataSetting = json_decode($setting->data);

        Mail::to($dataSetting->contact_us_email)->send(new SupportMailable(
            $data['game'],
            $data['name'],
            $data['email'],
            $data['message']
        ));

        return response()->json($data);
    }
}
