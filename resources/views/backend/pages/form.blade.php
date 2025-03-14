@php use App\Helpers\Helpers;use App\Models\Page; @endphp
@extends('layouts.partials.backend.app', ['subtitle' => 'Page'])
@push('css')
    <link rel="stylesheet" href="https://www.spruko.com/demo/nixlot/dist/assets/libs/quill/quill.snow.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
    </style>
@endpush
@section('content')
    @include('layouts.partials.backend.page-title', ['title' => 'Page', 'subtitle' => 'Page'])

    <form id="ajax-form" action="{{ isset($page) ? route('pages.update', $page->id) : route('pages.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @isset($page)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Basic Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Page Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                   name="title" placeholder="Enter page title" value="{{ $page->title ?? old('title') }}"
                                   autofocus>
                            @error('title') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Short Description</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt"
                                      name="excerpt"
                                      placeholder="Enter page excerpt">{{ $page->excerpt ?? old('excerpt') }}</textarea>
                            @error('excerpt') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body Content</label>
                            <textarea id="editor" rows="10" class="form-control @error('body') is-invalid @enderror" id="body" name="body"
                                      placeholder="Enter page content">{{ $page->body ?? old('body') }}</textarea>
                            @error('body') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card custom-card">
                    <div class="card-header justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Meta Info & Image</h5>
                        <a href="{{ route('pages.index') }}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                                   name="meta_title" placeholder="Enter page meta_title" value="{{ $page->meta_title ?? old('meta_title') }}"
                                   autofocus>
                            @error('meta_title') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" id="choices-text-preset-values" type="text" value="{{ $page->meta_keywords ?? old('meta_keywords') }}" placeholder="This is a placeholder">
                            @error('meta_keywords') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description"
                                      placeholder="Enter page meta description">{{ $page->meta_description ?? old('meta_description') }}</textarea>
                            @error('meta_description') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="dropify @error('image') is-invalid @enderror"
                                   data-default-file="{{ isset($page) ? Helpers::imageUrl($page->image, Page::IMAGE_UPLOAD_PATH, 300) : '' }}"
                                   id="image" name="image">
                            @error('image') <span class="text-danger" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-sm"
                                       name="status" @isset($page)
                                    {{ $page->status == true ? 'checked' : '' }}
                                    @endisset>
                                <label class="form-check-label" for="switch-sm">User status</label>
                                @error('status') <span class="invalid-feedback"
                                                       role="alert">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit"
                                    class="btn btn-primary">{{ __((isset($page) ? 'Update' : 'Create') . ' Page') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://www.spruko.com/demo/nixlot/dist/assets/libs/quill/quill.min.js"></script>
    <script src="https://www.spruko.com/demo/nixlot/dist/assets/js/quill-editor.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush
