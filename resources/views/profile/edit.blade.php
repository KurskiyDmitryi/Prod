@extends('layouts.base')
@section('title')
    Edit:: {{$user->name}}
@endsection
@section('content')
    {{--    <div style="margin:15px">--}}
    {{--        <form method="post">--}}
    {{--            <label for="from" style="padding: 10px">--}}
    {{--                From--}}
    {{--                <input name="from" type="text">--}}
    {{--            </label>--}}
    {{--            <br>--}}
    {{--            <label for="age" style="padding: 10px">--}}
    {{--                Age--}}
    {{--                <input name="age" type="number">--}}
    {{--            </label>--}}
    {{--            <br>--}}
    {{--            <label for="sex">--}}

    {{--            </label>--}}
    {{--        </form>--}}
    {{--    </div>--}}

    <h1 style="text-align: center ; color: aqua">Profile :: {{$user->name}}</h1>
    <div id="error_reporting"></div>
    <div style="margin:15px 300px 15px 300px">


        <div class="mb-3">
            <form>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror"
                           @if(!empty($user->profile->city))value="{{$user->profile->city}}" @endif
                           placeholder=@if(empty($user->profile->city))"empty"
                        @endif>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country"
                           class="form-control @error('country') is-invalid @enderror"
                           @if(!empty($user->profile->country))value="{{$user->profile->country}}" @endif
                           placeholder=@if(empty($user->profile->country))"empty"
                        @endif>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth"
                           class="form-control @error('date_of_birth') is-invalid @enderror"
                           @if(!empty($user->profile->date_of_birth))value="{{$user->profile->date_of_birth}}" @endif
                           placeholder=@if(empty($user->profile->date_of_birth))"empty"
                        @endif>

                </div>
                <div class="form-group">
                    <label for="sex">Sex:</label>
                    <select id="sex" name="sex" class="form-control">
                        <option value="male"
                                @if(!empty($user->profile->sex) && $user->profile->sex == 'male') selected @endif>Male
                        </option>
                        <option value="female"
                                @if(!empty($user->profile->sex) && $user->profile->sex == 'female') selected @endif>
                            Female
                        </option>
                        <option value="other"
                                @if(!empty($user->profile->sex) && $user->profile->sex == 'other') selected @endif>Other
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="family_status">Family Status:</label>
                    <select id="family_status" name="family_status" class="form-control">
                        <option value="single"
                                @if(!empty($user->profile->family_status) && $user->profile->family_status == 'single') selected @endif>
                            Single
                        </option>
                        <option value="married"
                                @if(!empty($user->profile->family_status) && $user->profile->family_status == 'married') selected @endif>
                            Married
                        </option>
                        <option value="divorced"
                                @if(!empty($user->profile->family_status) && $user->profile->family_status == 'divorced') selected @endif>
                            Divorced
                        </option>
                        <option value="widowed"
                                @if(!empty($user->profile->family_status) && $user->profile->family_status == 'widowed') selected @endif>
                            Widowed
                        </option>
                    </select>
                    <div class="form-group">
                        <label for="type">Account type:</label>
                        <select id="type" name="type" class="form-control">
                            <option value="public"
                                    @if(!empty($user->profile->type) && $user->profile->type == 'public') selected @endif>
                                Public
                            </option>
                            <option value="private"
                                    @if(!empty($user->profile->type) && $user->profile->family_status == 'private') selected @endif>
                                Private
                            </option>
                        </select>
                </div>
                <div class="form-group">
                    <button type="submit" value="Submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <style>
                form {
                    width: 60%;
                    margin: 0 auto;
                }

                .form-group {
                    margin-bottom: 1.5rem;
                }

                label {
                    font-weight: bold;
                    display: block;
                    margin-bottom: 0.5rem;
                }

                input, select {
                    width: 100%;
                    padding: 0.5rem;
                    border-radius: 0.25rem;
                    border: 1px solid #ccc;
                }

            </style>

            @endsection
            @push('js')
                <script type="text/javascript">
                    console.log(document.querySelector('#sex').value);
                    $('#error_reporting').html('');
                    document.querySelector('#submit').addEventListener('click', async function (e) {
                            e.preventDefault();
                            var country = $('input#country').val();
                            var city = $('input#city').val();
                            var sex = document.querySelector('#sex').value;
                            var date_of_birth = $('input#date_of_birth').val();
                            var family_status = $('#family_status').val();
                            var type = $('#type').val();

                            try {
                                const {data: {route}} = await axios.post('{{route('profile.update',$user->slug)}}', {
                                    country,
                                    city,
                                    sex,
                                    date_of_birth,
                                    family_status,
                                    type,
                                })

                                location.href = route;

                            } catch (e) {

                                if (e) {
                                    document.querySelector('#error_reporting').removeChild(document.querySelector('#error_reporting').firstChild);
                                    document.querySelector('#error_reporting').appendChild(document.createElement('ul'))
                                    var errors = e.response.data.errors;
                                    for (let error in errors) {
                                        var err = "<li style='color: red'>" + errors[error] + "</li>";
                                        document.querySelector('#' + 'error_reporting' + ' ' + 'ul').innerHTML += err;
                                    }
                                }
                            }
                        }
                    )


                </script>
    @endpush
