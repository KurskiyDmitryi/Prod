<nav class="navbar navbar-expand-sm navbar-blue" style="background-color: #e3f2fd">
    <div class="container-fluid" style="display: flex">
        <a class="navbar-brand" href="{{route('index')}}">DailyBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @auth()
                <a class="nav-link active" aria-current="page"
                   href="{{route('profile.index',Auth::user())}}">Profile</a>

{{--            <a class="nav-link" href="{{route('blog.index')}}">Blog</a>--}}
                <div class="dropdown">
                    <button class="dropbtn">Blog</button>
                    <div class="dropdown-content">
                        <a href="{{route('blog.create')}}">Write blog</a>
                        <a href="{{route('blog.view_all',Auth::user()->slug)}}">Look all</a>
                    </div>
                </div>
            <a class="nav-link" href="{{route('calendar.index',Auth::id())}}">Calendar</a>

            @endauth
            @guest()
                <div class="col-md-9">
                    <a class="nav-link" href="{{route('login')}}"
                       style="display: flex; justify-content: right">Login</a>
                    <a class="nav-link" href="{{route('register')}}" style="display: flex; justify-content: right">Register</a>
                </div>
            @endguest
            @auth()
                <form action="{{ route('logout') }}" method="POST"
                      class="form-inline" style="display: flex">
                    @csrf
                    <input type="submit" class="btn btn-danger"
                           value="Выход" style="display: flex; justify-content: right">
                </form>
            @endauth
        </div>
    </div>
</nav>
@include('css.blog_button')
