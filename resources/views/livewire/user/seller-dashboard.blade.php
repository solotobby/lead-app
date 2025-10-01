<div>
    {{-- The whole world belongs to you. --}}
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Select a Service You want</h4>
            </div>
        </div>

        @if ($myServices)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">My Services</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($myServices as $service)
                                    <div class="col-lg-4">
                                        <div class="alert alert-info" role="alert">
                                            You have selected
                                            <strong>{{ $service->service->name ?? 'a service' }}</strong> on
                                            <strong>{{ $service->created_at->format('F j, Y, g:i a') }}</strong>.
                                            <br>
                                            {{-- {{ route('user.leads', $service->id) }} --}}
                                            <a href="" class="btn btn-sm btn-primary mt-2">View Interests</a>
                                            {{-- <strong>Note:</strong> Please select a service to answer some questions and generate leads. Each service you select and complete the questions for will earn you initial credit of $5.00 to start receiving leads. --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endif
        <div class="row">
            @foreach ($services as $service)
                <div class="col-sm-6 col-xl-3" data-bs-toggle="modal" data-bs-target="#serviceQuestionsModal"
                    wire:click="showServiceQuestions({{ $service->id }})">

                    <!-- Simple card -->
                    <div class="card d-block">
                        <img class="card-img-top rounded-top" src="{{ asset('assets/images/small/img-1.jpg') }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">{{ $service->name }}</h4>
                            {{-- <p class="card-text text-muted">Some quick example text to build on the card title and make
                                                up the bulk of the card's content.</p>
                                            <a href="javascript: void(0);" class="btn btn-primary">Button</a> --}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->

                </div><!-- end col -->
            @endforeach


            <!-- Modal -->
            <div wire:ignore.self class="modal fade" data-bs-backdrop="static" id="serviceQuestionsModal" tabindex="-1"
                aria-labelledby="serviceQuestionsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        @if ($selectedService)
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $selectedService->name ?? 'Service Details' }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">


                                @if (count($questions))
                                    <div class="card shadow-sm rounded border-0">
                                        {{-- <h4 class="text-primary mb-2">Question {{ $currentIndex + 1 }} of {{ count($questions) }}</h5> --}}
                                        <p class="fs-5">{{ $questions[$currentIndex]['question'] }}</p>

                                        @if ($questions[$currentIndex]->options->count())
                                            <ul class="list-group">
                                                {{-- Validation Error --}}
                                                @if ($validationError)
                                                    <div class="alert alert-danger">{{ $validationError }}</div>
                                                @endif

                                                @foreach ($questions[$currentIndex]->options as $option)
                                                    <li class="list-group-item">
                                                        <div class="form-check">
                                                            {{-- <input type="checkbox" class="form-check-input" id="checkmeout0-{{$option->id}}"> --}}
                                                            @if ($questions[$currentIndex]->mode === 'radio')
                                                                <input type="radio"
                                                                    wire:model="answers.{{ $questions[$currentIndex]->id }}"
                                                                    value="{{ $option->id }}" class="form-check-input"
                                                                    id="option-{{ $option->id }}">
                                                            @else
                                                                <input type="checkbox"
                                                                    wire:model="answers.{{ $questions[$currentIndex]->id }}.{{ $option->id }}"
                                                                    value="1" class="form-check-input"
                                                                    id="option-{{ $option->id }}">
                                                                {{-- <input type="checkbox" wire:model="answers.{{ $questions[$currentIndex]->id }}[]" 
                                                                                                value="{{ $option->id }}" class="form-check-input" id="option-{{ $option->id }}"> --}}
                                                            @endif
                                                            {{-- <label class="form-check-label" for="checkmeout0-{{$option->id}}" >{{ $option->option }}</label> --}}
                                                            <label class="form-check-label"
                                                                for="option-{{ $option->id }}">
                                                                {{ $option->option }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        @else
                                            <p class="text-muted mt-2">No options for this question.</p>
                                        @endif


                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <button class="btn btn-outline-secondary" wire:click="prevQuestion"
                                            @if ($currentIndex === 0) disabled @endif>
                                            ‹ Previous
                                        </button>
                                        @if ($currentIndex === count($questions) - 1)
                                            <button wire:click="submitAnswers" class="btn btn-success">Submit</button>
                                        @else
                                            <button wire:click="nextQuestion" class="btn btn-outline-primary">Next
                                                ›</button>
                                        @endif
                                        {{-- <button class="btn btn-outline-primary" wire:click="nextQuestion" @if ($currentIndex === count($questions) - 1) disabled @endif>
                                                                    Next
                                                                </button> --}}
                                    </div>
                                @else
                                    <p class="text-muted">No questions found for this service.</p>
                                @endif





                            </div>
                        @else
                            <div class="modal-body">
                                <p class="text-muted">Loading service details...</p>
                            </div>
                        @endif

                        {{-- <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div> --}}
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>
