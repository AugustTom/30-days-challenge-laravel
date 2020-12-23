
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
                    <span>{{count($challenge->comments()->get())}}</span>
                </div>

            </div>
        </div>
    </div>

<!-- comment form -->

    <form method="post" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <input type="text" name="text" id="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full
                     h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                               placeholder='Type Your Comment' required>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto"></div>
                    <div class="-mr-1">
                        <button  type='submit' id='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border
                        border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100 btn-submit">Post Comment</button>
                    </div>
                </div>

        </div>
    </form>

</div>
{{--    Comments --}}
@foreach(($challenge -> comments()->get()) as $comment)
    <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
        <div class="flex flex-row justify-center mr-2 ">
            <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
            <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{$comment->user()->first()->name}}</h3>
        </div>
        <div class="text-gray-600 text-lg text-center md:text-left" id="comment-box-{{$comment->id}}">
            {{$comment->text}}
        </div>

        @if(Auth::id() == $challenge->user_id or Auth::user()->is_admin == true)
            <button class="edit"  value="{{$comment->id}}" onclick="editComments(this.value)">
                <div class="flex mr-2 text-gray-700 text-sm mr-4 ">
                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Edit</span>
                </div>
            </button>
        @endif
    </div>
@endforeach


<div id="comment-section">

</div>

<script>


    function editComments(id){
        const selector = '#comment-box-' + id;
        var box = $(selector);
        var text = $(selector).text();
        box.empty()
        box.append('<form method="post" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">' +
            '<input type="hidden" name="_method" value="PUT">' +
            '<input id="form-token-'+ id+'"type="hidden" name="_token" value="{{ csrf_token() }}">'+
            '<input type="hidden" name="comment-id" value="'+ id+'">'+
            '<input type="text" name="new_comment" id="textarea-'+ id+'" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" value="'+text+'" required>' +
        '<button  value="' + id + '"  class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" onclick="updateComment(event, this.value)">Update Comment</button>' +
        '</form>');
    }

    function updateComment(e, id){
        e.preventDefault();
        const selector = '#comment-box-' + id;
        const new_text = $("input[name=new_comment]").val();
        var box = $(selector);
        var _token = $("#form-token-"+id).val();

        $.ajax({
            type:'put',
            url: "{{ route('api.comments.update',
                            ['id'=> $challenge->id]) }}",
            data: {
                "_token": _token,
                "text": new_text,
                'comment-id':id,
            },
            success:function(){
                box.empty();
                box.append(new_text);
                // location.reload();
            }, error: function (){
                console.log("error");
            }});
    }


    function postComments(){
        $(".btn-submit").click(function(e){
            e.preventDefault();
            var text = $("input[name=text]").val();
            var _token = $("input[name=_token]").val();
            $.ajax({
                type:'POST',
                url: "{{ route('api.comments.store',
                            ['id'=> $challenge->id,
                             '$challenge_id'=>$challenge->id]) }}",
                data:{'_token':_token,'text':text},
                success:function(){

                    $("#text").val("");
                    location.reload();
                }, error: function (){
                    console.log("error");
                }});
        });
    }

    {{--function loadComments(){--}}
    {{--    $.ajax({--}}
    {{--        type: 'GET',--}}
    {{--        url: '/api/comments/{{$challenge->id}}',--}}
    {{--        dataType: 'json',--}}
    {{--        success: function (data) {--}}
    {{--            console.log(data);--}}
    {{--            $("#comment-section").html("");--}}
    {{--            $.each(data, function (index, item) {--}}
    {{--                // container.html(''); //clears container for new data--}}
    {{--                // $.each(data, function (i, item) {--}}
    {{--                $("#comment-section").append('<div>'+ item.text+'</div>');--}}
    {{--                //TODO add actual name here--}}
    {{--                $("#comment-section").append('<p> posted by:'+  item.user_id +'</div>');--}}
    {{--                $("#comment-section").append('');--}}
    {{--                // });--}}
    {{--                $("#comment-section").append('<br>');--}}
    {{--            });--}}
    {{--        }, error: function () {--}}
    {{--            console.log("error");--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}


    $(document).ready(function() {
        postComments();
    });

</script>
@endsection