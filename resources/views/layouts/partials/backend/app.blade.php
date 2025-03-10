<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-nav-layout="vertical"
      data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">
<head>
    <!-- Meta Data -->
    @include('layouts.partials.backend.title-meta')

    @include('layouts.partials.backend.head-css')
</head>
<body>

@include('layouts.partials.backend.switcher')
@include('layouts.partials.backend.loader')

<div class="page">
    @include('layouts.partials.backend.header')
    @include("layouts.partials.backend.sidebar")

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- End::app-content -->
    @include("layouts.partials.backend.headersearch_modal")
    @include("layouts.partials.backend.footer")

</div>

@include("layouts.partials.backend.common-js")
@include("layouts.partials.backend.custom_switcher-js")
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
