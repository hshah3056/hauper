<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\MailController;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'contact' => 'required|regex:/^[9876][0-9]{9}$/|digits:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register(Request $request)
    {

        \DB::transaction( function () use ($request){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->contact  = $request->contact;
            $user->last_logged_in_ip  = $request->getClientIp();
            $user->remember_token = str_random(20);
            $user->email_verification = str_random(10);
            $user->status = User::In_ACTIVE;
            $user->is_admin = User::NO;
            $user->last_logged_in_ip = $request->getClientIp();
            $user->save();

            if ($user != null){
                MailController::sendSignupEmail($user->name,$user->email);
                return redirect()->back()->with(session()->flash('success' , 'Your Account has been Created'));
            }
        });
        return redirect()->back()->with(session()->flash('danger','Something Went Wrong'));
    }
}
