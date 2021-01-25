@extends('layouts.app')

@section('content')
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <div class="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg md:max-w-3xl">
        <form method="post" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2 md:max-w-3xl"
              enctype="multipart/form-data" action="{{ action('App\Http\Controllers\PostsController@store') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <label for="text"  class="px-4 pt-3 pb-2 text-gray-800 text-2xl font-bold uppercase">Your new challenge</label>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20
                    py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="text"
                              placeholder='Challenge here' required></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                        <button type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border
                        border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"> Post </button>
                        <button class="bg-white text-gray-700 font-medium py-1 px-4 border
                        border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Cancel</button>
                        <input class="bg-white text-gray-700 font-medium py-1 px-4 border
                        border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" id="image"
                               type="file"  name="image_placeholder">

                </div>
            </div>
        </form>
    </div>

@endsection