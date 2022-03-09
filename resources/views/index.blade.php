@extends('layouts.Landing.landing')

@section('title', 'Landing Page')


@section('content')

<div class="col-xxl-3 col-lg-4 col-md-5">
    <div class="auth-full-page-content d-flex p-sm-5 p-4">
        <div class="w-100">
            <div class="d-flex flex-column h-100">
                <div class="mb-4 mb-md-5 text-center">
                    <a href="index.html" class="d-block auth-logo">
                        <img src="{{ asset('/assets/images/LogoKlinikCS.jpg')}}" alt="" height="28"> <span class="logo-txt">Website Klinik</span>
                    </a>
                </div>
                <div class="auth-content my-auto">
                    <div class="text-center">
                        <div class="avatar-xl mx-auto">
                            <div class="avatar-title bg-light text-primary h1 rounded-circle">
                                <i class="bx bxs-user"></i>
                            </div>
                        </div>

                        <div class="mt-4 pt-2">
                            <h5>Login untuk menggunakan website klinik</h5>
                            
                            <div class="mt-4">
                                <a href="{{ route('auth-login.index') }}" class="btn btn-primary w-100 waves-effect waves-light">Login</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="mt-5 text-center">
                        <p class="text-muted mb-0">Belum punya akun? <a href="{{ url('/auth-register')}}"
                                class="text-primary fw-semibold">Register</a> </p>
                    </div>
                </div>
                <div class="mt-4 mt-md-5 text-center">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Website Klinik   . Crafted with <i class="mdi mdi-heart text-danger"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xxl-9 col-lg-8 col-md-7">


    <div class="row pt-md-5 p-4">
        @foreach ($antrian as $antrians )
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="d-flex align-items-center">


                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="text-muted mb-3 lh-1 d-block text-truncate">{{ $antrians->poli->nama_poli }}</h4>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="{{ $antrians->no_antrian }}">{{ $antrians->no_antrian }}</span>
                                        </h4>
                                        <div class="text-nowrap">
                                            <div class="row">
                                                <div class="col-xl-3 mr-4">
                                                    <span class="ms-1 text-muted font-size-13">Status Poli </span>
    
                                                    @if ($antrians->poli->is_active == 1)
                                                        <span class="badge bg-soft-success text-success" id="status_poli">Active</span> 
                                                    @else
                                                    <span class="badge bg-soft-danger text-danger" id="status_poli">Non-Active</span> 
                                                    @endif
                                                    
                                                     
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <div class="col-xl-3 mr-4">
                                                    <span class="ms-1 text-muted font-size-13">Status Antrian </span>
                                                    
                                                    @if ($antrians->status === "active")
                                                    <span class="badge bg-soft-success text-success" id="status_poli">Active</span> 
                                                    @else
                                                    <span class="badge bg-soft-danger text-danger" id="status_poli">Non-Active</span> 
                                                    @endif
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
    
                
                                
                            </div>
                        </div>


                    </div>



                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
        @endforeach
    </div>
    <div class="pt-md-5 p-4 d-flex">



        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <!-- end bubble effect -->
        <div class="row justify-content-center align-items-end">
            <div class="col-xl-7">
                <div class="p-0 p-sm-4 px-xl-0">
                    <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">

                        </div>

                        </div>
                        <!-- end carousel-inner -->
                    </div>
                    <!-- end review carousel -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection