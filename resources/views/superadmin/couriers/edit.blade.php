<x-app-layout title="Edit Courier" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>Couriers</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Edit Courier</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Edit Courier') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.couriers.update', $courier) }}" method="POST">
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $courier->name) }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="code" class="form-label">{{ __('Courier Short Code') }}</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $courier->code) }}" required>
                                @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="logo" class="form-label">{{ __('Logo') }}</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" value="{{ old('logo') }}">
                                @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="featured_image" class="form-label">{{ __('Featured Image') }}</label>
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" value="{{ old('featured_image') }}">
                                @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="library_class" class="form-label">{{ __('Library Class') }}</label>
                                <input type="text" class="form-control @error('library_class') is-invalid @enderror" id="library_class" name="library_class" value="{{ old('library_class', $courier->library_class) }}" required>
                                @error('library_class')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">{{ __('URL') }}</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $courier->url) }}" required>
                                @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="custom_api_available" name="custom_api_available" value="1" role="switch" {{ old('custom_api_available', $courier->custom_api_available) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="custom_api_available">{{ __('Custom API integration available') }}</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Status') }}</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    @forelse(\App\Enums\Status::getInstances() as $status)
                                        <option value="{{ $status->value }}" {{ old('status', $courier->status) == $status->value ? 'selected' : '' }}>{{ $status->description }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('UpdateRequest') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
