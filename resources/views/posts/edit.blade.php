@extends('layouts.app')

@section('content')
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit post</h1>
                <form method="post" action="{{action('App\Http\Controllers\PostsController@destroy',[$post ->id]) }}">
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
{{--                                                    TODO: add image submission here--}}
                        <button class="btn btn-secondary" style="float: right">Upload Image</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
    </form>
@endsection