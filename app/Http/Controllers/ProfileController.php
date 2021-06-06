<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')){

            if($request->profile_image)
            {
                if($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
                    $disk = \Storage::disk('spaces');
                    $profile_image = Uuid::generate(4) . "." . $request->file('profile_image')->getClientOriginalExtension();
                    $disk->put(env('PROFILE_IMAGE_PATH') . $profile_image, file_get_contents($request->file('profile_image')->path()));
                    $user->profile_image = $profile_image;
                    $user->save();
                }
            }
            User::whereId($user->id)->update([
                'name' => $request->name,
                'contact' => $request->contact,
            ]);

            return redirect()->back()->with(['success' => 'your Profile Update Successfully']);

        }
        return view('profile',[
            'user' => $user
        ]);
    }
}
