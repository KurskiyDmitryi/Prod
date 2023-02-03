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
                        {{--                        {{dd($user->getMedia('avatars')->first()->getUrl())}}--}}
                        <div class="panel-body">
                            <div class="text-center" id="author">
                                <img
                                    src="@if(!empty($user->getMedia('avatars')->first())){{$user->getMedia('avatars')->first()->getUrl()}}@else http://prod.loc/avatar/empty_avatar.png @endif"
                                    style="width: 200px; height: 200px">
                                <h3>{{$user->name}}</h3>
                                <small class="label label-warning">@if(!empty($user->profile->city))
                                        {{$user->profile->city}}
                                    @endif</small>
                                <p>in developing</p>
                                @if(Auth::id() == $user->id)
                                    <form name="form" enctype="multipart/form-data" method="post" id="form">
                                        @csrf
                                        <input type="file" name="file" id="file" class="btn info">
                                        @if(empty($user->getMedia('avatars')->first()))
                                            <button id="store_avatar" class="btn info">Add</button>
                                        @else
                                            <button id="change_avatar" class="btn info">Change</button>
                                        @endif
                                    </form>

                                    <button class="button_delete_avatar">х</button>
                                @endif
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
                                        <tr>
                                            <td class="active">Registered:</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active">Last activity</td>
                                            <td>in developing</td>
                                        </tr>
                                        <tr>
                                            <td class="active">Country:</td>
                                            <td>@if(!empty($user->profile->country))
                                                    {{$user->profile->country}}
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <td class="active">City:</td>
                                            <td>@if(!empty($user->profile->city))
                                                    {{$user->profile->city}}
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <td class="active">Sex:</td>
                                            <td>@if(!empty($user->profile->sex))
                                                    {{$user->profile->sex}}
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <td class="active">Age:</td>
                                            <td>in developing</td>
                                        </tr>
                                        <tr>
                                            <td class="active">Family status:</td>
                                            <td>@if(!empty($user->profile->family_status))
                                                    {{$user->profile->family_status}}
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <td class="active">User rating:</td>
                                            <td> </i>in developing</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="???????" id="contact">
                                    <p></p>
                                    @if(Auth::id() != $user->id)
                                        <form role="form" method="post" action="{{route('message.send')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Text of message</label>
                                                <textarea class="form-control rounded"
                                                          style="height: 100px;" name="message"></textarea>
                                                <input type="hidden" value="{{$user->id}}" name="receiver_id">
                                                <input type="hidden" value="{{Auth::id()}}" name="sender_id">
                                                <p class="help-block">Текст сообщения будет отправлен пользователю</p>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success" data-original-title=""
                                                        title="">Отправить
                                                </button>
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
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="file"] {
            padding: 12px 20px;
            border: 2px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }

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
@push('js')
    <script type="text/javascript">
        @if(\Illuminate\Support\Facades\Auth::id() == $user->id)
        let form = document.querySelector('#form')
        if (document.querySelector('#store_avatar')) {
            document.querySelector('#store_avatar').addEventListener('click', avatar);
        } else {
            document.querySelector('#change_avatar').addEventListener('click', avatar);
        }


        async function avatar(a) {
            a.preventDefault();
            let obj = new FormData(form);

            try {
                const {data: {route}} = await axios.post(document.querySelector('#store_avatar') ? '/profile/avatar/store' : '/profile/avatar/change', obj, {
                    dataType: 'html',
                })
                location.href = route;
            } catch (e) {

            }
        }


        let del = document.querySelector('.button_delete_avatar');
        del.addEventListener('click', async function () {
            try {
                const res = await axios.post('{{route('delete.avatar')}}', {id: {{Auth::id()}}})
                location.href = res.data.route;
            } catch (e) {

            }
        })
        @endif
    </script>
@endpush
