{{-- <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Reset password')" :description="__('Please enter your new password below')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="resetPassword" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email')"
            type="email"
            required
            autocomplete="email"
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
                {{ __('Reset password') }}
            </flux:button>
        </div>
    </form>
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
                            <h3 class="text-dark fs-20 fw-medium mb-2">Reset password</h3>
                            <p class="text-dark text-capitalize fs-14 mb-0">Please enter your new password below</p>
                        </div>
                    </div>
                </div>

                <div class="pt-0">
                     @if (session()->has('status'))
                        <div class="alert alert-info">
                             {{ session('status') }}
                        {{-- <div class="mb-4 text-green-600 font-medium "> --}}
                           
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form wire:submit="resetPassword" class="my-4">
                        <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control"  wire:model="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                        </div>


                         <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" wire:model="password" type="password" required="" id="password" placeholder="Enter your password">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input class="form-control" wire:model="password_confirmation" type="password" required="" id="password" placeholder="Enter your password confirmation">
                        </div>

                       
                        <div class="form-group mb-0 row">
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit"> Reset password </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- <div class="text-center text-muted">
                        <p class="mb-0">Don't have an account ?<a class='text-primary ms-2 fw-medium' href='{{ url('register') }}'>Sign Up</a></p>
                    </div> --}}
                </div>

                
            </div>
        </div>
    </div>
</div>



