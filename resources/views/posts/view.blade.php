
@extends('layouts.app')
@section('script')

@endsection
@section('content')

    <!-- post card -->
<div class="posts flex-wrap mx-4 md:mx-auto  py-7 max-w-md md:max-w-3xl ">
    <div class="flex-wrap bg-white shadow-lg p-4 rounded-lg   w-full">
{{--        POST ITSELF --}}
        <div class="flex items-start px-4 py-6 w-full ">
            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                 src="{{asset($challenge->user->image->path)}}" alt="avatar">
            <div class="">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$challenge->user->name}}</h2>
                    <small class="text-sm text-gray-700 px-8">{{$challenge->created_at}}</small>

                </div>

                <p class="mt-3 text-gray-600 text-lg">{{$challenge->text}}</p>

                <div>
                    <small class="text-sm text-gray-600"><span class="uppercase font-bold ">Starts on: </span>{{$challenge->start_date}}</small>
                </div>
                <div>
                    <small class="text-sm text-gray-600"><span class="uppercase font-bold">Ends on: </span>{{$challenge->end_date}}</small>
                </div>
                @if($challenge->image != null )
                    <div class="flex items-center justify-between  mx-auto">
                        <img src="{{asset($challenge->image->path)}}">
                    </div>
                @endif

                <div class="mt-4 flex items-center">
                    {{--                                LIKE BUTTON  --}}
                    <form method="POST">
                        @csrf
                        <div class="group">
                            <input id="form-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="flex mr-2 text-gray-700 text-sm group-hover:text-red-300" value="{{$challenge->id}}"
                                    onclick="likeChallenge(this.value)">
                                <svg fill="none" viewBox="0 0 24 24"  class="w-4 h-4 mr-1 " stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5
                                                       0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                <span class="group-hover:text-gray-700" id="like_count-{{$challenge->id}}">{{count($challenge->likes()->get())}}</span>
                            </button>

                        </div>


                    </form>
                    {{--                                    COMMENTS --}}
                    <div class="group">

                        <div class="flex mr-2 text-gray-700 text-sm group-hover:text-yellow-500">
                            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                            </svg>
                            <span class="group-hover:text-gray-700">{{count($challenge->comments()->get())}}</span>
                        </div>

                    </div>


                    {{--                            PARTICIPATE BUTTON --}}
                    <div id="participant-{{$challenge->id}}">
                        @if(Auth::user()->isParticipant($challenge->id))
                            <button class="bg-gray-700 text-white font-medium py-1 px-4 border
                                            border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100 disabled:opacity-50" disabled >
                                Entered this challenge</button>

                        @else
                            <form method="POST">
                                @csrf
                                <div class="group">
                                    <input id="form-token" type="hidden" name="_token_participate" value="{{ csrf_token() }}">
                                    <button value="{{$challenge->id}}" class="bg-white text-gray-700 font-medium py-1 px-4 border
                                                border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" onclick="enterChallenge(this.value)">Enter this challenge</button>
                                </div>

                            </form>
                        @endif
                    </div>
                </div>

            </div>
            {{--                                EDIT BUTTON          --}}
            @if(Auth::id() == $challenge->user_id or Auth::user()->is_admin == true)
                <div class="ml-auto">
                    <a href="\posts\{{$challenge->id}}\edit" class="float-right">
                        <div class="flex w-full text-gray-700 text-sm mr-4  float-right">
                            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>Edit</span>
                        </div>
                    </a>
                </div>
            @endif
        </div>

        <div class="flex items-start px-4 py-6 w-full ">
            <form method="POST" >
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <span class="text-grey-darkest  font-bold uppercase px-4 ">Add a new comment</span>
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
{{--        COMMENT SECTION --}}


            @foreach(($challenge -> comments()->get()) as $comment)
            <div class="flex items-start px-4 py-2 w-full ">
                <div class="bg-white rounded-lg p-3 w-full flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                    <div class="flex flex-row justify-center mr-2 ">
                        <img alt="avatar" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4"
                             src="{{asset($comment->user->image->path)}}">
                        <h3 class="text-gray-800 font-semibold text-lg text-center md:text-left ">{{$comment->user()->first()->name}}</h3>
                    </div>
                    <div class="text-gray-600 text-lg text-center md:text-left" id="comment-box-{{$comment->id}}">
                        {{$comment->text}}
                    </div>

                    @if(Auth::id() == $comment->user_id or Auth::user()->is_admin == true)
                        <button class="edit"  value="{{$comment->id}}" onclick="editComments(this.value)">
                            <div class="flex mr-2 text-gray-700 text-sm mr-4 ">
                                <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Edit</span>
                            </div>
                        </button>
                        <form method="POST" >
                            @csrf
                            @method('DELETE')
                            <button class="delete"  value="{{$comment->id}}" onclick="deleteComment(event,this.value)">
                                <div class="flex mr-2 text-gray-700 text-sm mr-4 ">
                                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span>Delete</span>
                                </div>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            @endforeach


    </div>
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
            type:'PUT',
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

            }, error: function (){
                console.log("error");
            }});
    }

    function deleteComment(e,id){
        var _token = $("input[name=_token]").val();
        e.preventDefault();
        $.ajax({
            type:'DELETE',
            url: "{{ route('api.comments.destroy',
                            ['id'=> $challenge->id]) }}",
            data: {
                "_token": _token,
                'comment-id':id,
            },
            success:function(){
                location.reload()

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


    $(document).ready(function() {
        postComments();
    });

    function likeChallenge(challenge_id){
        event.preventDefault();
        var _token = $("input[name=_token]").val();
        var url =  challenge_id +'/like'
        var text_box = $('#like_count-'+challenge_id)
        $.ajax({
            type:'POST',
            url: url,
            data:{'_token':_token,'challenge_id':challenge_id},
            success:function(){

                var count = parseInt(text_box.text()) + 1;
                text_box.text(count);
            }, error: function (){
                console.log("like - error");
            }});
    }

    function enterChallenge(challenge_id){
        event.preventDefault();
        var _token = $("input[name=_token_participate]").val();
        var url =  challenge_id +'/enter'
        $.ajax({
            type:'POST',
            url: url,
            data:{'_token':_token,'challenge_id':challenge_id},
            success:function(){
                $("#participant-"+challenge_id).empty();
                $("#participant-"+challenge_id).html(`<button class="bg-gray-700 text-white font-medium py-1 px-4 border
                                            border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100 disabled:opacity-50" disabled>
                                            Entered this challenge</button>`);
            }, error: function (){
                console.log("error");
            }});
    }

</script>
@endsection