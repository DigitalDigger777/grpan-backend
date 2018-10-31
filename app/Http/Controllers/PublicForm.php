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



        $capcha = $request->input('capcha');

        if ($capcha) {
            $secret = config('CAPCHA_SECREET');
            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$capcha");
            $captcha_success = json_decode($verify);

            if ($captcha_success->success) {
                $setting = DB::table('settings')->first();

                $dataSetting = json_decode($setting->data);

                Mail::to($dataSetting->publishing_form_email)->send(new PublicMailable(
                    $data['name'],
                    $data['company'],
                    $data['game_url'],
                    $data['email'],
                    $data['skype'],
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

        return response()->json($data);
    }
}
