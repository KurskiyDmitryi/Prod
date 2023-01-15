@extends('layouts.base')
@section('title')
    Blog :: {{$user->name}}
@endsection
@section('content')
    <h1 style="text-align: center; color: skyblue; margin-top: 50px">Title :: {{$blog->title}}</h1>
    <h2 style="text-align:center; color: skyblue; margin-top: 10px; width: 500px">Content : </h2><p style="margin-left: 15px">{{$blog->content}}</p>
    @if(!empty($blog->ps))
        <h2 style="text-align:center; color: skyblue; margin-top: 50px; width: 500px">P.S. :</h2> <p style="margin: 15px">{{$blog->ps}}</p>
    @endif
    <h6 style="text-align: center; margin-top: 80px">Created :: {{$blog->created_at}}</h6>
@endsection
