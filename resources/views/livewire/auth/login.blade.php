{{-- <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Password')"
                viewable
            />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Remember me')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Don\'t have an account?') }}
            <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link>
        </div>
    @endif
</div>


 --}}

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
                            <h3 class="text-dark fs-20 fw-medium mb-2">Welcome back</h3>
                            <p class="text-dark text-capitalize fs-14 mb-0">Please enter your details.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-0">
                    <form wire:submit="login" class="my-4">
                        <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control"  wire:model="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control"  wire:model="password" type="password" required="" id="password" placeholder="Enter your password">
                        </div>

                        <div class="form-group d-flex mb-3">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input type="checkbox" wire:model="remember" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-end">
                                <a class='text-muted fs-14' href='auth-recoverpw.html'>Forgot password?</a>                             
                            </div>
                        </div>
                        
                        <div class="form-group mb-0 row">
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        <p class="mb-0">Don't have an account ?<a class='text-primary ms-2 fw-medium' href='{{ url('register') }}'>Sign Up</a></p>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>
