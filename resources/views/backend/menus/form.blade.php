@extends('layouts.partials.backend.app', ['subtitle' => 'Page'])
@section('content')
    @include('layouts.partials.backend.page-title', ['title' => 'Page', 'subtitle' => 'Page'])


        <div class="row">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Menu Create</h5>
                        <a href="{{ route('menus.index') }}" class="btn btn-primary btn-sm float-end">
                         <i class="bx bx-arrow-back"></i>   Back
                        </a>
                    </div>
                    <form id="ajax-form" action="{{ isset($menu) ? route('menus.update', $menu->id) : route('menus.store') }}" method="POST">
                        @csrf
                        @isset($menu)@method('PUT')@endisset
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Menu Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Enter menu name" value="{{ $menu->name ?? old('name') }}"
                                   autofocus>
                            @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Menu Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                      name="description"
                                      placeholder="Enter menu description">{{ $menu->description ?? old('description') }}</textarea>
                            @error('description') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <button type="submit"
                                    class="btn btn-primary">{{ __((isset($menu) ? 'Update' : 'Create') . ' Menu') }}</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
