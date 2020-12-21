@extends('layouts.app')
@section('script')

@endsection
@section('content')



    @if(count($challenges) > 0)
        <div id="comment-section">
            @{{ comments }}
        </div>
        <div class="container">
            @foreach($challenges as $challenge)
                <div class="col">
                    <div class="card m-3 p-3">
                        <div>

                                <div class="bg-white comment-section">

                                    @if(Auth::id() == $challenge->user_id)
                                        <a href="posts\{{$challenge->id}}\edit" class="btn btn-secondary float-right">Edit</a>
                                    @endif
                                    <a href="posts\{{$challenge->id}}">
                                    <div class="d-flex flex-row user p-2">
                                        <img class="rounded-circle" src="https://i.imgur.com/EQk6lCz.jpg" width="50">
                                        <div class="d-flex flex-column ml-2">
                                            <span class="name font-weight-bold">{{$challenge->user->name}}</span>
                                            <span>{{$challenge->created_at}}</span></div>
                                    </div>
                                    <div class="mt-2 p-2">
                                        <p class="comment-content">{{$challenge->text}}</p>
                                    </div>
                                    </a>
                                    @if($challenge->image != null )
                                        <img src="{{asset("images/post_images/$challenge->image")}}">
                                    @endif
                                </div>

                        </div>
                        <div id="comment-section">
                            <input type="text" class="form-control" name='comment_text'
                                   placeholder="Enter your comment..." >
                        </div>

                    </div>
                    @foreach(\App\Models\Comment::where('challenge_id',$challenge->id)->get() as $comment)
                        <div class="mt-2" >
                            <div class="d-flex flex-row p-3">
                                <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3">
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
        $(document).ready(function() {
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/api/comments/{{$challenge->id}}',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $("#comment-section").html("");
                    $.each(data, function (index, item) {
                        // container.html(''); //clears container for new data
                        // $.each(data, function (i, item) {
                        $("#comment-section").append('<div>'+ item.text+'</div>');
                        // });
                        $("#comment-section").append('<br>');
                    });
                }, error: function () {
                    console.log("error");
                }
            });
        });
    </script>
@endsection
