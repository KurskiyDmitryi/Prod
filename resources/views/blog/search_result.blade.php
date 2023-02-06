<div class="row">
@foreach($usersFromSearch as $user)
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
{{$usersFromSearch->links()}}
</div>
