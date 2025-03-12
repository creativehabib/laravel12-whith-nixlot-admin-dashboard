@php use App\Helpers\Helpers;use App\Models\User; @endphp
@extends('layouts.partials.backend.app', ['subtitle' => 'Users'])
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
    </style>
@endpush
@section('content')
    @include('layouts.partials.backend.page-title', ['title' => 'User', 'subtitle' => 'User'])

    <form id="ajax-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Update</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Enter user name" value="{{ Auth::user()->name }}" autofocus>
                            @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" placeholder="Enter user email" value="{{ Auth::user()->email }}">
                            @error('email') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                   name="phone" placeholder="Enter user phone"
                                   value="{{ Auth::user()->phone }}">
                            @error('phone') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                      name="address"
                                      placeholder="Enter user address">{{ Auth::user()->address }}</textarea>
                            @error('address') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio"
                                      placeholder="Enter user bio">{{ Auth::user()->bio }}</textarea>
                            @error('bio') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card custom-card">
                    <div class="card-header justify-content-between align-items-center">
                        <h5 class="card-title mb-0">User Image</h5>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Profile Update') }}
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" class="dropify @error('avatar') is-invalid @enderror"
                                   data-default-file="{{  Helpers::imageUrl(Auth::user()->avatar, User::IMAGE_UPLOAD_PATH, 300) }}"
                                   id="avatar" name="avatar">
                            @error('avatar') <span class="text-danger" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush
