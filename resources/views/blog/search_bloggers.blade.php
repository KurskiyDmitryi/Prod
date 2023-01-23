@extends('layouts.base')
@section('title')
    Search :: Bloggers
@endsection
@section('content')
    <div style="position: relative; margin-left: 800px; margin-top: 15px">
        <form id="search-field">
            <input type="checkbox" id="show-search-field" />
            <label for="show-search-field"><span>Search</span></label>
            <span>
    <input type="text" id="search" placeholder="search" />
    <button type="submit" form="search-field" title="Submit">&nbsp;</button>
  </span>
        </form>
    </div>
    <div  class="row">
        @foreach($usersPaginated as $user)
            <div class="col-sm-4">
            <div class="card" style="margin-top: 100px;margin-left: 50px; margin-bottom: 40px">
                <img src="/main_picture/main_picture.jpg" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b>{{$user->name}}</b></h4>
                    <p>Architect & Engineer</p>
                </div>
            </div>
            </div>
        @endforeach
        {{$usersPaginated->links()}}
    </div>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 30%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container {
            padding: 2px 16px;
        }
    </style>
@endsection
@push('js')
    <script type="text/javascript">
        let search = document.querySelector('#search');
        search.addEventListener('input', async function(e){
            // e.preventDefault()
            let data = document.querySelector('#search').value;
            console.log(data)
            try{
                const data = await axios.post('{{route('blog.search')}}',{
                    data,
                })
            }catch (e) {

            }
        })

    </script>
@endpush
