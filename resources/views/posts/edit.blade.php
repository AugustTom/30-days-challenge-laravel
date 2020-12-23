@extends('layouts.app')

@section('content')
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <div class="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg">

            <div class="flex flex-wrap -mx-3 mb-6">
                <label for="text"  class="px-4 pt-3 pb-2 text-gray-800 text-lg">Edit your challenge</label>
                <form method="post" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\PostsController@update',[$post ->id]) }}">
                    @csrf
                    @method('PUT')
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20
                    py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="text"
                               required>{{$post->text}}</textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">

                    <button type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border
                        border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Update</button>
                    <button class="bg-white text-gray-700 font-medium py-1 px-4 border
                        border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Cancel</button>
                    <input class="bg-white text-gray-700 font-medium py-1 px-4 border
                        border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" id="image"
                           type="file"  name="image_placeholder">
                </div>
        </form>

                    <form method="post"  enctype="multipart/form-data" action="{{action('App\Http\Controllers\PostsController@destroy',[$post ->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border
                        border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Delete</button>
                    </form>

            </div>

        <div>
            <img src="{{asset("images/post_images/$post->image")}}">
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit post</h1>
                <form method="post"  enctype="multipart/form-data" action="{{action('App\Http\Controllers\PostsController@destroy',[$post ->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="float-right btn btn-danger">Delete</button>
                </form>

                <form method="post" action="{{ action('App\Http\Controllers\PostsController@update',[$post ->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="text">Your Post</label>
                        <textarea rows="5" class="form-control" name="text" >{{$post->text}}</textarea>
                    </div>
                    <div class="form-group">
                        <p><span class="require">*</span> - required fields</p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-default" href="/">Cancel</a>
                        <input style="float: right" id="image"
                               type="file" class="btn btn-secondary" name="image_placeholder">
                    </div>
                    <div class="form-group">
                        <img src="{{asset("images/post_images/$post->image")}}">
                    </div>

                </form>

            </div>

        </div>
    </div>
    </form>
@endsection