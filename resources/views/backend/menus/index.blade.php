@php use App\Helpers\Helpers;use App\Models\Page; @endphp
@extends('layouts.partials.backend.app', ['subtitle' => 'Menus'])
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    @include('layouts.partials.backend.page-title',['title'=>'Menus','subtitle'=>'Menus'])

    <div class="">
        {!! LaravelMenu::render() !!}
    </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   {!! LaravelMenu::scripts() !!}
@endpush
