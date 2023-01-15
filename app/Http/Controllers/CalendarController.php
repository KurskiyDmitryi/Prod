<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index(User $user)
    {
        return view('calendar.calendar',['user'=>$user]);
    }

}
