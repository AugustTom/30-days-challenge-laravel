@extends('layouts.app')
@section('content')
    @if(count($challenges) > 0)
        <div class="container">
            @foreach($challenges as $challenge)
                <div class="well">
                    <img src="{{asset("images/post_images/$challenge->image")}}">
                    <h3>{{$challenge->text}}</h3>
                    <a href="posts\{{$challenge->id}}\edit" class="btn btn-secondary float-right">Edit</a>

                    <small>Posted by {{$challenge->user->name}}</small>
                    <small>{{$challenge->created_at}}</small>

                </div>
            @endforeach
        </div>
{{--        TODO: fix weird pagination issue--}}
        {{ $challenges->links() }}
    @else
        <p>It's empty :( </p>
    @endif


@endsection
