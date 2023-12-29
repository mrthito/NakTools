<x-app-layout title="Edit Plan" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Plans</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Edit Plan</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Edit Plan') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.plans.update', $plan) }}" method="POST">
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $plan->name) }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $plan->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Plan Interval') }}</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('interval') is-invalid @enderror" id="interval" name="interval" value="{{ old('interval', $plan->interval) }}" required>
                                    <div class="input-group-append">
                                        <select class="form-select @error('interval_type') is-invalid @enderror" id="interval_type" name="interval_type" required>
                                            @forelse(\App\Enums\TimeIntervalEnum::getInstances() as $interval)
                                                <option value="{{ $interval->value }}" {{ old('interval_type', (string)$plan->interval_type) == (string)$interval->value ? 'selected' : '' }}>{{ $interval->description }}</option>
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
                                <input type="text" class="form-control @error('trial_period_days') is-invalid @enderror" id="trial_period_days" name="trial_period_days" value="{{ old('trial_period_days', $plan->trial_period_days) }}" required>
                                @error('trial_period_days')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="featured_plan" name="featured_plan" value="1" role="switch" {{ old('featured_plan', $plan->featured) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured_plan">{{ __('Featured Plan') }}</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="free_plan" name="free_plan" value="1" role="switch" {{ old('free_plan', $plan->free) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="free_plan">{{ __('Free Plan') }}</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Status') }}</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    @forelse(\App\Enums\PlanStatus::getInstances() as $status)
                                        <option value="{{ $status->value }}" {{ old('status', (string)$plan->status) == (string)$status->value ? 'selected' : '' }}>{{ $status->description }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('UpdateRequest') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Plan Features') }}
                        <div class="float-end">
                            <div class="btn-group">
                                <a href="javascript:void(0)" class="btn btn-sm btn-primary" id="addFeatureRepeater">{{ __('Add Feature') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.plans.features', $plan) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div id="featuresRepeaterBody">
                            @forelse($plan->features as $feature)
                                <div class="mb-3 feature">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="feature_name" name="feature_name[]" placeholder="{{ __('Feature Name') }}" value="{{ $feature->feature }}">
                                        <button type="button" class="btn btn-danger text-white" id="removeFeatureRepeater">{{ __('Remove') }}</button>
                                    </div>
                                </div>
                            @empty
                            <div class="mb-3 feature">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="feature_name" name="feature_name[]" placeholder="{{ __('Feature Name') }}">
                                    <button type="button" class="btn btn-danger text-white" id="removeFeatureRepeater">{{ __('Remove') }}</button>
                                </div>
                            </div>
                            @endforelse
                        </div>
                            <button type="submit" class="btn btn-primary">{{ __('UpdateRequest') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('addFeatureRepeater').addEventListener('click', function () {
                    document.getElementById('featuresRepeaterBody').innerHTML += `
                        <div class="mb-3 feature">
                            <div class="input-group">
                                <input type="text" class="form-control" id="feature_name" name="feature_name[]" placeholder="{{ __('Feature Name') }}">
                                <button type="button" class="btn btn-danger text-white" id="removeFeatureRepeater">{{ __('Remove') }}</button>
                            </div>
                        </div>
                    `;
                });

                document.getElementById('featuresRepeaterBody').addEventListener('click', function (e) {
                    if (e.target && e.target.id == 'removeFeatureRepeater') {
                        e.target.closest('.feature').remove();
                    }
                });
            });
        </script>
    @endsection
</x-app-layout>
