@extends('layouts.app')

@section('content')
<main class="profile-page">
    <section class="relative block bg-gray-800"  style="height: 300px;">
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0">
                <polygon class="text-gray-300 fill-current"
                        points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    <section class="relative py-16 bg-gray-300">
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                <div class="px-6">
                    <form id="update-form" method="POST" action="{{ action('App\Http\Controllers\UserController@update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input id="form-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <div id="image-box" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16">
                                        <img src="{{asset(Auth::user()->image->path)}}" alt="avatar"
                                         class="shadow-xl rounded-full  h-36 w-36"
                                            />

                                    </div>
                                </div>


                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                    <button id="edit-form" class="bg-gray-800 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                            type="button" value="{{Auth::user()->id}}"
                                            style="transition: all 0.15s ease 0s;" >
                                        Edit
                                    </button>
                                    <button id="submit-form" class=" hidden bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                            type="submit" value="{{Auth::user()->id}}"
                                            style="transition: all 0.15s ease 0s;" >
                                        Submit
                                    </button>

                                </div>
                            </div>

                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">{{Auth::user()->participantIn->count()}}</span>
                                        <span class="text-sm text-gray-500">Part of challenges</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">{{Auth::user()->challenges->count()}}</span>
                                        <span class="text-sm text-gray-500">Challenges</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-gray-700">{{Auth::user()->comments->count()}}</span>
                                        <span class="text-sm text-gray-500">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <div id="name-display">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2">{{Auth::user()->name}}</h3></div>


                            <div class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase">

                                {{Auth::user()->email}}
                            </div>

                        </div>
                        <div class="mt-10 py-10  text-center">
                            <div class="flex flex-wrap justify-center">
                                <div id="about-section" class="w-full lg:w-9/12 px-4">
                                        <p class=" text-lg leading-relaxed text-gray-800">
                                            @if(Auth::user()->about == null)
                                                You haven't written your about section just yet. Click that edit button and change that!
                                            @else
                                                {{Auth::user()->about}}
                                            @endif
                                        </p>

                                </div>

                            </div>
                        </div>
                        <div class="my-4 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 py-10">
                                    <span class="font-bold uppercase text-lg mb-3"> participant in these challenges: </span>
                                    <ul>
                                        @foreach(Auth::user()->participantIn as $challenge)

                                            <li><span class="">{{$challenge->text}} </span>({{$challenge->start_date}}-{{$challenge->end_date}}) </li>


                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</main>

<script>

    function showEdit(){
            // $("#edit-form").text("Submit");
            $("#edit-form").addClass("hidden");
            $("#image-box").append(`<input id="form_file" class="text-gray-700 font-medium
                        border-gray-400 rounded-lg  border-none absolute" style="max-width: 150px;" id="image" type="file"  name="image_holder">`);
            $("#name-display").html(`<input id="form_name" type="text" name="name" placeholder="Name" class="mb-3 bg-white rounded-lg font-medium focus:outline-none" value="{{Auth::user()->name}}">`)
            $('#about-section').html(`<input id="form_about" type="text" name="about-section" placeholder="About" class="bg-white h-40 w-4/5 rounded-lg font-medium focus:outline-none" value="{{Auth::user()->about}}">`);
            $("#edit-form").prop('id', 'submit-button');
            $("#submit-form").removeClass("hidden");



    }

    $(document).ready(function() {
        $("#edit-form").click(function () {
            showEdit();
        });
    });




</script>
@endsection