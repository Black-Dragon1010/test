@extends('layouts.app')
@section('page-styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection
@section('content')
<!-- CONTENT -->
<div class="rh-container def">
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side page clearfix" id="content">
            <div class="rh-post-wrapper col-md-10">
                <article class="post mb0" id="page-3968">
                    <div class="title">
                        <h1 class="entry-title">Demo Login</h1>
                    </div>

                    <div class="card-body">
                        <form id="rehub_login_form_modal" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="re-form-group mb20">
                                <label>{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror re-form-input required" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="re-form-group mb20">
                                <label for="rehub_user_pass">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror re-form-input required" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link alignright" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif                  
                            </div>
                            <div class="re-form-group mb20">
                                <label for="rehub_remember">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}</label>
                            </div>						
                            <div class="re-form-group mb20">
                                <input type="hidden" name="action" value="rehub_login_member_popup_function"/>
                                <button class="wpsm-button rehub_main_btn" type="submit">Login</button>
                            </div>
                            				
                        </form>
                        <div class="rehub-errors"></div>
                        <div class="rehub-login-popup-footer">Don&#039;t have an account? 
                            <span class="act-rehub-login-popup color_link" data-type="url" data-customurl="/register/">Sign Up</span>						
                        </div>

                    </div>

                </article>
            </div>
        </div>
        <!-- /Main Side -->
        @include('layouts.partial.latest_blog_sidebar')
    </div>
</div>

@endsection
