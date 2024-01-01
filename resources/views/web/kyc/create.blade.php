<x-app-layout title="{{ __('Complete your Kyc') }}">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12 col-xl-12 mx-auto">
                <div class="card card-sm mb-4">
                    <div class="card-status-top bg-primary"></div>
                    <div class="card-body">
                        <h2 class="mb-4">{{ __('Complete your Kyc') }}</h2>
                        <h3 class="card-title">Profile Details</h3>
                        <div class="row align-items-center">
                            <div class="col-auto"><span class="avatar avatar-xl"
                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
                            </div>
                            <div class="col-auto"><a href="#" class="btn">
                                    Change avatar
                                </a></div>
                            <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                                    Delete avatar
                                </a></div>
                        </div>
                        <h3 class="card-title mt-4">Business Profile</h3>
                        <div class="row g-3">
                            <div class="col-md">
                                <div class="form-label">Business Name</div>
                                <input type="text" class="form-control" value="Tabler">
                            </div>
                            <div class="col-md">
                                <div class="form-label">Business ID</div>
                                <input type="text" class="form-control" value="560afc32">
                            </div>
                            <div class="col-md">
                                <div class="form-label">Location</div>
                                <input type="text" class="form-control" value="Peimei, China">
                            </div>
                        </div>
                        <h3 class="card-title mt-4">Email</h3>
                        <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.
                        </p>
                        <div>
                            <div class="row g-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control w-auto"
                                        value="paweluna@howstuffworks.com">
                                </div>
                                <div class="col-auto"><a href="#" class="btn">
                                        Change
                                    </a></div>
                            </div>
                        </div>
                        <h3 class="card-title mt-4">Password</h3>
                        <p class="card-subtitle">You can set a permanent password if you don't want to use temporary
                            login codes.</p>
                        <div>
                            <a href="#" class="btn">
                                Set new password
                            </a>
                        </div>
                        <h3 class="card-title mt-4">Public profile</h3>
                        <p class="card-subtitle">Making your profile public means that anyone on the Dashkit network
                            will be able to find
                            you.</p>
                        <div>
                            <label class="form-check form-switch form-switch-lg">
                                <input class="form-check-input" type="checkbox">
                                <span class="form-check-label form-check-label-on">You're currently visible</span>
                                <span class="form-check-label form-check-label-off">You're
                                    currently invisible</span>
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ __('Basic Information') }}</h3>
                        {{-- 'user_id'
                        'first_name'
                        'middle_name'
                        'last_name'
                        'date_of_birth'
                        'gender'
                        'country_id'
                        'state_id'
                        'city_id'
                        'pincode'
                        'address_line_1'
                        'address_line_2'
                        'email'
                        'phone_number'
                        'registration_type' --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
