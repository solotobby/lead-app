<div>
    {{-- The whole world belongs to you. --}}

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
            </div>
        </div>

        @if ($leads && $leads->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Leads from Your Services</h4>
                        </div>

                        <div class="card-body">
                            @foreach ($leads as $lead)
                                @php
                                    // Mask email
                                    $email = $lead->user->email;
                                    if ($email) {
                                        [$name, $domain] = explode('@', $email);
                                        $maskedEmail =
                                            substr($name, 0, 1) .
                                            str_repeat('*', max(strlen($name) - 1, 1)) .
                                            '@' .
                                            $domain;
                                    } else {
                                        $maskedEmail = null;
                                    }

                                    // Mask phone
                                    $phone = $lead->user->phone;
                                    if ($phone) {
                                        $maskedPhone =
                                            substr($phone, 0, 2) .
                                            str_repeat('*', max(strlen($phone) - 2, 0)) .
                                            substr($phone, -2);
                                    } else {
                                        $maskedPhone = null;
                                    }
                                @endphp


                                <div class="alert alert-info" role="alert">

                                    Name of Service: <strong>{{ $lead->first()->service->name ?? 'N/A' }}</strong><br>
                                    Credit Required: <strong>{{ $lead->credit }}</strong><br>
                                    Name of Client: <strong>{{ $lead->user->name }}</strong><br>
                                    Phone of Client: <strong>{{ $maskedPhone }}</strong><br>
                                    Email of Client: <strong>{{ $maskedEmail }}</strong><br>
                                    Number of Conversions Started: <strong>1 of 5</strong><br>
                                    {{-- Date of Interest: <strong>{{ $lead->created_at->format('F j, Y, g:i a') }}</strong>. --}}
                                    <br>
                                    @if (auth()->user()->credit <= $lead->credit)
                                             <button class="btn btn-primary" data-bs-target="#exampleModalToggle-{{ $lead->code }}" data-bs-toggle="modal">Add Credit</button>
                                    @else

                                     
                                         <button class="btn btn-primary" wire:click="contactLead('{{$lead->code}}')">Contact Poster</button>
                                       




                                        
                                    @endif
                                    
                                      {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle-{{ $lead->code }}" data-bs-toggle="modal">Contact Poster</button> --}}
                                    {{-- <a href="" class="btn btn-sm btn-primary mt-2">Contact Poster</a> --}}

                                </div>

                                <div class="modal fade" id="exampleModalToggle-{{ $lead->code }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Add Credit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           You require {{ $lead->credit }} credits to contact this lead. You currently have {{ auth()->user()->credit }} credits. Please add credit to proceed.
                                            <br>

                                            Credit: 450<br>
                                            Amount: £300 <br>

                                           <button class="btn btn-primary" wire:click="makePayment()">Add Credit</button>

                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2-{{ $lead->code }}" data-bs-toggle="modal">Open second modal</button>
                                        </div> --}}
                                        </div>
                                    </div>
                                </div>
                                    
                                {{-- second modal --}}
                                <div class="modal fade" id="exampleModalToggle2-{{ $lead->code }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Hide this modal and show the first with the button below.
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                  


                            @endforeach



                        </div>


        @endif



    </div>





    {{-- @if ($showModal)
                            <div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Modal Title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>This modal was conditionally rendered and is now shown via Bootstrap JS.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    setTimeout(function () {
                                        const modal = new bootstrap.Modal(document.getElementById('standard-modal'));
                                        modal.show();
                                    }, 100); // slight delay to ensure it's in DOM
                                });
                            </script>
                        @endif --}}


</div>
