<form wire:submit="submit">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="form-label">
                {{ __('First Name') }}
                <span class="text-danger">*</span>
            </div>
            <input type="text" class="form-control" wire:model="form.first_name" value="{{ old('form.first_name') }}"
                placeholder="{{ __('First Name') }}">
            @error('form.first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-4">
            <div class="form-label">
                {{ __('Middle Name') }}
                <small class="text-muted">{{ __('(optional)') }}</small>
            </div>
            <input type="text" class="form-control" wire:model="form.middle_name"
                value="{{ old('form.middle_name') }}" placeholder="{{ __('Middle Name') }}">
            @error('form.middle_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-4">
            <div class="form-label">
                {{ __('Last Name') }}
                <span class="text-danger">*</span>
            </div>
            <input type="text" class="form-control" wire:model="form.last_name" value="{{ old('form.last_name') }}"
                placeholder="{{ __('Last Name') }}">
            @error('form.last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-4">
            <label class="form-label">
                {{ __('Date of Birth') }}
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" wire:model="form.date_of_birth"
                value="{{ old('form.date_of_birth') }}" placeholder="{{ __('Date of Birth') }}">
            @error('form.date_of_birth')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2 mb-4">
            <label class="form-label">
                {{ __('Gender') }}
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" wire:model="form.gender">
                <option value="">{{ __('Select Gender') }}</option>
                @forelse(\App\Enums\Gender::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @empty
                @endforelse
            </select>
            @error('form.gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-4">
            <label class="form-label">
                {{ __('Email') }}
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" wire:model="form.email" value="{{ old('form.email') }}"
                placeholder="{{ __('Email') }}">
            @error('form.email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-4">
            <label class="form-label">
                {{ __('Phone Number') }}
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" wire:model="form.phone_number"
                value="{{ old('form.phone_number') }}" placeholder="{{ __('Phone Number') }}">
            @error('form.phone_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-4">
            <label class="form-label">
                {{ __('Registration Type') }}
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" wire:model="form.registration_type">
                <option value="">{{ __('Select Registration Type') }}</option>
                @forelse(\App\Enums\KycRegistrationType::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @empty
                @endforelse
            </select>
            @error('form.registration_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <h3 class="card-title mt-4">Address Information</h3>
    <div class="alert alert-primary">
        It is important that you provide your full and accurate address. This will help us to verify
        your identity and ensure that you are able to use {{ config('app.name') }} services.
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">
                {{ __('Address Line 1') }}
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" wire:model="form.address_line_1"
                value="{{ old('form.address_line_1') }}" placeholder="{{ __('Address Line 1') }}">
            @error('form.address_line_1')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">
                {{ __('Address Line 2') }}
            </label>
            <input type="text" class="form-control" wire:model="form.address_line_2"
                value="{{ old('form.address_line_2') }}" placeholder="{{ __('Address Line 2') }}">
            @error('form.address_line_2')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">
                {{ __('Country') }}
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" wire:model.live="form.country_id">
                <option value="">{{ __('Select Country') }}</option>
                @forelse($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @empty
                @endforelse
            </select>
            @error('form.country_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">
                {{ __('State') }}
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" wire:model.live="form.state_id">
                <option value="">{{ __('Select State') }}</option>
                @forelse($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @empty
                @endforelse
            </select>
            @error('form.state_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">
                {{ __('City') }}
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" wire:model="form.city_id">
                <option value="">{{ __('Select City') }}</option>
                @forelse($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @empty
                @endforelse
            </select>
            @error('form.city_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">
                {{ __('Pincode') }}
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" wire:model="form.pincode" value="{{ old('form.pincode') }}"
                placeholder="{{ __('Pincode') }}">
            @error('form.pincode')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @if (count($kycDocs))
        <h3 class="card-title mt-4">KYC Documents</h3>
        <div class="alert alert-primary">
            It is important that you provide correct KYC documents. This will help us to verify your identity and
            ensure
            that you are able to use {{ config('app.name') }} services.
        </div>
        <div class="row mb-5">
            @php
                $index = 0;
            @endphp
            @forelse($kycDocs as $kycDoc)
                <input type="hidden" wire:model="form.kyc_docs.{{ $index }}.kyc_doc_id"
                    value="{{ $kycDoc->id }}">
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-status-top bg-success"></div>
                        <div class="card-header">
                            Please add {{ $kycDoc->name }} information
                            @if ($kycDoc->required)
                                <span class="text-danger">*</span>
                            @else
                                <small class="text-muted">(optional)</small>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                {{-- Filepond --}}
                                @php
                                    $fileloop = 0;
                                @endphp
                                @forelse (range(1, $kycDoc->number_of_pages) as $document)
                                    <div class="col-md-{{ $kycDoc->number_of_pages > 1 ? '6' : '12' }} mb-3">
                                        <input type="file" class="form-control"
                                            wire:model="form.kyc_docs.{{ $index }}.documents.{{ $fileloop }}"
                                            value="{{ old('form.kyc_docs.' . $index . '.documents.' . $fileloop) }}"
                                            placeholder="{{ __('Document') }}">
                                        @error('form.kyc_docs.' . $index . '.' . $document . '.' . $fileloop)
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @php
                                        $fileloop++;
                                    @endphp
                                @empty
                                @endforelse
                            </div>
                            {{-- number_of_pages --}}
                            @if ($kycDoc->has_name)
                                <div class="mb-3">
                                    <div class="form-label">
                                        {{ __('Name on Document') }}
                                        @if ($kycDoc->name_required)
                                            <span class="text-danger">*</span>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control"
                                        wire:model="form.kyc_docs.{{ $index }}.name"
                                        value="{{ old('form.kyc_docs.' . $index . '.name') }}"
                                        placeholder="{{ __('Name on Document') }}">
                                    @error('form.kyc_docs.' . $index . '.name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            @if ($kycDoc->has_id_number)
                                <div class="mb-3">
                                    <div class="form-label">
                                        {{ __('Document ID Number') }}
                                        @if ($kycDoc->id_required)
                                            <span class="text-danger">*</span>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control"
                                        wire:model="form.kyc_docs.{{ $index }}.idnum"
                                        value="{{ old('form.kyc_docs.' . $index . '.idnum') }}"
                                        placeholder="{{ __('Name on Document') }}">
                                    @error('form.kyc_docs.' . $index . '.idnum')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            @if ($kycDoc->has_expiration_date)
                                <div class="mb-3">
                                    <div class="form-label">
                                        {{ __('Expiration Date') }}
                                        @if ($kycDoc->expiration_date_required)
                                            <span class="text-danger">*</span>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control"
                                        wire:model="form.kyc_docs.{{ $index }}.expiration_date"
                                        value="{{ old('form.kyc_docs.' . $index . '.expiration_date') }}"
                                        placeholder="{{ __('Name on Document') }}">
                                    @error('form.kyc_docs.' . $index . '.expiration_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                    $index++;
                @endphp
            @empty
                <div class="col-md-12">
                    <div class="alert alert-primary">
                        Your country does not require any KYC documents.
                    </div>
                </div>
            @endforelse
        </div>
    @endif

    <button type="submit" class="btn btn-primary">
        <x-spin target="submit" />
        {{ __('Submit') }}
    </button>
</form>
