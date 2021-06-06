<?php

namespace App\Http\Controllers;

use App\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,[
                'name' => 'required',
                'mobile_no' => 'required',
                'address' => 'required',
                'image' => 'required'
            ],[
                'name.required' => 'Name is required',
                'mobile_no.required' => 'Mobile No is required',
                'address.required' => 'Name is required',
                'image.required' => 'Image is required'
            ]);

            Crud::create([
                'name' => $request->name,
                'address' => $request->address,
                'mobile_no' => $request->mobile_no,
                'image' => $request->image,
            ]);
            return redirect()->route('home')->with('done');

        }

        return view('home',[
            'cruds'=> Crud::get()
        ]);
    }

    public function update(Request $request)
    {
        dd($request->id);
        $updates = Crud::where('id',$request->id)->first();

        if($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'mobile_no' => 'required',
                'address' => 'required',
                'image' => 'required'
            ], [
                'name.required' => 'Name is required',
                'mobile_no.required' => 'Mobile No is required',
                'address.required' => 'Name is required',
                'image.required' => 'Image is required'
            ]);

            $updates->name = $request->name;
            $updates->mobile_no = $request->mobile_no;
            $updates->address = $request->address;
            $updates->image = $request->image;
            $updates->save();

            return redirect()->route('home')->with(['success' => 'Data has been updated successfully..']);
        }
        return view('edit',[
            'updates' => $updates
        ]);
    }

    public function show(Request $request)
    {
        $show = Crud::where('id',$request->id)->first();
        return view('show',[
            'show' => $show
        ]);
    }

    public function destroy(Request $request)
    {
        dd($request->id);
        $delete = Crud::find($request->id);
        $delete->delete();
        return redirect()->route('user-view')->with('success', 'Todo deleted successfully!');

    }

}
