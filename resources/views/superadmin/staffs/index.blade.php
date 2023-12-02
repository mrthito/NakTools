<x-app-layout title="Manage Staffs" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Staffs</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Manage Staffs</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Manage Staffs') }}
                <div class="float-end">
                    <a href="{{ route('superadmin.staffs.create') }}" class="btn btn-sm btn-primary">Add new</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" width="200">Phone</th>
                            <th scope="col" width="90">Login as</th>
                            <th scope="col" width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($staffs as $staff)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $staff->name }}</td>
                                <td>
                                    {{ $staff->email }}
                                    @if ($staff->email_verified_at)
                                        <i class="icon icon-2xl cil-check text-success" data-toggle="tooltip"
                                            data-placement="top" title="Verified"></i>
                                    @endif
                                </td>
                                <td>
                                    {{ $staff->phone }}
                                    @if ($staff->phone_verified_at)
                                        <i class="icon icon-2xl cil-check text-success" data-toggle="tooltip"
                                            data-placement="top" title="Verified"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('superadmin.dashboard', $staff->id) }}"
                                        class="btn btn-sm btn-link text-success">Login</a>
                                </td>
                                <td>
                                    <a href="{{ route('superadmin.staffs.edit', $staff->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('superadmin.staffs.destroy', $staff->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
