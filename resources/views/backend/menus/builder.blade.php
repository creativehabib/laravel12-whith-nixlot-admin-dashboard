@extends('layouts.partials.backend.app', ['subtitle' => 'Page'])
@section('content')
    @include('layouts.partials.backend.page-title', ['title' => 'Page', 'subtitle' => 'Page'])

        <div class="row">
            <div class="col-md-8">
                <div class="card custom-card">
                    <div class="card-header justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Menu Builder ({{ $menu->name }})</h5>
                        <div class="card-tools">
                            <a href="{{ route('menus.index') }}" class="btn btn-danger btn-sm">
                               <i class="bx bx-arrow-back"></i> Back
                            </a>
                            <a href="{{ route('menus.item.create',$menu->id) }}" class="btn btn-primary btn-sm">
                                <i class="bx bx-plus-circle"></i> Create Menu Item
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">How to Use:</h5>
                        <p>You can output a menu anywhere on your site by calling <code>menu('name')</code></p>
                    </div>
                </div>

                <div class="card custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Drag and drop the menu items below to re-arrange then.</h5>
                        <div class="dd" id="nestable">
                            <x-menu-builder :menuItems="$menu->menuItems"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('.dd').nestable({maxDepth: 2});
            $('.dd').on('change', function (e) {
                $.post('{{ route('menus.order',$menu->id) }}', {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '{{ csrf_token() }}'
                }, function (data) {
                    iziToast.success({
                        title: 'Success',
                        message: 'Successfully updated menu order.',
                    });
                });
            });
        });
    </script>
@endpush
