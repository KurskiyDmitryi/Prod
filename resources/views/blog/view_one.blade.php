@extends('layouts.base')
@section('title')
    Blog :: {{$user->name}}
@endsection
@section('content')
    <h1 style="text-align: center; color: skyblue; margin-top: 50px">Title :: {{$blog->title}}</h1>
    <h2 style="text-align:center; color: skyblue; margin-top: 10px; width: 500px">Content : </h2><p
        style="margin-left: 15px; width:500px">{{$blog->content}}</p>
    @if(!empty($blog->ps))
        <h2 style="text-align:center; color: skyblue; margin-top: 50px; width: 500px">P.S. :</h2> <p
            style="margin: 15px; width: 500px">{{$blog->ps}}</p>
    @endif
    <button class='button_menu back' id="back">Back</button>
    <button class='button_menu delete' id="delete">Delete</button>
    <h6 style="text-align: center; margin-top: 80px">Created :: {{$blog->created_at}}</h6>
    <style>


    </style>
@endsection
@push('js')
    <script type="text/javascript">
        document.querySelector('#back').addEventListener('click', function () {
            location.href = '{{route('blog.view_all',\Illuminate\Support\Facades\Auth::id())}}';
        })
        document.querySelector('#delete').addEventListener('click', async function () {
                try {
                    const {data: {route}} = await axios.delete('{{route('blog.delete',$blog->id)}}')
                    location.href = route;
                } catch
                    (e) {
                    console.log(e)
                }
            }
        )
    </script>
@endpush
