@extends('layouts.partials.backend.app', ['subtitle' => 'Roles'])
@push('css')
@endpush
@section('content')
    @include('layouts.partials.backend.page-title', ['title' => 'Roles', 'subtitle' => 'Roles'])

    <div class="card custom-card">
        <div class="card-header">
            <h5 class="card-title mb-0">Manage Roles</h5>
        </div>

        <div class="card-body">
            <form id="ajax-form" action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}"
                  method="POST">
                @csrf
                @isset($role)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="role" class="form-label">Role Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="role"
                                   name="name" value="{{ $role->name ?? old('name') }}" required autofocus>
                            @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <strong>Manage Permission for Role</strong>
                        @error('permissions') <span class="text-danger d-block"
                                                    role="alert">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-check form-checkbox-primary mb-2">
                            <input class="form-check-input" type="checkbox" id="selectAll">
                            <label class="form-check-label" for="selectAll">Select All</label>
                        </div>
                    </div>

                    @forelse($modules->chunk(2) as $key=>$chunks)
                        <div class="row">
                            @foreach($chunks as $module)
                                <div class="col-md-6">
                                    <div class="">
                                        <div class="mb-2">
                                            <h5 class="card-title mb-0">{{ $module->name }}</h5>
                                        </div>
                                        <div class="">
                                            <div class="row">
                                                @foreach($module->permissions as $permission)
                                                    <div class="col-md-6">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="permissions[]"
                                                                   value="{{ $permission->id }}"
                                                                   id="permission-{{ $permission->id }}"
                                                            @isset($role)
                                                                @foreach($role->permissions as $rPermission)
                                                                    {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                                    @endforeach
                                                                @endisset
                                                            >
                                                            <label class="form-check-label"
                                                                   for="permission-{{ $permission->id }}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="row">
                            <div class="col text-center">
                                <h5>No Module Found</h5>
                            </div>
                        </div>
                    @endforelse

                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#selectAll').click(function (event) {
                if (this.checked) {
                    $(':checkbox').each(function () {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
    </script>
@endpush
