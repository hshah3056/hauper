<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use function React\Promise\all;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index',[
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'name' => 'required',
                'contact' => 'required',
                'email' => 'required|email',
            ], [
                'name.required' => 'Name is required',
                'contact.required' => 'Mobile No is required',
                'email.email' => 'Name is required',
            ]);

            User::create([
                'name' => $request->name,
                'contact' => $request->contact,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return redirect()->route('user-view')->with(['success' => 'User has been Created successfully..']);
        }
        return view('user.create');
    }

    public function updateUser(Request $request)
    {
        $user = User::where('id',$request->id)->first();

        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'name' => 'required',
                'contact' => 'required',
                'email' => 'required|email',
            ], [
                'name.required' => 'Name is required',
                'contact.required' => 'Mobile No is required',
                'email.email' => 'Name is required',
            ]);

            $user->name = $request->name;
            $user->contact = $request->contact;
            $user->email = $request->email;
            $user->is_admin = $request->is_admin ? $request->is_admin : $user->is_admin;
            $user->save();


            return redirect()->route('user-view')->with(['success' => 'Data has been updated successfully..']);
        }

        return view('user.update',[
            'user' => $user,
        ]);
    }
    public function destroy($id){

        User::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
