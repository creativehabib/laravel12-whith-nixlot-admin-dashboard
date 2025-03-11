@extends('layouts.partials.backend.app', ['subtitle' => 'Roles'])
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    @include('layouts.partials.backend.page-title',['title'=>'Role','subtitle'=>'Roles'])

    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Roles List</h5>
                    <a class="btn btn-sm btn-info" href="{{ route('roles.create') }}">Add Role</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-centered table-nowrap mb-0 rounded">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Permissions</th>
                        <th class="text-center">Updated At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $key => $role)
                        <tr>
                            <td class="text-center text-muted">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center">
                                @if ($role->permissions->count() > 0)
                                    <span class="badge bg-outline-info">{{ $role->permissions->count() }}</span>
                                @else
                                    <span class="badge bg-outline-danger rounded-pill">No permission found :(</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $role->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('roles.edit',$role->id) }}"><i
                                        class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                @if ($role->deletable == true)
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteData({{ $role->id }})">
                                        <i class="bx bx-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                    <form id="delete-form-{{ $role->id }}"
                                          action="{{ route('roles.destroy',$role->id) }}" method="POST"
                                          style="display: none;">
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
    <script type="text/javascript" src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script type="text/javascript">
        new DataTable('#datatable');
    </script>
@endpush
