<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @include('includes.Landing.meta')

        <title>Nomor Antrian | Klinik Citra Sehat</title>

        @include('includes.Landing.style')


    </head>


    <body data-layout="horizontal" data-topbar="dark" class="pace-done ">
        <div class="layout-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Antrian yang sedang berjalan!</h4>
                        <div class="alert alert-warning alert-label-icon label-arrow fade show" role="alert">
                            <i class="mdi mdi-alert-outline align-middle me-3 label-icon"></i><strong>Notification</strong> - Mohon untuk melihat antrian poli yang sedang berjalan sebelum memesan no antrian!
                        </div>
                    </div>


                    <div class="card-body" id="antrian">
                        <div class="row">
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
                                                            <h4 class="text-muted mb-3 lh-1 d-block text-truncate">{{ $antrians->nama_poli }}</h4>
                                                            <h4 class="mb-3">
                                                                <p class="h1">{{ $antrians->no_antrian }}</p>
                                                            </h4>
                                                            <div class="text-nowrap">
                                                                <div class="row">
                                                                    <div class="col-xl-3 mr-4">
                                                                        <span class="ms-1 text-muted font-size-13">Jumlah Antrian Menunggu</span>
                                            
                                                                        <span class="badge bg-soft-success text-success" id="status_poli">{{ $antrians->jumlah_antrian }}</span>  
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
                    </div>
                </div>
            </div>

        </div>

    </body>


    @include('includes.Landing.script')

  
        <script>
           
            console.log('hello')
            $(document).ready(function(){
                var timer;

                // function refreshDiv()
                //     {
                //         timer = setInterval(() => {
                //             $('#antrian').load('/display-antrian')
                //         }, 10000); 
                //     }

                // refreshDiv();

                
            })

 
        </script>
   


</html>