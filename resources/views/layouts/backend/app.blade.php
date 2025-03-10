<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-nav-layout="vertical"
      data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">
<head>
    <!-- Meta Data -->
    @include('layouts.partials.title-meta')

    @include('layouts.partials.head-css')
</head>
<body>

@include('layouts.partials.switcher')
@include('layouts.partials.loader')

<div class="page">
    @include('layouts.partials.header')
    @include("layouts.partials.sidebar")

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- End::app-content -->
    @include("layouts.partials.headersearch_modal")
    @include("layouts.partials.footer")

</div>

@include("layouts.partials.common-js")
@include("layouts.partials.custom_switcher-js")
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
