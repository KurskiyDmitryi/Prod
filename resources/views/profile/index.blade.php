@extends('layouts.base')
@section('title')
    Profile :: {{$user->name}}
@endsection
@section('content')
    <h1 style="text-align: center ; color: aquamarine">Welcome :: {{$user->name}}</h1>
    <div style="margin: 15px">
        <h2>From :: @if(!empty($user->profile->from))
                {{$user->profile->from}}
            @else
                empty
            @endif</h2>
        <h2>Age :: @if(!empty($user->profile->age))
                {{$user->profile->age}}
            @else
                empty
            @endif</h2>
        <h2>Sex :: @if(!empty($user->profile->sex))
                {{$user->profile->sex}}
            @else
                empty
            @endif</h2>
        {{--        <a href="{{route('profile.edit',Auth::user())}}">Update</a>--}}
        <form action="{{route('profile.edit',Auth::user())}}">
            <button class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
