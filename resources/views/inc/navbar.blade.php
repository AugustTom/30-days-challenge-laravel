<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">{{config('app.name','30 Days Challenge')}}</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About Us</a>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/posts/create"> <button class="btn btn-secondary">Create a challenge</button></a></li>
        </ul>
{{--        <form class="form-inline mt-2 mt-md-0">--}}
{{--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
{{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}
    </div>
</nav>