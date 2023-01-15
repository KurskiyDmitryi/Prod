@extends('layouts.base')
@section('title')
    Blog :: {{$user->name}}
@endsection
@section('content')
    <h1 style="text-align: center; color: aqua"> {{$user->name}} :: Diary</h1>
    <ul>
    @foreach($user->blogs()->latest()->get() as $blog)
        <li style="border: skyblue solid 1px; margin: 10px; padding: 10px">
            <h2 id="view_one">Title  :: <a href="{{route('blog.view_one',['user'=>Auth::user(),'blog'=>$blog->id])}}" style="">{{$blog->title}}</a> </h2>
            <h6>Created :: {{$blog->created_at}}</h6>
        </li>
    @endforeach
    </ul>
    <style>
        #view_one a:hover{
            color: skyblue;
        }
    </style>
@endsection
