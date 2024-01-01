<h3 class="card-title">{{ __('Delete Account') }}</h3>
<div class="alert alert-primary">
    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
</div>
@error('password1')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-user-modal">
    {{ __('Delete Account') }}
</button>

<div class="modal modal-blur fade" id="delete-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="{{ route('u.profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="modal-title">{{ __('Delete your Account?') }}</div>
                    <div class="text-center w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z">
                            </path>
                            <path d="M12 9v4"></path>
                            <path d="M12 17h.01"></path>
                        </svg>
                    </div>
                    <div class="alert alert-danger">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </div>

                    <div class="mt-6">
                        <x-input-label for="password1" value="{{ __('Password') }}" class="sr-only" />
                        <x-text-input id="password1" name="password1" type="password" class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete my account</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
