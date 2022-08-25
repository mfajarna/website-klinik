@extends('layouts.Auth.index')

@section('title', 'Login')


@section('content')

<div class="col-xxl-3 col-lg-4 col-md-5">
    <div class="auth-full-page-content d-flex p-sm-5 p-4">
        <div class="w-100">
            <div class="d-flex flex-column h-100">
                <div class="mb-4 mb-md-5 text-center">
                    <a href="{{ url('/') }}" class="d-block auth-logo">
                        <img src="{{ url('/public/assets/images/LogoKlinikCS.jpg')}}" alt="" height="28"> <span class="logo-txt">Klinik Citra Sehat</span>
                    </a>
                </div>
                <div class="auth-content my-auto">
                    <div class="text-center">
                        <h5 class="mb-0">Selamat Datang Kembali !</h5>
                        <p class="text-muted mt-2">Login untuk menggunakan website Klinik Citra Sehat.</p>
                    </div>


                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Error</strong> - {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    @endforeach

                @endif

                

                @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                                {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                @endif


                    <form class="mt-4 pt-2" method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="form-floating form-floating-custom mb-4">
                            <input type="text" class="form-control" id="input-username" name="auth" :value="old('auth')" required autofocus placeholder="Masukan Email/Username Anda...">
                            <label for="input-username">Email/Username</label>
                            <div class="form-floating-icon">
                               <i data-feather="users"></i>
                            </div>
                        </div>

                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                            <input type="password" class="form-control pe-5" type="password" name="password" required autocomplete="current-password" id="password-input" placeholder="Masukan Password Anda...">
                            
                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                            </button>
                            <label for="input-password">Password</label>
                            <div class="form-floating-icon">
                                <i data-feather="lock"></i>
                            </div>
                            
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-check font-size-15">
                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                    <label class="form-check-label font-size-13" for="remember-check">
                                        Ingatkan saya
                                    </label>
                                </div>  
                            </div>
                            
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </form>


                    <div class="mt-5 text-center">
                        {{-- <p class="text-muted mb-0">Belum punya akun ? <a href="{{ url('/auth-register')}}"
                                class="text-primary fw-semibold"> Daftar sekarang </a> </p> --}}
                    </div>
                </div>
                <div class="mt-4 mt-md-5 text-center">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Klinik Citra Sehat   . Crafted with <i class="mdi mdi-heart text-danger"></i></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end auth full page content -->
</div>


<div class="col-xxl-9 col-lg-8 col-md-7">
    <div class="auth-bg pt-md-5 p-4 d-flex">
        <div class="bg-overlay"></div>
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