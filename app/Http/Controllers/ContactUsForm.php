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
            'message'   => 'required',
            'capcha'    => 'required'
        ]);

        $data = [
            'game'      => $request->input('game'),
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'message'   => $request->input('message')
        ];
        $capcha = $request->input('capcha');

        if ($capcha) {
            $secret = env('CAPCHA_SECREET');
            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$capcha");
            $captcha_success = json_decode($verify);

            if ($captcha_success->success) {
                $setting = DB::table('settings')->first();

                $dataSetting = json_decode($setting->data);

                Mail::to($dataSetting->contact_us_email)->send(new SupportMailable(
                    $data['game'],
                    $data['name'],
                    $data['email'],
                    $data['message']
                ));

                return response()->json($data);
            } else {
                return response()->json([
                    'error' => [
                        'code' => 401,
                        'message' => 'Capcha is not verify'
                    ]
                ]);
            }
        } else {
            return response()->json([
                'error' => [
                    'code' => 401,
                    'message' => 'Capcha is not verify'
                ]
            ]);
        }
    }
}
