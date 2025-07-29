<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Update Information</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Update Information</li>
                                </ol>
                            </div>
                        </div>

                          <!-- General Form -->
                        <div class="row">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="col-lg-6">
                                    <div class="card">

                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Basic Information</h5>
                                        </div><!-- end card header -->

                                        <div class="card-body">
                                              @if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                              @endif

                                            <form wire:submit="UpdateInformation">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                                    <input type="text" wire:model="phone" class="form-control" id="exampleInputEmail1" aria-describedby="phoneHelp" placeholder="Enter Phone Number" required>
                                                    <small id="phoneHelp" class="form-text text-muted">Your phone number will be verified </small>
                                                     @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Company Name</label>
                                                    <input type="text" wire:model="company_name" class="form-control" id="exampleInputPassword1" placeholder="Enter Company Name" required>
                                                     @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Website (optional)</label>
                                                    <input type="text" wire:model="website" class="form-control" id="exampleInputPassword1" placeholder="Enter your website">
                                                    @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Brief Description of yourself</label>
                                                     <textarea class="form-control" wire:model="description" placeholder="A brief description of yourself" id="floatingTextarea"></textarea>
                                                     @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Select Category</label>
                                                    <div>
                                                        @foreach ($serviceList as $list)
                                                            <div class="form-check form-check-inline mb-2">
                                                                <input class="form-check-input" type="checkbox"  wire:model="services" value="{{ $list->id }}" id="flexCheckDefault-{{ $list->id }}">
                                                                <label class="form-check-label" for="flexCheckDefault-{{ $list->id }}">
                                                                    {{$list->name}}
                                                                </label>
                                                            </div>
                                                        @endforeach        
                                                    </div>
                                                     @error('services') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                              
                                                <button type="submit" class="btn btn-primary">Save Information</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



</div>
