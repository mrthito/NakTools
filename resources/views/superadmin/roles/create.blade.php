<x-app-layout title="Add new Role" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Roles</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Add new Role</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Add new Role') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.roles.store') }}" method="POST">
                            @csrf
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
