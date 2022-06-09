@extends('layouts.Landing.landing')

@section('title', 'Landing Page')



@section('content')



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