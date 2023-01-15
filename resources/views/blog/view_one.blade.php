@extends('layouts.base')
@section('title')
    Blog :: {{$user->name}}
@endsection
@section('content')
    <h1 style="text-align: center; color: skyblue; margin-top: 50px">Title :: {{$blog->title}}</h1>
    <h2 style="text-align: center; color: skyblue; margin-top: 10px;">Content :: {{$blog->content}}</h2>
    @if(!empty($blog->ps))<h1 style="text-align: center; color: skyblue; margin-top: 50px">P.S. :: {{$blog->ps}}</h1>@endif
    <h6 style="text-align: center; margin-top: 80px">Created :: {{$blog->created_at}}</h6>
@endsection
