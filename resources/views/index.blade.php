@extends('layouts.Landing.landing')

@section('title', 'Landing Page')


@section('content')


<div class="col-xxl-12 col-lg-12 col-md-12">

<div class="row pt-md-5 p-4 d-flex justify-content-center">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Antrian yang sedang berjalan!</h4>
            <div class="alert alert-warning alert-label-icon label-arrow fade show" role="alert">
                <i class="mdi mdi-alert-outline align-middle me-3 label-icon"></i><strong>Notification</strong> - Mohon untuk melihat antrian poli yang sedang berjalan sebelum memesan no antrian!
            </div>
        </div>

        <div class="card-body">
            <div class="row ">
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
        </div>
    </div>

    </div>
</div>


    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Informasi Klinik</h4>
            <div class="alert alert-warning alert-label-icon label-arrow fade show" role="alert">
                <i class="mdi mdi-alert-outline align-middle me-3 label-icon"></i><strong>Notification</strong> - Informasi dan update terbaru tentang Klinik Citra Sehat! 
            </div>
        </div>

        <div class="card-body">
            <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" role="listbox">

        @foreach($kegiatan as $kegiatans)
            <div class="carousel-item active">
                <img src="{{ url('storage/'. $kegiatans->gambar_kegiatan) }}" alt="..." class="d-block img-fluid mx-auto">
                <div class="carousel-caption d-none d-md-block text-white-50">
                    <h5 class="text-white">{{ $kegiatans->nama_kegiatan }}</h5>
                    <p>{{$kegiatans->deskripsi_kegiatan}}.</p>
                </div>
            </div>
        @endforeach



    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
        </div>
    </div>



@endsection