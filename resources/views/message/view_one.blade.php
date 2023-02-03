@extends('layouts.base')
@section('title')
    Messsage from :: {{$user->name}}
@endsection
@section('content')
    <h1 style="text-align: center; margin-bottom: 40px">Chat with :: {{$user->name}}</h1>
    @foreach($chat as $message)

        <p @if($message->receiver_id == Auth::id()) class="sender"
           @else class="receiver"@endif>{{$message->message}}</p>
        <p class="created_at @if($message->receiver_id == Auth::id()) left
        @else right @endif>">{{$message->created_at}}</p>
    @endforeach
    <form method="post" action="{{route('message.send')}}">
        @csrf
    <div class="chat-input" style="margin-top: 40px">
        <input type="text" name="message" placeholder="Enter your message...">
        <input type="hidden" name="receiver_id" value="{{$user->id}}">
        <input type="hidden" name="sender_id" value="{{Auth::id()}}">
        <button type="submit">Send</button>
    </div>
    </form>

@endsection
<style>
    .chat-input input[type="text"] {
        width: 300px;
        padding: 10px;
        font-size: 18px;
    }

    .chat-input button {
        width: 100px;
        padding: 10px;
        background-color: #5f9ea0;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
    }


    .chat-input button:hover {
        background-color: #3e8e41;
    }


    .sender, .receiver {
        font-family: 'Nunito', sans-serif;
        width: 200px;
        border-radius: 25px;
    }

    .sender {
        margin-left: 400px;
        border: 1px solid blue;
        background-color: #bdc3c7;
    }

    .left {
        margin-right: 200px;
    }

    .receiver {
        border: 1px solid green;
        margin-left: 600px;
        background-color: greenyellow;
    }

    .right {
        margin-left: 200px;
    }

    .created_at {
        font-size: 8px;
    }

</style>
