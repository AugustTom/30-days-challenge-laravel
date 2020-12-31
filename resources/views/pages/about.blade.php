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
            <p class="text-lg text-gray-700">

                orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised
                in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>
    </section>

@endsection