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
            <label for="exampleInputEmail1" class="form-label">From</label>
            <input type="text" class="form-control @error('from') is-invalid @enderror" id="from" name="from"
                   @if(!empty($user->profile->from))value="{{$user->profile->from}}" @endif
                   placeholder=@if(empty($user->profile->age))"empty"
                @endif>

            @error('from')
            <span class="invalid-feedback" role="alert">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sex" class="form-label">Age</label>
            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age"
                   value="@if(!empty($user->profile->age)){{$user->profile->age}}@endif"
                   placeholder=@if(empty($user->profile->age))"empty"
                @endif >
            @error('age')
            <span class="invalid-feedback" role="alert">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sex" class="form-label">Sex</label>
            <select class="form-select" aria-label="Default select example" name="sex" id="sex">
                <option class="option" value="Male"
                        @if(!empty($user->profile->sex) && $user->profile->sex == 'Male') selected @endif>Male
                </option>
                <option class="option" value="Female"
                        @if(!empty($user->profile->sex) && $user->profile->sex == 'Female') selected @endif>Female
                </option>
                <option class="option" value="Did not decide"
                        @if(!empty($user->profile->sex) && $user->profile->sex == 'Did not decide') selected @endif>Did
                    not decide
                </option>
                <option class="option" value="null"
                        @if(!empty($user->profile->sex) && $user->profile->sex == 'null')selected @endif>Empty
                </option>
            </select>
            <button type="submit" id="submit" class="btn btn-primary" style="margin-top: 15px">Update</button>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $('#error_reporting').html('');
        document.querySelector('#submit').addEventListener('click', async function (e) {
                e.preventDefault();
                var age = $('input#age').val();
                var from = $('input#from').val();
                var sex = $('.option').val();

                try {
                    const {data : {route}} = await axios.post('{{route('profile.update',$user->id)}}', {
                        age,
                        from,
                        sex
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
