<div>
    {{-- The whole world belongs to you. --}}

    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"> {{ $leads->count() }} lead match</h4>
            </div>
        </div>
        @if ($leads && $leads->count() > 0)
            <div class="row">
                @foreach ($leads as $lead)
                    <div class="col-sm-12 col-lg-12">
                        <div class="card d-block">
                            <div class="card-header">
                                <h4 class="card-title"> <i class="mdi mdi-emoticon-wink-outline me-1"></i>
                                    {{ getFirstName($lead->user->name) }} -
                                    <i>{{ $lead->service->name ?? 'N/A' }}</i>
                                </h4>
                            </div>
                            <div class="card-body">
                                <span class="mdi mdi-map-marker-outline"></span> {{ $lead->user->location ?? 'N/A' }}
                                <br>
                                <span class="mdi mdi-phone"></span> {{ maskPhone($lead->user->phone) ?? 'N/A' }} <br>
                                <span class="mdi mdi-email-outline"></span>
                                {{ maskEmail($lead->user->email) ?? 'N/A' }}<br>
                                <span class="mdi mdi-chat-outline"></span> {{ $lead->contacted_count }} of 5 <br>
                                <span class="mdi mdi-currency-usd"></span> {{ $lead->credit }} credits

                                <div class="accordion mt-2" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne-{{ $lead->id }}" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Highlights
                                            </button>
                                        </h2>
                                        <div id="collapseOne-{{ $lead->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @if ($lead->service && $lead->service->questions->isNotEmpty())
                                                    <p class="card-text text-muted mb-0">
                                                        @foreach ($lead->service->questions as $question)
                                                            <strong> {{ $question->question ?? 'No Question Text' }}
                                                            </strong> <br>

                                                            @php
                                                                $answer = $lead->answers->firstWhere(
                                                                    'service_question_id',
                                                                    $question->id,
                                                                );
                                                            @endphp
                                                            {{ $answer->option->option ?? 'No Answer Selected' }} <br>


                                                            @if ($lead->answers->where('service_question_id', $question->id)->isEmpty())
                                                                <p>No answer provided for this question.</p>
                                                            @endif
                                                            </li>
                                                        @endforeach
                                                    </p>
                                                @else
                                                    <p class="card-text text-muted mb-0">No additional information
                                                        provided by the
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="mt-3">
                                    <button class="btn btn-sm btn-info">View Deatils</button>

                                    @if (auth()->user()->credit <= $lead->credit)
                                        <button class="btn btn-primary btn-sm"
                                            data-bs-target="#exampleModalToggle-{{ $lead->code }}"
                                            data-bs-toggle="modal">Add Credit</button>
                                    @else
                                        <button class="btn btn-primary btn-sm"
                                            wire:click="contactLead('{{ $lead->code }}')">Contact Poster</button>
                                    @endif
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="modal fade" id="exampleModalToggle-{{ $lead->code }}" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Add Credit
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You require {{ $lead->credit }} credits to contact this lead. You
                                        currently have {{ auth()->user()->credit }} credits. Please add credit
                                        to proceed.
                                        <br>

                                        Credit: 450<br>
                                        Amount: £300 <br>

                                        <button class="btn btn-primary" wire:click="makePayment()">Add
                                            Credit</button>

                                    </div>
                                    {{-- <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2-{{ $lead->code }}" data-bs-toggle="modal">Open second modal</button>
                                        </div> --}}
                                </div>
                            </div>
                        </div>

                        {{-- second modal --}}
                        <div class="modal fade" id="exampleModalToggle2-{{ $lead->code }}" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Hide this modal and show the first with the button below.
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle"
                                            data-bs-toggle="modal">Back to first</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach

            </div>
        @else
            <div class="alert alert-warning" role="alert">
                You have no leads at the moment. Please check back later.
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
