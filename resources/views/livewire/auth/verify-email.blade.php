{{-- <div class="mt-4 flex flex-col gap-6">
    <flux:text class="text-center">
        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
    </flux:text>

    @if (session('status') == 'verification-link-sent')
        <flux:text class="text-center font-medium !dark:text-green-400 !text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </flux:text>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <flux:button wire:click="sendVerification" variant="primary" class="w-full">
            {{ __('Resend verification email') }}
        </flux:button>

        <flux:link class="text-sm cursor-pointer" wire:click="logout">
            {{ __('Log out') }}
        </flux:link>
    </div>
</div> --}}


 <div class="col-md-6 col-xl-6 col-lg-6">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="mb-0 border-0">

                                            <div class="p-0">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <a href="index.html" class="auth-logo">
                                                            <img src="assets/images/logo-dark.png" alt="logo-dark" class="mx-auto" height="28" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="text-center pt-3">
                                                <div class="maintenance-img">
                                                    <img src="assets/images/svg/confirmation-email.svg" height="72" alt="svg-logo">
                                                </div>
                                            </div>

                                            <div class="auth-title-section mb-3 text-center mt-2">
                                                <h3 class="text-dark fs-20 fw-medium mb-2">Email Confirmation</h3>
                                                <p class="text-muted fs-15">Please check your email for confirmation mail.
                                                   
                                                </p>

                                                 @if (session('status') == 'verification-link-sent')
                                                    <flux:text class="alert alert-info">
                                                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                                    </flux:text>
                                                @endif
                                            </div>

                                            <div class="d-grid">
                                                <button href="#" class="btn btn-primary mt-3 me-1" wire:click="sendVerification">Resend Confirmation</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


