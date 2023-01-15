<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function test()
    {
        return view('profile.test');
    }


    public function index(User $user)
    {
        return view('profile.index',compact('user'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
//        dd($request->input());
        if (!empty(User::find(Auth::id())->profile->user_id) && User::find(Auth::id())->profile->user_id == Auth::id()) {
            Profile::where('user_id', Auth::id())->update([
                'age' => $request['age'],
                'from' => $request['from'],
                'sex' => $request['sex'],
                'user_id' => Auth::id(),
            ]);
        } else {
            Profile::create([
                'age' => $request['age'],
                'from' => $request['from'],
                'sex' => $request['sex'],
                'user_id' => Auth::id(),
            ]);
        }
        return response()->json(['route'=>url(route('profile.index',Auth::id())),'sss'=>'lll']);
    }







    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
