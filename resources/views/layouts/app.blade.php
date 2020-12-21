<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{(asset('css/app.css'))}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title> {{config('app.name','30 Days Challenges')}}</title>
{{--    TODO change it to <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

{{--    Axios script--}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
@yield('script')
<body>
    @include('inc.navbar')
    @include('inc.messages')
    @yield('content')
</body>
</html>
