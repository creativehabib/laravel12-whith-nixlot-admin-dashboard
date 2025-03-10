@extends('frontend.app')

@section('content')
    <div class=" row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="card custom-card mt-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-center mb-3">
                        <a href="/">
                            <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                                 class="desktop-logo">
                            <img src="{{  asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                                 class="desktop-dark">
                        </a>
                    </div>
                    <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back to Login</p>
                    <div class="row gy-3">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-xl-12 mb-2">
                                <label for="email" class="form-label text-default">{{ __('Email Address') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Email address" name="email" value="{{ old('email') }}" required
                                       autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signin-password"
                                       class="form-label text-default d-block">{{ __('Password') }}
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"
                                           class="float-end text-danger">{{ __('Forgot password ?') }}</a>
                                    @endif
                                </label>
                                <div class="input-group">
                                    <input type="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="signin-password" placeholder="password">
                                    <button class="btn btn-light" type="button"
                                            onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></button>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text-muted fw-normal" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        <p class="fs-12 text-muted mt-3">Dont have an account? <a href="{{ route('register') }}"
                                                                                  class="text-primary">Sign Up</a></p>
                    </div>
                    <div class="text-center my-3 authentication-barrier">
                        <span>OR</span>
                    </div>
                    <div class="btn-list text-center">
                        <button class="btn btn-icon btn-light">
                            <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                        </button>
                        <button class="btn btn-icon btn-light">
                            <i class="ri-google-line fw-bold text-dark op-7"></i>
                        </button>
                        <button class="btn btn-icon btn-light">
                            <i class="ri-twitter-line fw-bold text-dark op-7"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
