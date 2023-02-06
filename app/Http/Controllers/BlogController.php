<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Profile;
use App\Models\User;
use http\Env\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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

    /**
     * @return View
     */
    public function view_all_bloggers():View
    {

        $usersPaginated = User::with(['profile' => function ($query) {
            $query->where('type', '!=', 'private');
        }])->where('id', '!=', Auth::id())
            ->paginate(12);
        return view('blog.search_bloggers', ['usersPaginated' => $usersPaginated]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function search(Request $request): View
    {

        $usersFromSearch = User::with(['profile' => function ($query) {
            $query->where('type', '!=', 'private');
        }])->where('name', 'LIKE', "%{$request->keyWord}%")->where('id', '!=', Auth::id())->paginate();
        return view('blog.search_result', compact('usersFromSearch'));
    }
}
