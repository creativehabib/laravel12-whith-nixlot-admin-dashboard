@extends('layouts.partials.backend.app', ['subtitle' => 'Change Password'])

@section('content')
    @include('layouts.partials.backend.page-title', ['title' => 'Password', 'subtitle' => 'Profile Security'])
        <div class="row">
            <div class="col-md-8">
                <form id="ajax-form" action="{{ route('profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card custom-card">
                        <div class="card-header">
                            <h5 class="card-title">Update Password</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password"
                                       class="form-control @error('current_password') is-invalid @enderror"
                                       placeholder="Enter your current password"
                                       id="current_password"
                                       name="current_password">
                                @error('current_password') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter new password" name="password">
                                @error('password') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" placeholder="Enter confirm password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
