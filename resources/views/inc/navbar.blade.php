<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">{{config('app.name','30 Days Challenge')}}</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            @auth
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="/about">About Us</a>
            </li>

        </ul>
{{--        TODO: add dropdown for logging out--}}
        <ul class="nav navbar-nav navbar-right">
            @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="/posts/create"> <button class="btn btn-secondary">Create a challenge</button></a></li>
                        <li class="nav-item"><a href="{{ url('/dashboard') }}"><button class="btn btn-outline-secondary">Profile</button></a></li>
                        <li class="nav-item"><form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-outline-secondary" type="submit">Log Out</button>
                            </form>
                        </li>

                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" ><button class="btn btn-outline-secondary">Login</button></a></li>

                        @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}"><button class="btn btn-outline-secondary">Register</button></a></li>
                        @endif
{{--                        TODO reroute to home page rather than dashboard after loggin in--}}
                    @endif
            @endif
        </ul>


    </div>
</nav>