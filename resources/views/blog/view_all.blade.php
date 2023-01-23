@extends('layouts.base')
@section('title')
    Blog :: {{$user->name}}
@endsection
@section('content')
    <h1 class="caption_name"> {{$user->name}} :: Diary</h1>
    {{--    <ul>--}}
    {{--    @foreach($user->blogs()->latest()->get() as $blog)--}}
    {{--        <li style="border: skyblue solid 1px; margin: 10px; padding: 10px">--}}
    {{--            <h2 id="view_one">Title  :: <a href="{{route('blog.view_one',['user'=>Auth::user(),'blog'=>$blog->slug])}}" style="">{{$blog->title}}</a> </h2>--}}
    {{--            <h6>Created :: {{$blog->created_at}}</h6>--}}
    {{--        </li>--}}
    {{--    @endforeach--}}
    {{--    </ul>--}}
    {{--    <div class="blog_all">--}}
    <div class="row">
        @foreach($blogPaginated as $blog)
            <div class="col-sm-4">
                <div class="blog-card spring-fever">
                    <div class="title-content">
                        <h3>{{$blog->title}}</h3>
                        <hr/>
                        <div class="intro">{{$blog->content}}</div>
                    </div><!-- /.title-content -->
                    <div class="card-info">
                        <a href="{{route('blog.view_one',[Auth::user(),$blog->slug])}}" style="color: greenyellow">Details</a>
                    </div><!-- /.card-info -->
                    <div class="utility-info">
                        <ul class="utility-list">
                            {{--                            <li class="comments">12</li>--}}
                            <li class="date">{{$blog->created_at}}</li>
                        </ul>
                    </div><!-- /.utility-info -->
                    <div class="gradient-overlay"></div>
                    <div class="color-overlay"></div>
                </div><!-- /.blog-card -->
            </div>
        @endforeach
    </div>
    {{$blogPaginated->links()}}


    <style>
        #view_one a:hover {
            color: skyblue;
        }
    </style>
@endsection
