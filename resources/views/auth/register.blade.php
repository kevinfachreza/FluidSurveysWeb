@extends('layouts.app')

@section('content')

<div class="page-header" filter-color="orange">
    <div class="page-header-image" style="background-image:url({{asset('img/login.jpg')}})"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form"  method="POST" action="{{ route('register') }}">
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="{{asset('img/now-logo.png')}}" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input id="name" placeholder="Name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus >
                        </div>

                        @if ($errors->has('name'))
                        <p class="form-text text-danger">
                            {{ $errors->first('name') }}
                        </p>
                        @endif

                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus >
                        </div>
                        @if ($errors->has('email'))
                        <p class="form-text text-danger">
                            {{ $errors->first('email') }}
                        </p>
                        @endif


                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                            <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                        </div>
                        @if ($errors->has('password'))
                        <p class="form-text text-danger">
                            {{ $errors->first('password') }}
                        </p>
                        @endif


                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Passowrd Confirmation" required>
                        </div>
                        
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Sign Up</a>
                        </div>
                        <div class="">
                            <h6>
                                <small>Already Have an Account? </small><br><a href="#pablo" class="link">Log In</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
