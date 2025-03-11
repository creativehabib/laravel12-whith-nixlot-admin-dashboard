@extends('layouts.partials.backend.app', ['subtitle' => 'Users'])
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    @include('layouts.partials.backend.page-title',['title'=>'User','subtitle'=>'Users'])

    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Roles List</h5>
                    <a class="btn btn-sm btn-info" href="{{ route('users.create') }}">Add User</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-centered table-nowrap mb-0 rounded">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Joined At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td class="text-center text-muted">{{ $key + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ config('app.placeholder').'40.png' }}" alt="" class="avatar-sm rounded-2">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">{{ $user->name }}</h6>
                                        <span class="badge bg-success">{{ $user->role?->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('users.edit',$user->id) }}"><i
                                        class="bx bx-pencil"></i>
                                    <span>Edit</span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $user->id }})">
                                    <i class="bx bx-trash"></i>
                                    <span>Delete</span>
                                </button>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy',$user->id) }}" method="POST" style="display: none;">
                                    @csrf()
                                    @method('DELETE')
                                </form>
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
