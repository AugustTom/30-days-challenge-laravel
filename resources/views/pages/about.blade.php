@extends('layouts.app')

@section('content')
    <section class="relative block bg-gray-800 "  style="height: 300px;">
        <div class="text-center h-full pt-32 ">
        <span class=" align-middle text-3xl text-white font-bold uppercase tracking-wide">{{$title}}</span>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
             style="height: 70px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden"
                 xmlns="http://www.w3.org/2000/svg"
                 preserveAspectRatio="none"
                 version="1.1"
                 viewBox="0 0 2560 100"
                 x="0"
                 y="0">
                <polygon class="text-gray-300 fill-current"
                         points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    <section>
{{--        TODO FILL in the text--}}
        <div class="flex-auto mx-4 md:mx-auto  py-7 max-w-md md:max-w-3xl pt-10" >
            <p class="text-lg text-gray-700 text-center">

                This website is part of the Swansea University CS348 coursework. It was created by Auguste Tomaseviciute. The idea behin the site is that everyone is able to create challenges that last 30 days and invite others to participate. </p>
        </div>
    </section>

@endsection