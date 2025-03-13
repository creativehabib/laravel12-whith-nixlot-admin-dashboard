@php use App\Helpers\Helpers;use App\Models\User; @endphp
@extends('layouts.partials.backend.app', ['subtitle' => 'Users'])
@section('content')
    @include('layouts.partials.backend.page-title',['title'=>'User','subtitle'=>'Users'])

    <div class="">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <h5 class="card-title">User Details</h5>
                <div class="card-header-right">
                    <a class="btn btn-sm btn-danger" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    <a class="btn btn-sm btn-info" href="{{ route('users.index') }}">Back</a>
                </div>
            </div>
            <div class="table-responsive p-4">
                <table class="table table-bordered mb-0 rounded">
                    <tbody>
                    <tr>
                        <th scope="row">User Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Bio</th>
                        <td>{{ $user->bio }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Role</th>
                        <td><span class="badge bg-info">{{ $user->role->name }}</span></td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>
                            @if($user->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Joined At</th>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Image</th>
                        <td>
                            <img src="{{ Helpers::imageUrl($user->avatar, User::IMAGE_UPLOAD_PATH, 100) }}"
                                 style="width: 100px" alt="" class="avatar-sm rounded-2">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
