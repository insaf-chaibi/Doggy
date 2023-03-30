<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Dog;

class UserController extends Controller
{
    
   
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'phone' =>['required'],
            'email' => ['required', 'max:40'],
            
        ]);
        $user = Auth::user();
        $user -> update($request->all());
        $user -> save();

        return redirect()->back()->with('success','Your data updated successfully.');
    }

    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $user = Auth::user();
        if(Auth::user()){
            return view('profile',compact('user'));
        }
    }
    public function myDogs(){
        $dogs = Dog::where('user_id','=',Auth::user()->id)->latest()->simplePaginate(4);
        if(Auth::user()){ 
            return view('myDogs',compact('dogs'));
        }
    }

}
