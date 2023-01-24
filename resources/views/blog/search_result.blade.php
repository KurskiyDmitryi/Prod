<div class="row">
@foreach($usersFromSearch as $user)
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
{{$usersFromSearch->links()}}
</div>
