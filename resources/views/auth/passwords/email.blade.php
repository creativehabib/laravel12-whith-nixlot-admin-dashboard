@extends('frontend.app')

@section('content')
    <div class=" row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="card custom-card">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="d-flex justify-content-center mb-3">
                            <a href="">
                                <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                                     class="desktop-logo">
                                <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                                     class="desktop-dark">
                            </a>
                        </div>
                        <p class="h5 fw-semibold mb-2 text-center">{{ __('Reset Password') }}</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Enter your email address registered on
                            your account</p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">{{ __('Email Address') }}<span
                                            class="text-danger ms-1">*</span></label>
                                    <input class="form-control ms-0 @error('email') is-invalid @enderror" type="email"
                                           placeholder="Enter your email" name="email" value="{{ old('email') }}"
                                           required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="d-grid mb-3">
                                    <button type="submit"
                                            class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                                </div>
                                <div class="text-center">
                                    <p class="mb-0 tx-14">Remembered your password?
                                        <a href="{{ route('login') }}"
                                           class="tx-primary ms-1 text-decoration-underline">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
