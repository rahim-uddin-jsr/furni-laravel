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
                            <img src="{{ url('assets/img/logos/logo-2.png') }}" alt="logo">
                        </a>
                        <h3>Create An Cccount</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group form-box">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" aria-label="Full Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group form-box">
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" aria-label="Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group form-box">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group form-box">
                                <input type="password" name="password_confirmation" id="password-confirm" required autocomplete="new-password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" required>
                            </div>
                            <div class="form-group form-box checkbox clearfix">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-md btn-theme w-100">Register</button>
                            </div>
                            <p>Already a member?<a href="{{ route('login') }}"> Login here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
