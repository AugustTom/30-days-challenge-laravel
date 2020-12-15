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
                    <h1>Create post</h1>
                    <form method="post" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\PostsController@store') }}">
                    @csrf
                        <div class="form-group">
                            <label for="text">Your Post</label>
                            <textarea rows="5" class="form-control" name="text" ></textarea>
                        </div>
                        <div class="form-group">
                            <p><span class="require">*</span> - required fields</p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <button class="btn btn-default">Cancel</button>
                            <input style="float: right" id="image"
                                   type="file" class="btn btn-secondary" name="image_placeholder">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </form>
@endsection