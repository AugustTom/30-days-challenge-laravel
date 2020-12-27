<nav class="flex items-center bg-gray-800 p-3 flex-wrap" id ='bod'>
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
{{--                    --}}{{--                Notification pull down bar --}}
{{--                    <div x-data="{ dropdownOpen: false }" class="relative">--}}
{{--                        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-grey p-2 focus:outline-none">--}}
{{--                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />--}}
{{--                            </svg>--}}
{{--                        </button>--}}

{{--                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>--}}

{{--                        <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">--}}
{{--                            <div class="py-2 notification-list">--}}

{{--                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">--}}
{{--                                    <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">--}}
{{--                                    <p class="text-gray-600 text-sm mx-2">--}}
{{--                                        <span class="font-bold" href="#">Sara Salah</span> replied on the <span class="font-bold text-blue-500" href="#">Upload Image</span> artical . 2m--}}
{{--                                    </p>--}}
{{--                                </a>--}}

{{--                            </div>--}}
{{--                            <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">See all notifications</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                Profile dropdown --}}
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            @else
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
<div id="notification-block" class="fixed bottom-0 right-0 m-8">

</div>

@auth()
<script src="//js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{ asset('js/echo.iife.js') }}"></script>
<script src="{{ asset('js/echo.js') }}"></script>
<script type="text/javascript">

{{--    TODO COMMENT OUT--}}
    Pusher.logToConsole = true;

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '1eca814a7567b4cf8958',
        cluster: 'eu',
        forceTLS: true});

    var channel = Echo.private('notifications.{{Auth::user()->id}}')

    channel.listen(".CommentCreated", (e) => {

        console.log(e)
            showNotification(e);
            hideNotification();
        });

    function showNotification(data){
        // var jsonData = JSON.stringify()(data)

        $('#notification-block').append(`
        <a href="/posts/`+data.challenge_id+`">
            <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden my-2">
                <div class="w-2 bg-gray-800"></div>
                    <div class="flex items-center px-2 py-3">
                        <img class="w-12 h-12 object-cover rounded-full" src="">
                    <div class="mx-3">
                        <h2 class="text-xl font-semibold text-gray-800">`+ data.commentator +` commented on your challenge.</h2>
                        <p class="text-gray-600">`+data.comment+`</p>
                    </div>
                </div>
            </div>
        </a>`);

    }
    function hideNotification(){
        setTimeout(function (){
        $('#notification-block').hide()
    }, 50000);
    }

</script>
@endauth

