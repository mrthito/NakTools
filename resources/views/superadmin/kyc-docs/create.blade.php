<x-app-layout title="Add new KYC Document" for="superadmin">
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <span>KYC Documents</span>
        </li>
        <li class="breadcrumb-item active">
            <span>Add new KYC Document</span>
        </li>
    </x-slot>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Add new KYC Document') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('superadmin.kyc-docs.store') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <h4 class="alert-heading">Error!</h4>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="country_id" class="form-label">{{ __('Country') }}</label>
                                <select class="form-select @error('country_id') is-invalid @enderror" id="country_id"
                                    name="country_id">
                                    @forelse($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }} {{ $country->emoji }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('country_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="state_id" class="form-label">{{ __('State') }}</label>
                                <select class="form-select @error('state_id') is-invalid @enderror" id="state_id"
                                    name="state_id">
                                    @forelse($states as $state)
                                        <option value="{{ $state->id }}"
                                            {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}</option>
                                    @empty
                                        <option value="">{{ __('Select Country First') }}</option>
                                    @endforelse
                                </select>
                                @error('state_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Document Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="required"
                                        name="required" value="1" role="switch"
                                        {{ old('required') ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="required">{{ __('Required Document') }}</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="has_id_number"
                                        name="has_id_number" value="1" role="switch"
                                        {{ old('has_id_number') ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="has_id_number">{{ __('Document has ID Number') }}</label>
                                </div>
                            </div>

                            <div id="when_id_number" class="card p-2 mb-4">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="id_required"
                                            name="id_required" value="1" role="switch"
                                            {{ old('id_required') ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="id_required">{{ __('ID Number Required') }}</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="id_regex" class="form-label">{{ __('Regex for ID Number') }}</label>
                                    <input type="text" class="form-control @error('id_regex') is-invalid @enderror"
                                        id="id_regex" name="id_regex" value="{{ old('id_regex') }}">
                                    @error('id_regex')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="has_name" name="has_name"
                                        value="1" role="switch" {{ old('has_name') ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="has_name">{{ __('Document has Name') }}</label>
                                </div>
                            </div>

                            <div id="when_name" class="card p-2 mb-4">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="name_required"
                                            name="name_required" value="1" role="switch"
                                            {{ old('name_required') ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="name_required">{{ __('Name Required') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="has_expiration_date"
                                        name="has_expiration_date" value="1" role="switch"
                                        {{ old('has_expiration_date') ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="has_expiration_date">{{ __('Document has Expiration Date') }}</label>
                                </div>
                            </div>

                            <div id="when_expiration_date" class="card p-2 mb-4">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="expiration_date_required"
                                            name="expiration_date_required" value="1" role="switch"
                                            {{ old('expiration_date_required') ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="expiration_date_required">{{ __('Expiration Date Required') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="number_of_pages" class="form-label">{{ __('Number of Pages') }}</label>
                                <select class="form-select @error('number_of_pages') is-invalid @enderror"
                                    id="number_of_pages" name="number_of_pages">
                                    <option value="0" {{ old('number_of_pages') == '0' ? 'selected' : '' }}>Not
                                        Sure</option>
                                    @foreach (range(1, 10) as $item)
                                        <option value="{{ $item }}"
                                            {{ old('number_of_pages') == $item ? 'selected' : '' }}>
                                            {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#country_id').on('change', function() {
                    var country_id = $(this).val();
                    if (country_id) {
                        $.ajax({
                            url: "{{ route('superadmin.kyc-docs.getStates') }}",
                            type: "POST",
                            data: {
                                country_id: country_id,
                                _token: "{{ csrf_token() }}",
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.success) {
                                    $('#state_id').empty();
                                    let $html = '<option value="">Select State</option>';
                                    $.each(data.states, function(key, value) {
                                        $html += '<option value="' + value.id + '">' + value
                                            .name + '</option>';
                                    });
                                    $('#state_id').html($html);
                                } else {
                                    $('#state_id').empty();
                                    $('#state_id').hide();
                                }
                            }
                        });
                    }
                });
                $('#has_id_number').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#when_id_number').show();
                    } else {
                        $('#when_id_number').hide();
                    }
                });
                $('#has_name').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#when_name').show();
                    } else {
                        $('#when_name').hide();
                    }
                });
                $('#has_expiration_date').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#when_expiration_date').show();
                    } else {
                        $('#when_expiration_date').hide();
                    }
                });
                $('#has_id_number').change();
                $('#has_name').change();
                $('#has_expiration_date').change();
            });
        </script>
    @endsection
</x-app-layout>
