 {{-- <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Forgot password')" :description="__('Enter your email to receive a password reset link')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email Address')"
            type="email"
            required
            autofocus
            placeholder="email@example.com"
            viewable
        />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Email password reset link') }}</flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        {{ __('Or, return to') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('log in') }}</flux:link>
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
                            <h3 class="text-dark fs-20 fw-medium mb-2">Forgot password</h3>
                            <p class="text-dark text-capitalize fs-14 mb-0">Enter your email to receive a password reset link</p>
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


                    <form wire:submit="sendPasswordResetLink" class="my-4">
                        <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control"  wire:model="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                        </div>

                       
                        <div class="form-group mb-0 row">
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit"> Email password reset link </button>
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


