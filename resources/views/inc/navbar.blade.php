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
            <a href="/" class="lg:inline-flex rounded-lg lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                <span>Home</span>
            </a>

            @endauth
            <a href="/about" class="lg:inline-flex rounded-lg lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
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
            <div @click.away="open = false" class="relative z-50 " x-data="{ open: false }">
                    <button @click="open = !open" class="flex flex-row text-gray-900 bg-gray-200 items-center w-full px-3 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
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
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4">
                                                <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                                            </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="font-semibold">Profile</p>
                                        <p class="text-sm">Check out your account</p>
                                    </div>
                                </a>

                                {{--LOGOUT BUTTON--}}
                                <form method="POST" action="{{ route('logout') }}" >
                                    @csrf
                                    <div class="flex flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                        <button type="submit" class="inline-flex">
                                            <div class="bg-teal-500 text-white rounded-lg p-3">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4">

                                                        <path fill="none" d="M16.198,10.896c-0.252,0-0.455,0.203-0.455,0.455v2.396c0,0.626-0.511,1.137-1.138,1.137H5.117c-0.627,0-1.138-0.511-1.138-1.137V7.852c0-0.626,0.511-1.137,1.138-1.137h5.315c0.252,0,0.456-0.203,0.456-0.455c0-0.251-0.204-0.455-0.456-0.455H5.117c-1.129,0-2.049,0.918-2.049,2.047v5.894c0,1.129,0.92,2.048,2.049,2.048h9.488c1.129,0,2.048-0.919,2.048-2.048v-2.396C16.653,11.099,16.45,10.896,16.198,10.896z"></path>
                                                        <path fill="none" d="M14.053,4.279c-0.207-0.135-0.492-0.079-0.63,0.133c-0.137,0.211-0.077,0.493,0.134,0.63l1.65,1.073c-4.115,0.62-5.705,4.891-5.774,5.082c-0.084,0.236,0.038,0.495,0.274,0.581c0.052,0.019,0.103,0.027,0.154,0.027c0.186,0,0.361-0.115,0.429-0.301c0.014-0.042,1.538-4.023,5.238-4.482l-1.172,1.799c-0.137,0.21-0.077,0.492,0.134,0.629c0.076,0.05,0.163,0.074,0.248,0.074c0.148,0,0.294-0.073,0.382-0.207l1.738-2.671c0.066-0.101,0.09-0.224,0.064-0.343c-0.025-0.118-0.096-0.221-0.197-0.287L14.053,4.279z"></path>
                                                    </svg>
                                            </div>
                                            <div class="ml-auto ">
                                                <p class="font-semibold  ml-3">Log out</p>
                                                <p class="text-sm  ml-3">Bye! </p>
                                            </div>
                                        </button>
                                    </div>
                                </form>
                                @if(Auth::user()->is_admin == true)
                                    <a class="flex flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                       href="{{route('register.admin')}}">

                                        <div class="bg-teal-500 text-white rounded-lg p-3">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4">
                                                    <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                                </svg>
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
{{--    Pusher.logToConsole = true;--}}

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
        })
    .listen(".PostLiked", (e) => {
        console.log(e)
        showLikeNotification(e);
        hideNotification();
    } );

    function showNotification(data){
        // var jsonData = JSON.stringify()(data)

        $('#notification-block').append(`
        <a href="/posts/`+data.challenge_id+`">
            <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden my-2">
                <div class="w-2 bg-gray-800"></div>
                    <div class="flex items-center px-2 py-3">
                        <img class="w-12 h-12 object-cover rounded-full" src="` + data.commentator_avatar + `">
                    <div class="mx-3">
                        <h2 class="text-xl font-semibold text-gray-800">`+ data.commentator +` commented on your challenge.</h2>
                        <p class="text-gray-600">`+data.comment+`</p>
                    </div>
                </div>
            </div>
        </a>`);

    }


function showLikeNotification(data){
    // var jsonData = JSON.stringify()(data)

    $('#notification-block').append(`
        <a href="/posts/`+data.challenge_id+`">
            <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden my-2">
                <div class="w-2 bg-gray-800"></div>
                    <div class="flex items-center px-2 py-3">
                        <img class="w-12 h-12 object-cover rounded-full" src="` + data.avatar + `">
                    <div class="mx-3">
                        <h2 class="text-xl font-semibold text-gray-800">`+ data.user +` liked your challenge</h2>
                        <p class="text-gray-600"></p>
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

