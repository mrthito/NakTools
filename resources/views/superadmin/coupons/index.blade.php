<x-app-layout title="Manage Coupons" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Coupons</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Manage Coupons</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Manage Coupons') }}
                <div class="float-end">
                    <div class="btn-group">
                        <a href="{{ route('superadmin.coupons.create') }}" class="btn btn-sm btn-primary">Add new</a>
                        @if(request()->status == \App\Enums\PlanStatus::Deleted)
                            <a href="{{ route('superadmin.coupons.index') }}" class="btn btn-sm btn-success text-white">All Coupons</a>
                        @else
                            <a href="{{ route('superadmin.coupons.index', ['status' => \App\Enums\Status::Deleted]) }}" class="btn btn-sm btn-warning">Trash</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Coupon Value</th>
                        <th scope="col" width="100">Status</th>
                        <th scope="col" width="150">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($coupons as $coupon)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $coupon->code }}</td>
                            <td>
                                {{ $coupon->coupon_value }}
                            </td>
                            <td>
                                {{ \App\Enums\Status::getDescription($coupon->status_text) }}
                            </td>
                            <td>
                                <form action="{{ route('superadmin.coupons.destroy', $coupon->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @if($coupon->trashed())
                                        <button type="submit" class="btn btn-sm btn-success text-white btn-restore">Restore</button>
                                    @else
                                        <a href="{{ route('superadmin.coupons.edit', $coupon->id) }}" class="btn btn-sm btn-primary text-white">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger text-white btn-delete">Delete</button>
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
