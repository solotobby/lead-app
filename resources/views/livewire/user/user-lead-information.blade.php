<div>
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">{{ $lead->service->name }}</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">


                    <div class="card-body">
                        <div class="row">
                            <h4 class="card-title mb-4">Contact Information</h4>
                            <div class="col-lg-12">
                                <div class="alert alert-info" role="alert">

                                    Full Name: <strong>{{ $lead->user->name ?? 'a service' }}</strong> <br>
                                    Email: <strong>{{ $lead->user->email ?? 'a service' }}</strong><br>
                                    Phone: <strong>{{ $lead->user->phone ?? 'a service' }}</strong> <br>
                                    Credit Value: <strong>{{ $lead->credit ?? 'a service' }}</strong> <br>



                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Project Information</h4>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="alert alert-info" role="alert">

                                <strong>Full Name: {{ $lead->user->name ?? 'a service' }}</strong> <br>
                                <strong>Email: {{ $lead->user->email ?? 'a service' }}</strong><br>
                                <strong>Phone: {{ $lead->user->phone ?? 'a service' }}</strong> <br>

                                <br>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>






</div>

</div>
