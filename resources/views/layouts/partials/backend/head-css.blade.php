    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">
    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    @stack('css')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite([ 'resources/scss/icons.scss', 'resources/scss/styles.scss'])
