<div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="{{url('dashboard')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="24">
                                </span>
                            </a>
                            <a href="{{url('dashboard')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="24">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{url('dashboard')}}">
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                           @if(auth()->user()->mode == 'Buyer')

                            <li>
                                <a href="{{url('leads')}}">
                                    <i data-feather="aperture"></i>
                                     <span class="badge bg-success rounded-pill float-end">9+</span>
                                    <span> Leads </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('settings') }}">
                                    <i data-feather="globe"></i>
                                     {{-- <span class="badge bg-success rounded-pill float-end">9</span> --}}
                                    <span> Settings </span>
                                </a>
                            </li>
                            @else
                                <li>
                                    <a href="{{url('dd')}}">
                                        <i data-feather="aperture"></i>
                                        {{-- <span class="badge bg-success rounded-pill float-end">9+</span> --}}
                                        <span> Create New Request</span>
                                    </a>
                                </li>
                            @endif
                            
                        </ul>
</div>


