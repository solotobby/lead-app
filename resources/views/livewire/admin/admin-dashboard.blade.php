 <!-- Start Content-->
<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Services List</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Services</li>
                                </ol>
                            </div>
                        </div>

  
     {{-- <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Numbered With Custom</h5>
                                    </div><!-- end card header -->
        
                                    <div class="card-body">
                                        <ol class="list-group list-group-numbered">
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Subheading</div>
                                                    Paypal Payment Company
                                                </div>
                                                <span class="badge text-bg-primary rounded-pill">14</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Subheading</div>
                                                    Artificial intelligence Company
                                                </div>
                                                <span class="badge text-bg-primary rounded-pill">14</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Subheading</div>
                                                    Open AI ChatGPT
                                                </div>
                                                <span class="badge text-bg-primary rounded-pill">14</span>
                                            </li>
                                        </ol>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col --> --}}


                            <div class="row">
    <!-- Left Side -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Companies</h5>
            </div>
            <div class="card-body">
                <ol class="list-group list-group-numbered">
                    @foreach($companies as $company)
                    <li wire:click="selectCompany({{ $company['id'] }})"
                        class="list-group-item d-flex justify-content-between align-items-start {{ $selectedCompany && $selectedCompany['id'] === $company['id'] ? 'active' : '' }}"
                        style="cursor: pointer;">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $company['name'] }}</div>
                            {{ $company['desc'] }}
                        </div>
                        {{-- <span class="badge text-bg-primary rounded-pill">{{ $company['id'] }}</span> --}}
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>

    <!-- Right Side -->
    <div class="col-xl-8">
        @if($selectedCompany)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $selectedCompany['name'] }}</h5>
                </div>
                <div class="card-body">
                    {{-- <p>{{ $selectedCompany['desc'] }}</p>
                    <p>More details can go here...</p> --}}

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form wire:submit="createQuestion">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Enter Question</label>
                            <input type="text" wire:model="question" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Question" required>
                            <small id="emailHelp" class="form-text text-muted">These question will be shown to buyer</small>
                        </div>

                        <input type="hidden" wire:model="selectedCompanyId" />
                        <hr>
                        Add Options: 

                                                
                        @foreach ($options as $index => $opt)
                            <div class="mb-2 d-flex">
                                <input type="text" class="form-control me-2" wire:model="options.{{ $index }}" placeholder="Enter option {{ $index + 1 }}" required>
                                @if (count($options) > 1)
                                    <button type="button" wire:click="removeOption({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                                @endif
                            </div>
                        @endforeach

                        <button type="button" wire:click="addOption" class="btn btn-secondary btn-sm mt-2">Add More</button>

                        <br><br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   
                    @if($serviceQuestions->count() > 0)
                     <hr>
                    <div class="card-header">
                        <h5 class="card-title mb-0">List of Questions</h5>
                    </div><!-- end card header -->
               
                    
                             <div class="accordion" id="accordionPanelsStayOpenExample">
                                    @foreach($serviceQuestions as $question)

                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne-{{$question->id}}" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                                    <b>{{ $question->question }}</b>
                                                </button>
                                                  
                                              
                                            </h2>
                                        
                                            <div id="panelsStayOpen-collapseOne-{{$question->id}}" class="accordion-collapse collapse">
                                                <div class="accordion-body">
                                                    List of Options

                                                    <ul class="list-group">
                                                        
                                                        @foreach($question->options as $option)
                                                        <li class="list-group-item">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="checkmeout0-{{$option->id}}" checked>
                                                                <label class="form-check-label" for="checkmeout0-{{$option->id}}" >{{ $option->option }}</label>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    {{-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. --}}
                                                </div>
                                            </div>
                                        </div>
                                            
                                    @endforeach
                            </div>

                    
                        
                    @else

                    @endif


                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    <p class="text-muted">Click a company to see details</p>
                </div>
            </div>
        @endif
    </div>
</div>



</div>
