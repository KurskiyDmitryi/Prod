@extends('layouts.base')
@section('title')
    Blog :: {{$user->name}}
@endsection
@section('content')
    <h1 style="color:skyblue; text-align: center"> Today :: {{date("F j, Y")}}</h1>
    <h2 style="text-align: center">Write a diary </h2>
    <div id="error_reporting"></div>
    <form class="postcard">
        <div class="form-row">
            <label for="title">Title</label><input type="text" id="title" required>
        </div>
        <div class="form-row">
            <label for="content">Content</label><textarea rows="5" name="content" id="content" required></textarea>
        </div>
        <div class="form-row">
            <label for="ps">P.S.</label><input type="text" id="ps">
        </div>
        <div class="form-row">
            <input type="submit" id="submit" value="I done">
        </div>
    </form>
    @include('css/index_blog_form')
@endsection
@push('js')
    <script type="text/javascript">
        let sub = document.querySelector('#submit');
        sub.addEventListener('click', async function (e) {
            e.preventDefault();
            let title = document.querySelector('#title').value;
            let cont = document.querySelector('#content').value;
            let ps = document.querySelector('#ps').value;
            try {
                const {data: {route}} = await axios.post('{{route('blog.store',Auth::id())}}', {
                    title,
                    cont,
                    ps,
                })
                location.href = route;
            } catch (e) {
                // document.querySelector('#error_reporting').removeChild(document.querySelector('#error_reporting').firstChild);

                var errors = e.response.data.errors;
                let er = document.querySelectorAll('#error_reporting > li')
                for (let a of er) {
                    a.remove()
                }
                for (let error in errors) {
                    let div = document.createElement('div');
                    var err = "<li style='color: red' class='errors'>" + errors[error] + "</li>";
                    document.querySelector('#' + 'error_reporting').innerHTML += err;
                }
            }

        })
    </script>
@endpush
