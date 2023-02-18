<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AvatarController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    function store(Request $request): JsonResponse
    {
        $user = User::find(Auth::id());

        if ($request->hasFile('file')) {
            $user->addMedia($request->file)
                ->toMediaCollection('avatars');
        }
        return response()->json(['route' => url(route('profile.index', Auth::user()))]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function change(Request $request): JsonResponse
    {

        $user = User::find(Auth::id());
        if ($request->hasFile('file')) {
            $user->getMedia('avatars')->first()->delete();
            $user->addMedia($request->file)
                ->toMediaCollection('avatars');
        }
        return response()->json(['route' => url(route('profile.index', Auth::user()))]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    function delete(Request $request): JsonResponse
    {
        User::find($request->id)->getMedia('avatars')->first()->delete();
        return response()->json(['route' => url(route('profile.index', Auth::user()))]);
    }
}
