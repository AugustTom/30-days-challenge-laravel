@extends('layouts.app')
@section('script')

@endsection
@section('content')

    <section class="relative block bg-gray-800 h-24" >

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
<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans relative">
    <div class="bg-white rounded-lg shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg my-10">
        <div class="mb-4">
            <span class="text-grey-darkest text-2xl font-bold uppercase my-4">User admin panel</span>
        </div>
        <div>
            @foreach($users as $user)
                <div class="flex mb-4 items-center">
                    <p class="w-full text-grey-darkest">{{$user->name}}</p>

                    <form method="post" action="{{action('App\Http\Controllers\UserController@changeRights', $user -> id) }}">
                        @csrf
                        @method('PUT')
                        <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white hover:bg-gray-800 text-grey border-grey hover:bg-grey">
                            @if($user->is_admin == true)
                                {{$usr_type = "Admin"}}
                            @else
                                {{$usr_type = "User"}}
                            @endif
                        </button>
                    </form>


                    <form method="post" action="{{action('App\Http\Controllers\UserController@destroy', $user -> id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex-no-shrink p-2 ml-2 border-2 rounded hover:text-white hover:bg-gray-800 hover:bg-red">Remove</button>
                    </form>

                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
