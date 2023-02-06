@extends('layouts.base')
@section('title')
    Search :: Bloggers
@endsection
@section('content')
{{--    {{dd($usersPaginated)}}--}}
    <div style="position: relative; margin-left: 800px; margin-top: 15px">
        <form id="search-field">
            <input type="checkbox" id="show-search-field"/>
            <label for="show-search-field"><span>Search</span></label>
            <span>
    <input type="text" id="search" placeholder="search"/>
    <button type="submit" form="search-field" title="Submit">&nbsp;</button>
  </span>
        </form>
    </div>
    <div id="search_result">
        <div class="row">
            @foreach($usersPaginated as $user)
                <div class="col-sm-4">
                    <div class="card" style="margin-top: 100px;margin-left: 50px; margin-bottom: 40px">
                        <img src="@if(!empty($user->getMedia('avatars')->first())){{$user->getMedia('avatars')->first()->getUrl()}}@else http://prod.loc/avatar/empty_avatar.png @endif" alt="Avatar" style="width:100%">
                        <div class="container">
                            <h4><b>{{$user->name}}</b></h4>
                            <p>@if(!empty($user->profile->country)){{$user->profile->country}}@endif</p>
                            <a href="{{route('profile.index',\App\Models\User::find($user->id))}}">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$usersPaginated->links()}}
        </div>
    </div>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 40%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 2px 16px;
        }
    </style>
@endsection
@push('js')
    <script type="text/javascript">
        let search = document.querySelector('#search');
        search.addEventListener('keyup', async function (e) {
            // e.preventDefault()
            let keyWord = document.querySelector('#search').value;
            console.log(keyWord)
            try {
                const response = await axios.post('{{route('blog.search')}}', {
                    keyWord,
                })
                document.querySelector('.row').remove();
                var htmlObject = document.createElement('div');
                htmlObject.innerHTML = response.data;
                document.querySelector('#search_result').append(htmlObject)


            } catch (e) {

            }
        })

    </script>
@endpush
