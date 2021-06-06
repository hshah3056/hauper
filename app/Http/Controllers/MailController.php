<?php

namespace App\Http\Controllers;

use App\Mail\SignupEmail;
use App\User;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email)
    {
        $user = User::where('email',$email)->first();
        $data = [
            'name' => $name,
            'token' => $user->email_verification
        ];
        \Mail::send('mail.signup-mail', [
            'data' => $data
        ], function ($mail) use ($email) {
            $mail->from('hshah3056@gmail.com', 'Harsh');
            $mail->to($email)->subject('Confirmation For Registration');
        });
    }

    public static function sendLoginEmail($name, $email)
    {
        $data = [
            'name' => $name,
            'email' => $email
        ];

        \Mail::send('mail.login-mail', [
            'data' => $data
        ], function ($mail) use ($email) {
            $mail->from('hshah3056@gmail.com', 'Harsh');
            $mail->to($email)->subject('Alert For Login');
        });
    }
}
