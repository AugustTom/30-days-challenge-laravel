@extends('layouts.app')
@section('script')

@endsection
@section('content')

{{--    TODO make this prettier--}}
<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
    <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">
            <h1 class="text-grey-darkest ">List of users</h1>
        </div>
        <div>
            @foreach($users as $user)
                <div class="flex mb-4 items-center">
                    <p class="w-full text-grey-darkest">{{$user->name}}</p>

                    <form method="post" action="{{action('App\Http\Controllers\UserController@changeRights', $user -> id) }}">
                        @csrf
                        @method('PUT')
                        <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-grey hover:bg-grey">
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
                        <button type="submit" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove</button>
                    </form>

                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
