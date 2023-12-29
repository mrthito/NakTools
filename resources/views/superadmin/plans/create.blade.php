<x-app-layout title="Add new Plan" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Plans</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Add new Plan</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Add new Plan') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.plans.store') }}" method="POST">
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

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Plan Interval') }}</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('interval') is-invalid @enderror" id="interval" name="interval" value="{{ old('interval') }}" required>
                                    <div class="input-group-append">
                                        <select class="form-select @error('interval_type') is-invalid @enderror" id="interval_type" name="interval_type" required>
                                            @forelse(\App\Enums\TimeIntervalEnum::getInstances() as $interval)
                                                <option value="{{ $interval->value }}" {{ old('interval_type') == $interval->value ? 'selected' : '' }}>{{ $interval->description }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                @error('interval')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('interval_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Trial Period Days') }}</label>
                                <input type="text" class="form-control @error('trial_period_days') is-invalid @enderror" id="trial_period_days" name="trial_period_days" value="{{ old('trial_period_days') }}" required>
                                @error('trial_period_days')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="featured_plan" name="featured_plan" value="1" role="switch" {{ old('featured_plan') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured_plan">{{ __('Featured Plan') }}</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="free_plan" name="free_plan" value="1" role="switch" {{ old('free_plan') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="free_plan">{{ __('Free Plan') }}</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Status') }}</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    @forelse(\App\Enums\PlanStatus::getInstances() as $status)
                                        <option value="{{ $status->value }}" {{ old('status') == $status->value ? 'selected' : '' }}>{{ $status->description }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
