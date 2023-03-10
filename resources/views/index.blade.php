@extends('layouts.base')
@section('title','home')
@section('content')
@auth()
    <div id="scene">
        <div id="left-zone">
            <ul class="list">
                <li class="item">
                    <input type="radio" id="profile" name="basic_carousel" value="Personal profile details"
                           checked="checked"/>
                    <label class="label_profile" for="profile">Profile</label>
                    <div class="content content_profile"><span class="picto"></span>
                        <h1>Profile</h1>
                        <p>Personal profile details</p>
                        <a class="btn btn-primary" href="{{route('profile.index',Auth::user())}}">My profile</a>
                        <a class="btn btn-primary" href="{{route('profile.edit',Auth::user())}}">Edit profile</a>
                    </div>
                </li>
                <li class="item">
                    <input type="radio"
                           id="blog"
                           name="basic_carousel"
                           value="blog"/>
                    <label class="label_blog"
                           for="blog">Blog</label>
                    <div class="content content_blog"><span class="picto"></span>
                        <h1>Blog</h1>
                        <p>Blog</p>
                        <a href="{{route('blog.create')}}" class="btn-primary btn btn-small blog_buttons">Write blog</a>
                        <a href="{{route('blog.view_all',Auth::user())}}" class="btn-primary btn btn-small blog_buttons">Look my blog</a>
                        <a href="{{route('blog.view_all_bloggers')}}" class="btn-primary btn btn-small blog_buttons">Other bloggers</a>
                    </div>
                </li>
                <li class="item">
                    <input type="radio"
                           id="messages"
                           name="basic_carousel"
                           value="messages"/>
                    <label class="label_message"
                           for="messages">Messages</label>
                    <div class="content content_message"><span class="picto"></span>
                        <h1>messages</h1>
                        <p>Messages</p>
                        <a href="{{route('messages.view_all')}}" class="btn-primary btn btn-small blog_buttons">Messages</a>
                    </div>
                </li>
{{--                <li class="item">--}}
{{--                    <input type="radio"--}}
{{--                           id="radio_The orange (specifically, the sweet orange) is the fruit of the citrus species Citrus ?? sinensis in the family Rutaceae."--}}
{{--                           name="basic_carousel"--}}
{{--                           value="The orange (specifically, the sweet orange) is the fruit of the citrus species Citrus ?? sinensis in the family Rutaceae."/>--}}
{{--                    <label class="label_orange"--}}
{{--                           for="radio_The orange (specifically, the sweet orange) is the fruit of the citrus species Citrus ?? sinensis in the family Rutaceae.">orange</label>--}}
{{--                    <div class="content content_orange"><span class="picto"></span>--}}
{{--                        <h1>orange</h1>--}}
{{--                        <p>The orange (specifically, the sweet orange) is the fruit of the citrus species Citrus ??--}}
{{--                            sinensis in the family Rutaceae.</p>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
        </div>
        <div id="middle-border"></div>
        <div id="right-zone"></div>
    </div>
    <style>
        .btn-primary{
            margin: 5px;
        }
    </style>
@endauth
    @guest()
        <img src="main_picture/main_picture.jpg" style="width: 100%; height: 100%">
    @endguest
@endsection
