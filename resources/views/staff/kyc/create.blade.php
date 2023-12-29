<x-app-layout title="Add new Coupon" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Coupons</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Add new Coupon</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Add new Coupon') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.coupons.store') }}" method="POST">
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
                                <label for="code" class="form-label">{{ __('Code') }}</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" required>
                                @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="type" class="form-label">{{ __('Coupon Type') }}</label>
                                        <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                            @forelse(\App\Enums\CouponType::getInstances() as $type)
                                                <option value="{{ $type->value }}" {{ old('type') == $type->value ? 'selected' : '' }}>{{ $type->description }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="value" class="form-label">{{ __('Value') }}</label>
                                        <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value') }}" required>
                                        @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">{{ __('Start Date') }}</label>
                                        <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                        @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">{{ __('End Date') }}</label>
                                        <input type="text" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                                        @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Status') }}</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    @forelse(\App\Enums\Status::getInstances() as $status)
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
