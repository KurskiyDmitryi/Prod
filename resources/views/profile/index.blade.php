@extends('layouts.base')
@section('title')
    Profile :: {{$user->name}}
@endsection
@section('content')
    <div class="container-fluid">
        <div id="main">


            <div class="row" id="real-estates-detail">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <header class="panel-title">
                                <div class="text-center">
                                    <strong>Site user</strong>
                                </div>
                            </header>
                        </div>
                        <div class="panel-body">
                            <div class="text-center" id="author">
                                <img src="https://bootstraptema.ru/snippets/element/2016/profilesection/myprofile.jpg">
                                <h3>{{$user->name}}</h3>
                                <small class="label label-warning">{{$user->profile->from}}</small>
                                <p>in developing</p>
                                <p class="sosmed-author">
                                    <a href="#"><i class="fa fa-facebook" title="Facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter" title="Twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" title="Google Plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" title="Linkedin"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div id="myTabContent" class="tab-content">
                                <hr>
                                <div id="detail">
                                    <h4>Profile</h4>
                                    <table class="table table-th-block">
                                        <tbody>
                                        <tr><td class="active">Registered:</td><td>{{$user->created_at}}</td></tr>
                                        <tr><td class="active">Last activity</td><td>in developing</td></tr>
                                        <tr><td class="active">Country:</td><td>{{$user->profile->country}}</td></tr>
                                        <tr><td class="active">City:</td><td>{{$user->profile->city}}</td></tr>
                                        <tr><td class="active">Sex:</td><td>{{$user->profile->sex}}</td></tr>
                                        <tr><td class="active">Age:</td><td>in developing</td></tr>
                                        <tr><td class="active">Family status:</td><td>{{$user->profile->family_status}}</td></tr>
                                        <tr><td class="active">User rating:</td><td> </i>in developing</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="???????" id="contact">
                                    <p></p>
                                    @if(Auth::id() != $user->profile->user_id)
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Text of message</label>
                                            <textarea class="form-control rounded" style="height: 100px;"></textarea>
                                            <p class="help-block">Текст сообщения будет отправлен пользователю</p>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" data-original-title="" title="">Отправить</button>
                                        </div>
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.main -->



    <style>

        #main {
            background-color: #f2f2f2;
            padding: 20px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            border-bottom: 4px solid #ddd;
        }
        #real-estates-detail #author img {
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            -ms-border-radius: 100%;
            -o-border-radius: 100%;
            border-radius: 100%;
            border: 5px solid #ecf0f1;
            margin-bottom: 10px;
        }
        #real-estates-detail .sosmed-author i.fa {
            width: 30px;
            height: 30px;
            border: 2px solid #bdc3c7;
            color: #bdc3c7;
            padding-top: 6px;
            margin-top: 10px;
        }
        .panel-default .panel-heading {
            background-color: #fff;
        }
        #real-estates-detail .slides li img {
            height: 450px;
        }
    </style>
@endsection
