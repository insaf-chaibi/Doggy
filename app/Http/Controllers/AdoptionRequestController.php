<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdoptionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function AdoptionReceivedRequests()
    {
        $user = Auth::user();
        $requests = DB::table('dogs as dog')
            ->join('adoption_requests as requests', 'dog.id', '=', 'requests.dog_id')
            ->join('users as user', 'user.id', '=', 'requests.user_id')
            ->where('dog.user_id', $user->id)
            ->select('dog.name as dog_name', 'requests.status', 'user.name as sender_name', 'requests.id', 'requests.created_at')
            ->paginate(10);

        return view('my_received_requests', compact('requests'));
    }

    public function AdoptionSentRequests()
    {
        $user = Auth::user();
        $requests = DB::table('dogs as dog')
            ->join('adoption_requests as requests', 'dog.id', '=', 'requests.dog_id')
            ->join('users as user', 'user.id', '=', 'dog.user_id')
            ->where('requests.user_id', $user->id)
            ->select('dog.name as dog_name', 'requests.status', 'user.id as owner_id', 'requests.id', 'requests.created_at')
            ->paginate(10);
        return view('my_sent_requests', compact('requests'));
    }

    public function contactOwner($id)
    {
        $owner = User::where('id', $id)->get()->first();
        return view('contact_owner', compact('owner'));
    }

    public function toggleStatus($id)
    {
        $request = AdoptionRequest::where('id', $id)->get()->first();
        $status = $request->status;
        $status = !$status;
        $request->update(['status' => $status]);
        return redirect()->back()->with('success', 'Request has been accepted successfully');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     *
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdoptionRequest::destroy($id);
        return redirect()->back()->with("delete", "Request deleted successfully");

    }
}
