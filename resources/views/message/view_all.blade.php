@extends('layouts.base')
@section('title')
    Messages :: {{$user->name}}
@endsection
@section('content')
    @foreach($senders as $sender)
        <h1><a href="{{route('messages.view_one',$sender->slug)}}">{{$sender->name}}</a> </h1>
    @endforeach
@endsection
