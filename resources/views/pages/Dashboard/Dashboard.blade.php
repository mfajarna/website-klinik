@extends('layouts.Dashboard.dashboard')


@section('title', 'Dashboard')

@section('content')


    @if(Auth::user()->role == "superadmin" || Auth::user()->role == "admin")
        <div class="row">

        
    @foreach ($count_antrian as $item)
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        {{-- <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">

                <div class="row">
                    <div class="col-xl-6">
                        <div class="d-flex align-items-center">


                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h4 class="text-muted mb-3 lh-1 d-block text-truncate">Jumlah Pasien {{ $item->nama_poli }}</h4>
                                    <h4 class="mb-3">
                                        <span class="" data-target="{{ $item->total_pasien }}">{{ $item->total_pasien}}</span>
                                    </h4>
                                    <div class="text-nowrap">
                                        <div class="row">
                                            <div class="col-xl-3 mr-4">
                                                <span class="ms-1 text-muted font-size-13">Status Poli </span>
                                                    <span class="badge bg-soft-success text-success" id="status_poli">Active</span>      
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div> 
                </div>



            </div><!-- end card body -->
        </div><!-- end card --> --}}
    </div>
    @endforeach
            
        </div>

    @endif


    @if(Auth::user()->role == "dokter")
    <div class="row">

        <audio src="" hidden></audio>

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
                                            <h4 class="text-muted mb-3 lh-1 d-block text-truncate">{{ $antrians->nama_poli }}</h4>
                                            <h4 class="mb-3">
                                                <p class="h1">{{ $antrians->no_antrian }}</p>
                                            </h4>
                                            <div class="text-nowrap">
                                                <div class="row">
                                                    <div class="col-xl-3 mr-4">
                                                        <span class="ms-1 text-muted font-size-13">Jumlah Antrian Menunggu </span>
                                                            <span class="badge bg-soft-success text-success" id="status_poli">{{ $antrians->jumlah_antrian }}</span>      
                                                    </div>
                                                </div>
        
                                                <div class="row">
                                                    <div class="col-xl-3 mr-4">
                                                        <span class="ms-1 text-muted font-size-13">Status Antrian </span>
                                                        <span class="badge bg-soft-success text-success" id="status_poli">Active</span>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="d-flex align-items-center">
                                    <button type="button" id="btn_next_antrian" value="{{ $antrians->id }}" onclick="onNext(this)" class="btn btn-success waves-effect btn-label waves-light"><i class="bx bx-skip-next label-icon"></i>Next Antrian</button>
                                </div>

                                
                            </div>  
                        </div>



                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
        @endforeach
    </div>


    <div class="mb-3">
        <h5 class="card-title">Daftar Pasien Antrian <span class="text-muted fw-normal ms-2">({{ $countAntrianPasien}})</span></h5>        
        <div class="row">

            @foreach($fetchAntrianPasien as $item)
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-lg">
                                <div class="avatar-title bg-soft-primary text-primary display-4 m-0 rounded-circle">
                                    <i class="bx bxs-user-circle"></i>
                                </div>
                            </div>
                            <div class="flex-1 ms-3">
                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">{{ $item['pasien']['nama'] }}</a></h5>
                            <p class="text-muted mb-0">Pasien</p>
                            </div>
                        </div>
                        <div class="mt-3 pt-1">
                            <p class="text-muted mb-0"><i class="mdi mdi-format-list-numbered font-size-15 align-middle pe-2 text-primary"></i>
                                No Antrian: {{ $item['no_antrian'] }}</p>
                            <p class="text-muted mb-0 mt-2"><i class="mdi mdi-list-status font-size-15 align-middle pe-2 text-primary"></i>
                                Status: <span class="badge rounded-pill badge-soft-warning">{{ $item['status']}}</span></p>
                            <p class="text-muted mb-0 mt-2"><i class="mdi mdi-account-clock font-size-15 align-middle pe-2 text-primary"></i>
                                Pengajuan Antrian: {{ $item['created_at'] }}</p>
                        </div>
                    </div>

                    <div class="btn-group" role="group">
                        <a href="{{ route('menu.dokter.changepemeriksaan', ['id' => $item['id']]) }}" class="btn btn-outline-danger text-truncate"><i class="uil uil-envelope-alt me-1"></i>Tidak Hadir</a>
                        <a href="{{ route('menu.dokter.pemeriksaanpasien', ['id' => $item['id_pasien'], 'idantrian' => $item['id']]) }}" class="btn btn-outline-primary text-truncate"><i class="uil uil-envelope-alt me-1"></i>Mulai Periksa</a>
                    </div>
                </div>
                <!-- end card -->
            </div> 

            @endforeach


        </div>
    </div>


    @endif

@endsection


@push('after-script')

    <script>
        function onNext(objButton)
        {
            var id = objButton.value;

            $.ajax({
                method: 'get',
                url: '{{ route("menu.antrian.next") }}',
                data: {id:id},
                success: function(res)
                {
                    
                    var nama_poli = res[0];
                    var nextAntrian = res[1];

                    onNotification(nama_poli, nextAntrian)
                }    
            })
        }


        async function onNotification(nama_poli, next_antrian)
        {
            
            var API_KEY = "AIzaSyAsSMBUXQEKQA7LWXRx2MTQkMz84IP2VIQ";
            var url = "https://texttospeech.googleapis.com/v1beta1/text:synthesize?key=" + API_KEY;


            var text = "Antrian nomor " + next_antrian +" pada " + nama_poli + " harap segera memasuki ruangan periksa"
            text = text.trim();
             $.ajax({
                    method: "POST",
                    url: url,
                    contentType: "application/json",
                    data: JSON.stringify({
                        input:{
                            ssml : text
                        },
                        voice:{
                            "languageCode": "id-ID",
                            "name": "id-ID-Wavenet-D"
                        },
                        "audioConfig": {
                            "audioEncoding": "LINEAR16",
                            "pitch": 0,
                            "speakingRate": 0.8
                        },
                    }),
                    dataType: "json"
                }).then(function (data){
                    
                 $('audio').attr('src', "data:audio/mpeg;base64," + data.audioContent).get(0).play()

               
                })

        }
    </script>
    
@endpush