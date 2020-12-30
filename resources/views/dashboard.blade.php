@extends('layouts.app')

@section('content')
    <div class="container min-h-screen">
    <div class="row gutters">

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img class="mw-100 mh-50"  src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile picture">
{{--                            TODO add image change option--}}
                            </div>
                            <h5 class="user-name">{{Auth::user()->name}}</h5>
                            <h6 class="user-email">{{Auth::user()->email}}</h6>
                        </div>
                        <div class="about">
{{--                            <h5 class="mb-2 text-primary">About</h5>--}}
{{--                            <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <form method="post" action="{{ action('App\Http\Controllers\UserController@update') }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="row gutters">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" name='name' class="form-control" id="fullName" placeholder="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="eMail" placeholder="{{Auth::user()->email}}" disabled>
                                    </div>
                                </div>
{{--
--}}
{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="website">Website URL</label>--}}
{{--                                        <input type="url" class="form-control" id="website" placeholder="Website url">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                        </div>

                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button id="submit" type="submit" class="btn btn-secondary">Update</button>
                                    <a href="/dashboard"><button type="button" id="submit" class="btn btn-primary">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--    TODO add all the posts made by the user--}}
@endsection