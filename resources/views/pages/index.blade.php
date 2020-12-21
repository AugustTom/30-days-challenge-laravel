@extends('layouts.app')
@section('script')

@endsection
@section('content')



    @if(count($challenges) > 0)
        <div class="posts">
            @foreach($challenges as $challenge)
                <!-- post card -->
                    <div class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-7 max-w-md md:max-w-2xl "><!--horizantil margin is just for display-->
                        <div class="flex items-start px-4 py-6">
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
                            <div class="">
                                <div class="flex items-center justify-between">

                                    <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$challenge->user->name}}</h2>
                                    <small class="text-sm text-gray-700 px-8">{{$challenge->created_at}}</small>

                                </div>


                                <p class="mt-3 text-gray-700 text-sm">{{$challenge->text}}</p>
                                @if($challenge->image != null )
                                    <img src="{{asset("images/post_images/$challenge->image")}}">
                                @endif
                                <div class="mt-4 flex items-center">
{{--                                    <div class="flex mr-2 text-gray-700 text-sm mr-3">--}}
{{--                                        <svg fill="none" viewBox="0 0 24 24"  class="w-4 h-4 mr-1" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5--}}
{{--                                                   0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>--}}
{{--                                        </svg>--}}
{{--                                        <span>12</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex mr-2 text-gray-700 text-sm mr-8">--}}
{{--                                        <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>--}}
{{--                                        </svg>--}}
{{--                                        <span>8</span>--}}
{{--                                    </div>--}}
                                        @if(Auth::id() == $challenge->user_id)
                                            <a href="posts\{{$challenge->id}}\edit" class="btn btn-secondary">
                                                <div class="flex mr-2 text-gray-700 text-sm mr-4 float-right">
                                                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    <span>Edit</span>
                                                </div>
                                            </a>
                                        @endif


                                </div>
                            </div>
                        </div>
                    </div>
{{--                <div class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-56 max-w-md md:max-w-2xl ">--}}
{{--                    <div class="flex items-start px-4 py-6">--}}
{{--                        <div class="bg-white comment-section">--}}
{{--                            @if(Auth::id() == $challenge->user_id)--}}
{{--                                <a href="posts\{{$challenge->id}}\edit" class="btn btn-secondary float-right">Edit</a>--}}
{{--                            @endif--}}
{{--                            <a href="posts\{{$challenge->id}}">--}}
{{--                            <div class="d-flex flex-row user p-2">--}}
{{--                                <img class="rounded-circle" src="https://i.imgur.com/EQk6lCz.jpg" width="50">--}}
{{--                                <div class="d-flex flex-column ml-2">--}}
{{--                                    <span class="name font-weight-bold">{{$challenge->user->name}}</span>--}}
{{--                                    <span>{{$challenge->created_at}}</span></div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-2 p-2">--}}
{{--                                <p class="comment-content">{{$challenge->text}}</p>--}}
{{--                            </div>--}}
{{--                            </a>--}}
{{--                                @if($challenge->image != null )--}}
{{--                                    <img src="{{asset("images/post_images/$challenge->image")}}">--}}
{{--                                @endif--}}
{{--                        </div>--}}

{{--                        <div id="comment-section">--}}
{{--                            <input type="text" class="form-control" name='comment_text'--}}
{{--                                   placeholder="Enter your comment..." >--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @foreach(\App\Models\Comment::where('challenge_id',$challenge->id)->get() as $comment)--}}
{{--                        <div class="mt-2" >--}}
{{--                            <div class="d-flex flex-row p-3">--}}
{{--                                <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3">--}}
{{--                                <div class="w-100">--}}
{{--                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                        <div class="d-flex flex-row align-items-center">--}}
{{--                                            <span class="mr-2">{{\App\Models\User::where('id',$comment->user_id)->first()->name}}</span>--}}
{{--                                        </div>--}}
{{--                                        <small>{{$comment->created_at}}</small>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-justify comment-text mb-0">{{$comment->text}}</p>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}

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
