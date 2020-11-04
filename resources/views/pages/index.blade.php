@extends('layouts.app')
@section('content')
    @if(count($posts) > 0)
        <div class="container">
            @foreach($posts as $post)
                <div class="well">
                    <h3>{{$post->text}}</h3>
                    <a href="\{{$post->id}}\edit" class="btn btn-secondary float-right">Edit</a>
                    <small>Written on {{$post->created_at}}</small>
                    <small>Written by {{$post->user->name}}</small>
                </div>
            @endforeach
        </div>
{{--        TODO: fix weird pagination issue--}}
        {{ $posts->links() }}
    @else
        <p>It's empty :( </p>
    @endif


@endsection
