<nav class="flex items-center bg-gray-800 p-3 flex-wrap">
    <a href="/" class="p-2 mr-4 inline-flex items-center">
        <span class="text-xl text-white font-bold uppercase tracking-wide">{{config('app.name','30 Days Challenge')}}</span>
    </a>
    <button
            class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler"
            data-target="#navigation">
        <i class="material-icons">menu</i>
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto"
            id="navigation">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto">
            @auth()
            <a href="/" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                <span>Home</span>
            </a>
            @endauth
            <a href="/about" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                <span>About</span>
            </a>
            @auth()
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex flex-row text-gray-900 bg-gray-200 items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Profile</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full md:max-w-screen-sm md:w-screen mt-2 origin-top-right">
                        <div class="px-2 pt-2 pb-4 bg-white rounded-md shadow-lg dark-mode:bg-gray-700">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <a class="flex flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   href="/posts/create">
                                    <div class="bg-teal-500 text-white rounded-lg p-3">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-semibold">Create a Challenge</p>
                                        <p class="text-sm">Share your challenge with community</p>
                                    </div>
                                </a>

                                <a class="flex flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   href="/dashboard">
                                    <div class="bg-teal-500 text-white rounded-lg p-3">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-semibold">Profile</p>
                                        <p class="text-sm">Check out your account</p>
                                    </div>
                                </a>


                                <form method="POST" action="{{ route('logout') }}" >
                                    @csrf
{{--                                    <button type="submit" class="flex flex row items-start items-start rounded-lg bg-transparent p-2">--}}
                                    <div class="flex flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                        <button type="submit" class="">
                                            <div class="bg-teal-500 text-white rounded-lg p-3">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                                            </div>
                                            <div class="ml-3 ">
                                                <p class="font-semibold">Log out</p>
                                                <p class="text-sm">Bye! </p>
                                            </div>
                                        </button>
                                    </div>
                                </form>
                                @if(Auth::user()->is_admin == true)
                                    <a class="flex flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                       href="{{route('register.admin')}}">
{{--                                        TODO change icon--}}
                                        <div class="bg-teal-500 text-white rounded-lg p-3">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="font-semibold">Create Admin</p>
                                            <p class="text-sm">Register another admin</p>
                                        </div>
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

            @elseauth()
                <a href="{{ route('login') }}" class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                    <span>Login</span>
                </a>
                <a href="{{ route('register') }}" class="flex flex-row text-gray-900 bg-gray-200 items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Register</span>
                </a>
            @endauth
        </div>
    </div>
</nav>


{{--<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">--}}
{{--    <a class="navbar-brand" href="/"></a>--}}
{{--    <div class="collapse navbar-collapse" id="navbarCollapse">--}}
{{--        <ul class="navbar-nav mr-auto">--}}
{{--            @auth--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            @endif--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="/about">About Us</a>--}}
{{--            </li>--}}

{{--        </ul>--}}

{{--        <ul class="nav navbar-nav navbar-right">--}}
{{--            @if (Route::has('login'))--}}
{{--                    @auth--}}
{{--                        <li class="nav-item"><a href="/posts/create"> <button class="btn btn-secondary">Create a challenge</button></a></li>--}}
{{--                        <li class="nav-item"><a href="{{ url('/dashboard') }}"><button class="btn btn-outline-secondary">Profile</button></a></li>--}}
{{--                        <li class="nav-item"><form method="POST" action="{{ route('logout') }}">--}}
{{--                                @csrf--}}
{{--                                <button class="btn btn-outline-secondary" type="submit">Log Out</button>--}}
{{--                            </form>--}}
{{--                        </li>--}}

{{--                    @else--}}
{{--                        <li class="nav-item"><a href="{{ route('login') }}" ><button class="btn btn-outline-secondary">Login</button></a></li>--}}

{{--                        @if (Route::has('register'))--}}
{{--                        <li class="nav-item"><a href="{{ route('register') }}"><button class="btn btn-outline-secondary">Register</button></a></li>--}}
{{--                        @endif--}}

{{--                    @endif--}}
{{--            @endif--}}
{{--        </ul>--}}


{{--    </div>--}}
{{--</nav>--}}