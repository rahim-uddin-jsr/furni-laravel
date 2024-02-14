@extends('layouts.app')

@section('content')
<div class="login-3 tab-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12 bg-img">
                <div class="informeson">
                    <div class="typing">
                        <h1>Welcome To Logdy</h1>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                    <div class="social-list">
                        <div class="buttons">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            <a href="#" class="dribbble-bg"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 form-section">
                <div class="login-inner-form">
                    <div class="details">
                        <a href="{{ route('login') }}">
                            <img src="img/logos/logo-2.png" alt="logo">
                        </a>
                        <h3>Sign Into Your Account</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group form-box">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" aria-label="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group form-box">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" id="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group form-box checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                    <label class="form-check-label" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{route('password.request')}}">Forgot Password</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-md btn-theme w-100">Login</button>
                            </div>
                            <p>Don't have an account?<a href="{{ route('register') }}"> Register here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
