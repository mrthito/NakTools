<x-app-layout title="Manage Plans" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Plans</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Manage Plans</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Manage Plans') }}
                <div class="float-end">
                    <div class="btn-group">
                        <a href="{{ route('superadmin.plans.create') }}" class="btn btn-sm btn-primary">Add new</a>
                        @if(request()->status == \App\Enums\PlanStatus::Deleted)
                            <a href="{{ route('superadmin.plans.index') }}" class="btn btn-sm btn-success text-white">All Plans</a>
                        @else
                            <a href="{{ route('superadmin.plans.index', ['status' => \App\Enums\PlanStatus::Deleted]) }}" class="btn btn-sm btn-warning">Trash</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(session('success') || session('message'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{ session('success') ?? session('message') }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" width="150">Interval</th>
                        <th scope="col" width="150">Trial</th>
                        <th scope="col" width="50">Free</th>
                        <th scope="col" width="50">Status</th>
                        <th scope="col" width="150">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($plans as $plan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                {{ $plan->name }}
                                @if($plan->featured)
                                    <span class="badge bg-success">Featured</span>
                                @endif
                            </td>
                            <td>{{ $plan->interval . ' ' . \App\Enums\TimeIntervalEnum::getDescription($plan->interval_type) }}</td>
                            <td>{{ $plan->trial_period_days ? $plan->trial_period_days . ' days' : \App\Enums\YesOrNoEnum::getDescription(0) }}</td>
                            <td>{{ \App\Enums\YesOrNoEnum::getDescription($plan->free) }}</td>
                            <td>{{ \App\Enums\YesOrNoEnum::getDescription($plan->status) }}</td>
                            <td>
                                <form action="{{ route('superadmin.plans.destroy', $plan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.plans.edit', $plan->id) }}" class="btn btn-sm btn-primary text-white">Edit</a>
                                    @if($plan->trashed())
                                        <button type="submit" class="btn btn-sm btn-success text-white">Restore</button>
                                    @else
                                    <button type="submit" class="btn btn-sm btn-danger text-white">Delete</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No plans found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
