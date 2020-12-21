
@extends('layouts.app')
@section('script')

@endsection
@section('content')

    <!-- post card -->
<div class="post">
    <div class="flex items-start px-4 py-6">
        <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
        <div class="">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$challenge->user->name}} </h2>
                <small class="text-sm text-gray-700 pl-1"> {{$challenge->created_at}}</small>
            </div>
            <p class="mt-3 text-gray-700 text-sm">
                {{$challenge->text}}
            </p>
            <div class="mt-4 flex items-center">
                <div class="flex mr-2 text-gray-700 text-sm mr-8">
                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                    </svg>
                    <span>8</span>
                </div>

            </div>
        </div>
    </div>

<!-- comment form -->

    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full
                 h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                          name="body" placeholder='Type Your Comment' required></textarea>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <form method="post">
                    @csrf
                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto"></div>
                    <div class="-mr-1">
                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border
                    border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                    </div>
                </form>
            </div>
        </div>
    </form>
</div>
<div id="comment-section">

</div>

<script>
    function loadComments(){
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
    }
    function postComments(){

    }
    $(document).ready(function() {
        loadComments();

    });


</script>
@endsection