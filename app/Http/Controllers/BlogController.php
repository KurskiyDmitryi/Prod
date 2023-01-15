<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', ['user' => Auth::user()]);
    }

    public function store(BlogRequest $request, User $user)
    {
        Blog::create([
            'title' => $request->title,
            'content' => $request->cont,
            'ps' => $request->ps,
            'user_id' => Auth::id(),
        ]);

        return response()->json(['route' => url(route('index'))]);
    }

    public function view_all(User $user)
    {
        return view('blog.view_all', compact('user'));
    }

    public function view_one(User $user, Blog $blog)
    {

        return view('blog.view_one',compact(['user','blog']));
    }
}
