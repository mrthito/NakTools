<x-app-layout title="{{ __('Complete your Kyc') }}">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12 col-xl-12 mx-auto">
                <div class="card card-sm mb-4">
                    <div class="card-status-top bg-primary"></div>
                    <div class="card-header">
                        <h2>{{ __('Complete your Kyc') }}</h2>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ __('Basic Information') }}</h3>

                        <livewire:web.new-kyc-form />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
