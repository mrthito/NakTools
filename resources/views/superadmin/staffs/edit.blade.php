<x-app-layout title="Edit Staff" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Staffs</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Edit Staff</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Edit Staff') }}
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.staffs.update', $staff->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ $staff->name }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $staff->email }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                               name="phone" value="{{ $staff->phone }}" required>
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('Role') }}</label>
                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                            <option value="">{{ __('Select Role') }}</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role', $staffRole?->role_id) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr/>

                    {{-- Checkbox for permissions --}}
                    <div class="card mt-3 mb-4">
                        <div class="card-header">
                            {{ __('Permissions') }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @forelse($permissions as $permission)
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="permissions{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" role="switch" {{ in_array($permission->id, $staffPermissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="permissions{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <div class="col-md-12">
                                        <div class="alert alert-info">
                                            {{ __('No permissions found for this role.') }}
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
