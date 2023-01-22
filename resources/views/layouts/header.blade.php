<nav class="navbar navbar-expand-sm navbar-blue" style="background-color: #e3f2fd">
    <div class="container-fluid" style="display: flex">
        <a class="navbar-brand" href="{{route('index')}}">DailyBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            {{--            <a class="nav-link" href="{{route('calendar.index',Auth::id())}}">Calendar</a>--}}

            @guest()
                <div class="col-md-9">
                    <a class="nav-link" href="{{route('login')}}"
                       style="display: flex; justify-content: right">Login</a>
                    <a class="nav-link" href="{{route('register')}}" style="display: flex; justify-content: right">Register</a>
                </div>
            @endguest
            @auth()

                                <form action="{{ route('logout') }}" method="POST"
                                                          class="form-inline" style="position: absolute; bottom: 10px; right: 20px">
                                    @csrf
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-danger"
                                               value="Log out" style="">
                                    </div>

                                </form>

                <div>
{{--                    <button class="nav-link btn btn-sm btn-danger" style="position: absolute; bottom: 10px; right: 20px">Log out--}}

                    </button>

                </div>
            @endauth
        </div>
    </div>
</nav>
@include('css.blog_button')
