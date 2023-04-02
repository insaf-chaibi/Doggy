<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\Dog;
use Illuminate\Support\Facades\DB;

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

    public function dashboard()
    {
        $users = User::all();

        $dogs = dog::all();
        //return response()->json($dogs);
        $adoptionRequests = AdoptionRequest::all();
        return view('dashboard.dashboard', compact('users', 'dogs', 'adoptionRequests'));
    }

    public function  users(){
        $users=User::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.users',compact('users'));
    }

    public function all_dogs(){
        $dogs=dog::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.dogs',compact('dogs'));
    }
    public  function adopRequests(){
        $requests = DB::table('dogs as dog')
            ->join('adoption_requests as requests', 'dog.id', '=', 'requests.dog_id')
            ->join('users as user', 'user.id', '=', 'requests.user_id')
            ->select('dog.name as dog_name', 'requests.status', 'user.name as sender_name', 'requests.id', 'requests.created_at')
            ->paginate(10);
        return view('dashboard.adoption_requests',compact('requests'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'phone' => ['required'],
            'email' => ['required', 'max:40'],

        ]);
        $user = Auth::user();
        $user->update($request->all());
        $user->save();

        return redirect()->back()->with('success', 'Your data updated successfully.');
    }

    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $user = Auth::user();
        if (Auth::user()) {
            return view('profile', compact('user'));
        }
    }

    public function myDogs()
    {
        $dogs = Dog::where('user_id', '=', Auth::user()->id)->latest()->simplePaginate(4);
        if (Auth::user()) {
            return view('myDogs', compact('dogs'));
        }
    }

}
