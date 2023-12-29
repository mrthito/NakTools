<x-app-layout title="Manage Couriers" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Couriers</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Manage Couriers</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Manage Couriers') }}
                <div class="float-end">
                    <div class="btn-group">
                        <a href="{{ route('superadmin.couriers.create') }}" class="btn btn-sm btn-primary">Add new</a>
                        @if(request()->status == \App\Enums\PlanStatus::Deleted)
                            <a href="{{ route('superadmin.couriers.index') }}" class="btn btn-sm btn-success text-white">All Couriers</a>
                        @else
                            <a href="{{ route('superadmin.couriers.index', ['status' => \App\Enums\Status::Deleted]) }}" class="btn btn-sm btn-warning">Trash</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col" width="90">Logo</th>
                        <th scope="col">Name</th>
                        <th scope="col" width="100">Website</th>
                        <th scope="col" width="100">API</th>
                        <th scope="col" width="100">Status</th>
                        <th scope="col" width="150">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($couriers as $courier)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <img src="{{ $courier->logo_url }}" alt="{{ $courier->name }}" width="80">
                            </td>
                            <td>{{ $courier->name }}</td>
                            <td>
                                <a href="{{ $courier->url }}" target="_blank">
                                    <i class="icon icon-2xl cil-external-link text-primary"></i>
                                </a>
                            </td>
                            <td>
                                {{ \App\Enums\YesOrNoEnum::getDescription($courier->custom_api_available) }}
                            </td>
                            <td>
                                {{ \App\Enums\Status::getDescription($courier->status) }}
                            </td>
                            <td>
                                <form action="{{ route('superadmin.couriers.destroy', $courier->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.couriers.edit', $courier->id) }}" class="btn btn-sm btn-primary text-white">Edit</a>
                                    @if($courier->trashed())
                                        <button type="submit" class="btn btn-sm btn-success text-white">Restore</button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-danger text-white">Delete</button>
                                    @endif
                                </form>
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
