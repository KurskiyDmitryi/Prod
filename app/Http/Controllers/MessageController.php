<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function send(Request $request): RedirectResponse
    {
        $message = Message::create([
            'message' => $request->input('message'),
            'receiver_id' => $request->input('receiver_id'),
            'sender_id' => $request->input('sender_id'),
        ]);
        return redirect()->route('messages.view_one', User::find($request->receiver_id)->slug)->with('success', 'message sent success');
    }

    /**
     * @return View
     */
    public function view_all(): View
    {
        $senders = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.sender_id')
            ->select('users.*')->distinct()->where('messages.receiver_id', Auth::id())->get();
        $user = User::find(Auth::id());
        return view('message.view_all', compact(['user', 'senders']));
    }

    /**
     * @param User $user
     * @return View
     */

    public function view_one(User $user):View
    {
        $sender = $user->id;
        $curUser = Auth::id();

        $chat = Message::where([
            ['messages.sender_id', '=', "$sender"],
            ['messages.receiver_id', '=', "$curUser"],

        ])
            ->orWhere([['messages.sender_id', '=', "$curUser"],
                ['messages.receiver_id', '=', "$sender"],])
            ->orderBy('created_at')
            ->get();

        return view('message.view_one', compact(['user', 'chat']));
    }

}



