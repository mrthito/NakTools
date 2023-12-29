<x-app-layout title="Manage Roles" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Roles</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Manage Roles</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Manage Roles') }}
                <div class="float-end">
                    <div class="btn-group">
                        <a href="{{ route('superadmin.roles.create') }}" class="btn btn-sm btn-primary">Add new</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Role</th>
                        <th scope="col" width="150">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form action="{{ route('superadmin.roles.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.roles.edit', $role->id) }}" class="btn btn-sm btn-primary text-white">Edit</a>
                                    <button type="submit" class="btn btn-sm btn-danger text-white btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No roles found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
