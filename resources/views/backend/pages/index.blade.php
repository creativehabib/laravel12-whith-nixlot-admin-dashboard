@php use App\Helpers\Helpers;use App\Models\Page; @endphp
@extends('layouts.partials.backend.app', ['subtitle' => 'Pages'])
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    @include('layouts.partials.backend.page-title',['title'=>'Pages','subtitle'=>'Pages'])

    <div class="">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <h5 class="card-title">Roles List</h5>
                <a class="btn btn-sm btn-info" href="{{ route('pages.create') }}">Create New Page</a>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-centered table-nowrap mb-0 rounded">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Last Modified</th>
                        <th>Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $key => $page)
                        <tr>
                            <td class="text-center text-muted">{{ $key + 1 }}</td>
                            <td>{{ $page->title }}</td>
                            <td><a href="{{ route('page', $page->slug) }}" target="_blank" class="link-info">{{ $page->slug }}</a></td>
                            <td>
                                @if($page->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $page->updated_at->diffForHumans() }}</td>
                            <td>
                                <img src="{{ Helpers::imageUrl($page->image, Page::IMAGE_UPLOAD_PATH, 60) }}" style="width: 60px" alt="" class="avatar-sm rounded-2">
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('pages.edit',$page->id) }}"><i
                                        class="bx bxs-edit"></i>
                                    <span>Edit</span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deleteData({{ $page->id }})">
                                    <i class="bx bx-trash"></i>
                                    <span>Delete</span>
                                </button>
                                <form id="delete-form-{{ $page->id }}" action="{{ route('pages.destroy',$page->id) }}"
                                      method="POST" style="display: none;">
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
