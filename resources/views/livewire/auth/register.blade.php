{{-- <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Full name')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div> --}}


<div class="col-md-6 col-xl-6 col-lg-6">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="mb-0 border-0">
                <div class="p-0">
                    <div class="text-center">
                        <div class="mb-4">
                            <a href="{{ url('/') }}" class="auth-logo">
                                <img src="{{asset('assets/images/logo-dark.png')}}" alt="logo-dark" class="mx-auto" height="28" />
                            </a>
                        </div>

                        <div class="auth-title-section mb-3"> 
                            <h3 class="text-dark fs-20 fw-medium mb-2">Get Started</h3>
                            <p class="text-dark text-capitalize fs-14 mb-0">Please enter your details.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-0">
                    <form wire:submit="register" class="my-4">
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" wire:model="name" type="text" id="username" required="" placeholder="Enter your Username">
                        </div>

                        <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" wire:model="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" wire:model="password" type="password" required="" id="password" placeholder="Enter your password">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input class="form-control" wire:model="password_confirmation" type="password" required="" id="password" placeholder="Enter your password confirmation">
                        </div>

                        <div class="form-group d-flex mb-3">
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">I agree to the <a href="#" class="text-primary fw-medium"> Terms and Conditions</a></label>
                                </div>
                            </div><!--end col-->
                        </div>
                        
                        <div class="form-group mb-0 row">
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit"> Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        <p class="mb-0">Already have an account ?<a class='text-primary ms-2 fw-medium' href='{{url('login')}}'>Login here</a></p>
                    </div>
                </div>
                                     
            </div>
        </div>
    </div>
</div>


