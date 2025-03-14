@php use App\Helpers\Helpers;use App\Models\Page; @endphp
@extends('layouts.partials.backend.app', ['subtitle' => 'Menus'])
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    @include('layouts.partials.backend.page-title',['title'=>'Menus','subtitle'=>'Menus'])

    <div class="">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <h5 class="card-title">Menus List</h5>
                <a class="btn btn-sm btn-info" href="{{ route('menus.create') }}">Create New Page</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-centered table-nowrap mb-0 rounded">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $key => $menu)
                        <tr>
                            <td class="text-center text-muted">{{ $key + 1 }}</td>
                            <td><span class="text-danger">{{ $menu->name }}</span></td>
                            <td>{{ $menu->description }}</td>
                            <td>{{ $menu->updated_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('menus.builder',$menu->id) }}"><i
                                        class="bx bx-list-ul"></i>
                                    <span>Builder</span>
                                </a>

                                <a class="btn btn-sm btn-primary" href="{{ route('menus.edit',$menu->id) }}"><i
                                        class="bx bxs-edit"></i>
                                    <span>Edit</span>
                                </a>
                                @if($menu->deletable == true)
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteData({{ $menu->id }})">
                                        <i class="bx bx-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                    <form id="delete-form-{{ $menu->id }}" action="{{ route('menus.destroy',$menu->id) }}"
                                          method="POST" style="display: none;">
                                        @csrf()
                                        @method('DELETE')
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script type="text/javascript">
        new DataTable('#datatable');
    </script>
@endpush
