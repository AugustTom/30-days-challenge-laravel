<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{(asset('css/app.css'))}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <title> {{config('app.name','30 Days Challenges')}}</title>
{{--    TODO change it to <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

{{--    Axios script--}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@yield('script')
<body class="bg-gray-300">
        @include('inc.navbar')
        <div class="min-h-screen bg-gray-300">
                @include('inc.messages')
                @yield('content')
        </div>

</body>
    <footer>
        @include('inc.footer')
    </footer>
</html>
