@extends('layouts.Dashboard.dashboard')


@section('title', 'Dashboard')

@section('content')


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
                                            <h4 class="text-muted mb-3 lh-1 d-block text-truncate">{{ $antrians->poli->nama_poli }}</h4>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="{{ $antrians->no_antrian }}">{{ $antrians->no_antrian }}</span>
                                            </h4>
                                            <div class="text-nowrap">
                                                <div class="row">
                                                    <div class="col-xl-3 mr-4">
                                                        <span class="ms-1 text-muted font-size-13">Status Poli </span>
                                                            <span class="badge bg-soft-success text-success" id="status_poli">Active</span>      
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