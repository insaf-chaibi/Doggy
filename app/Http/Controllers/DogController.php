<?php

namespace App\Http\Controllers;

use App\Models\dog;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dogs = Dog::latest()->simplePaginate(4);
        return view('home' , compact('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addDogForAdoption');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input=request()->validate([
            'image' => 'required',
            'name' => ['required', 'string', 'max:15'],
            'age' =>['required','integer','max:99'],
            'weight' => ['required','max:99.99'],
            'breed' => 'required',
            'gender' => 'required',
            'vaccinated' => 'required',
            'description' => ['string', 'max:255','nullable']
        ]);
        $input['user_id'] = Auth::user()->id;
        $input['image'] = $request->file('image')->store('doggy','public');
        
    
        $dog = Dog::create($input);
        $dog->save();
        return redirect()->back()->with('success','Dog added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function show(dog $dog)
    {
        return view('dog.show',compact('dog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function edit(dog $dog)
    {
        return view('editDog',compact('dog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dog $dog)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:15'],
            'age' =>['required','integer','max:99'],
            'weight' => ['required','max:99.99'],
            'breed' => 'required',
            'gender' => 'required',
            'vaccinated' => 'required',
            'description' => ['string', 'max:255']

        ]);
        $dog ->update($request->all());
        return redirect()->back()->with('success','Dog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(dog $dog)
    {
        $dog->delete();
        return redirect()->back()->with('success','Dog deleted successfully.');
    }

    public function adopt($id){
        $dog = Dog::find($id);
        return view('adoption',compact('dog'));
    }
    public function freeConsultation(){
        return view('freeConsultation');
    }
    public function dogsBreeds(){
        return view('dogsBreeds');
    }
}
