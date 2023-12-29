<x-app-layout title="Edit Role" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Roles</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Edit Role</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Edit Role') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.roles.update', $role) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <h4 class="alert-heading">Error!</h4>
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $role->name) }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('New Permission') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.roles.permissions.create', $role) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <h4 class="alert-heading">Error!</h4>
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="permission" class="form-label">{{ __('Permission') }}</label>
                                <input type="text" class="form-control @error('permission') is-invalid @enderror" id="permission" permission="permission" value="{{ old('permission') }}" required>
                                @error('permission')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Permissions') }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Permission</th>
                                    <th scope="col" width="50">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($permissions as $permission)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <form action="{{ route('superadmin.roles.permissions.destroy', ['permission' => $permission, 'role' => $role]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-white btn-delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No permissions found.</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
