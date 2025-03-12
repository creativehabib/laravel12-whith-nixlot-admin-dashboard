@extends('layouts.partials.backend.app', ['subtitle' => 'Backup'])
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    @include('layouts.partials.backend.page-title',['title'=>'Backup List','subtitle'=>'Backup'])

    <div class="card custom-card">
        <div class="card">
            <div class="card-header justify-content-between">
                <h5 class="card-title">Backup List</h5>

                <div>
                    <button onclick="event.preventDefault();
                          document.getElementById('clean-old-backups').submit();"
                            class="btn-shadow btn btn-sm btn-danger">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="bx bxs-trash"></i>
                        </span>
                        {{ __('Clean Old Backups') }}
                    </button>
                    <form id="clean-old-backups" action="{{ route('backups.clean') }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button class="btn btn-sm btn-info"
                            onclick="event.preventDefault();
                        document.getElementById('new-backup-form').submit();"
                            type="button">Create New Backup
                    </button>
                    <form action="{{ route('backups.store') }}" method="POST" id="new-backup-form" style="display: none;">
                        @csrf
                    </form>
                </div>

            </div>
            <div class="table-responsive">
                <table id="datatable" class="table mb-0 rounded">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>Size</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($backups as $key => $backup)
                        <tr>
                            <td class="text-start">{{ $key + 1 }}</td>
                            <td>{{ $backup['file_name'] }}</td>
                            <td class="text-start">
                                {{ $backup['file_size'] }}
                            </td>
                            <td>{{ $backup['created_at'] }}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('backups.download', $backup['file_name']) }}"><i
                                        class="bx bxs-download"></i>
                                    <span>Download</span>
                                </a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteData({{ $key }})">
                                        <i class="bx bx-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                    <form id="delete-form-{{ $key }}"
                                          action="{{ route('backups.destroy',$backup['file_name']) }}" method="POST"
                                          style="display: none;">
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
    <script type="text/javascript" src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script type="text/javascript">
        new DataTable('#datatable');
    </script>
@endpush
