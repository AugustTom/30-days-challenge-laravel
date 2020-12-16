@extends('layouts.app')

@section('content')

    @if(count($challenges) > 0)
        <div class="container">
            @foreach($challenges as $challenge)
                <div class="well">
                    @if($challenge->image != null )
                        <img src="{{asset("images/post_images/$challenge->image")}}">
                    @endif
                    <h3>{{$challenge->text}}</h3>
                    @if(Auth::id() == $challenge->user_id)
                        <a href="posts\{{$challenge->id}}\edit" class="btn btn-secondary float-right">Edit</a>
                    @endif
                    <small>Posted by {{$challenge->user->name}}</small>
                    <small>{{$challenge->created_at}}</small>
{{--                    TODO add comments--}}

                </div>
            @endforeach
        </div>
        {{ $challenges->links() }}
    @else
        <p>It's empty :( </p>
    @endif


@endsection
