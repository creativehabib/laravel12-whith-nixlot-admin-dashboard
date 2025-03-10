@extends('frontend.app')

@section('content')
    <div class=" row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="card custom-card mt-4">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="d-flex justify-content-center mb-3">
                            <a href="/">
                                <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                                     class="desktop-logo">
                                <img src="{{  asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                                     class="desktop-dark">
                            </a>
                        </div>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome & Join us by creating a free
                            account !</p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="fullName" class="form-label text-default">{{ __('Full Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" id="fullName" placeholder="Full name" required
                                       autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">{{ __('Email') }}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Email" name="email" value="{{ old('email') }}" required
                                       autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="password" class="form-label text-default">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" placeholder="password" name="password" required
                                           autocomplete="password">
                                    <button class="btn btn-light" onclick="createpassword('password',this)"
                                            type="button" id="button-addon2"><i
                                            class="ri-eye-off-line align-middle"></i></button>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="password-confirm"
                                       class="form-label text-default">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <input type="password"
                                           class="form-control @error('password-confirm') is-invalid @enderror"
                                           id="password-confirm" placeholder="password confirm"
                                           name="password_confirmation" required autocomplete="new-password">
                                    <button class="btn btn-light" onclick="createpassword('password-confirm',this)"
                                            type="button" id="button-addon2"><i
                                            class="ri-eye-off-line align-middle"></i></button>
                                    @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="fs-12 text-muted mt-3">Already have an account? <a href="{{ route('login') }}"
                                                                                         class="text-primary">Sign
                                    In</a></p>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
