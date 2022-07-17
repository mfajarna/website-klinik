<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.Landing.meta')

    <title>@yield('title') | Klinik Citra Sehat</title>

    @include('includes.Landing.style')
    <style>
        body{
            background-color: aqua;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center pt-4">
        <div class="row">
            <img src="{{ url('/assets/images/LogoKlinikCS.jpg')}}" alt="" height="150">
            <h4 class="pt-4 text-center">
                KLINIK CITRA SEHAT
            </h4>
        </div>
    </div>

    <div class="container pt-4">
        <div class="row">
            @foreach ($antrian_poli as $antrians )
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
                                            <div class="text-nowrap">
                                                <div class="row">
                                                    <div class="col-xl-3 mr-4">
                                                        
                                                         
                                                    </div>
                                                </div>
        
                                                <div class="row">
                                                    <div class="col-xl-3 mr-4">

                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
        
                    
                                    
                                </div>
                            </div>
                        </div>

                        @if ($antrians->status == "active")
                            <div class="col-xl-6">
                                <div class="d-flex align-items-center">
                                    <button type="button" id="btn_next_antrian" value="{{ $antrians->id }}" onclick="onNext(this)" class="btn btn-success waves-effect btn-label waves-light"><i class="bx bx-skip-next label-icon"></i>Pilih Poli</button>
                                </div>
                            </div>  
                        @endif
        
        
        
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
            @endforeach
        </div>

    </div>

    <script src="{{ url('https://code.jquery.com/ui/1.13.0/jquery-ui.min.js')}}" type="text/javascript"></script>

    <script>
   
            function onNext(objButton)
            {
                var id = objButton.value;

                return window.location.href ="/view-detail/"+id
            }
     

    </script>


    
</body>
</html>