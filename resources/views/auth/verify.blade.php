@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

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
                        <a href="login-3.html">
                            <img src="assets/img/logos/logo-2.png" alt="logo">
                        </a>
                        <h3>Recover Your Password</h3>
                        <form action="#" method="GET">
                            <div class="form-group form-box">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-md btn-theme w-100">Login</button>
                            </div>
                            <p>Already a member?<a href="login-3.html"> Login here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
