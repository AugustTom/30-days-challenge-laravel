@extends('layouts.app')
@section('script')

@endsection
@section('content')
    <div id="app">
        @{{ message }}
    </div>


    @if(count($challenges) > 0)
        <div class="container">
            @foreach($challenges as $challenge)
                <div class="col">
                    <div class="card m-3 p-3">
                        <div class="bg-white comment-section">
                            @if(Auth::id() == $challenge->user_id)
                                <a href="posts\{{$challenge->id}}\edit" class="btn btn-secondary float-right">Edit</a>
                            @endif
                            <div class="d-flex flex-row user p-2">
                                <img class="rounded-circle" src="https://i.imgur.com/EQk6lCz.jpg" width="50">
                                <div class="d-flex flex-column ml-2">
                                    <span class="name font-weight-bold">{{$challenge->user->name}}</span>
                                    <span>{{$challenge->created_at}}</span></div>
                            </div>
                            <div class="mt-2 p-2">
                                <p class="comment-content">{{$challenge->text}}</p>
                            </div>
                            @if($challenge->image != null )
                                <img src="{{asset("images/post_images/$challenge->image")}}">
                            @endif

                        </div>

                        <input type="text" class="form-control" name='comment_text' placeholder="Enter your comment...">



                    @foreach(\App\Models\Comment::where('challenge_id',$challenge->id)->get() as $comment)
                        <div class="mt-2">
                            <div class="d-flex flex-row p-3"> <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-row align-items-center">
                                            <span class="mr-2">{{\App\Models\User::where('id',$comment->user_id)->first()->name}}</span>
                                        </div>
                                        <small>{{$comment->created_at}}</small>
                                    </div>
                                    <p class="text-justify comment-text mb-0">{{$comment->text}}</p>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



            @endforeach
        </div>
        {{ $challenges->links() }}
    @else
        <p>It's empty :( </p>
    @endif

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!'
            }
        })
    </script>
@endsection
