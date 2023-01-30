<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    function store(Request $request)
    {
        $user = User::find(Auth::id());

        if ($request->hasFile('file')) {
            $user->addMedia($request->file)
                ->toMediaCollection('avatars');
        }
        return response()->json(['route' => url(route('profile.index', Auth::user()))]);
    }

    function change(Request $request)
    {

        $user = User::find(Auth::id());
        if ($request->hasFile('file')) {
            $user->getMedia('avatars')->first()->delete();
            $user->addMedia($request->file)
                ->toMediaCollection('avatars');
        }
        return response()->json(['route' => url(route('profile.index', Auth::user()))]);
    }

    function delete(Request $request)
    {
        User::find($request->id)->getMedia('avatars')->first()->delete();
        return response()->json(['route' => url(route('profile.index', Auth::user()))]);
    }
}
