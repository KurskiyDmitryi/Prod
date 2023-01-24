<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function create()
    {
        return view('blog.create', ['user' => Auth::user()]);
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
        $blogPaginated = $user->blogs()->latest()->paginate(6);
        return view('blog.view_all', compact(['user', 'blogPaginated']));
    }

    public function view_one(User $user, Blog $blog)
    {
        return view('blog.view_one', compact(['user', 'blog']));
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        return response()->json(['route' => url(route('blog.view_all', Auth::user()))]);
    }

    public function view_all_bloggers()
    {
        $usersPaginated = DB::table('users')->paginate(6);
        return view('blog.search_bloggers', ['usersPaginated' => $usersPaginated]);
    }

    public function search(Request $request)
    {

        $usersFromSearch = DB::table('users')->where('name', 'LIKE', "%{$request->keyWord}%")->paginate();
        return view('blog.search_result', compact('usersFromSearch'));
    }
}
