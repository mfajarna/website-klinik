@foreach ($antrian as $antrians )
<div class="col-xl-3 col-md-6">
    <!-- card -->
    <div class="card card-h-100">
        <!-- card body -->
        <div class="card-body" id="content_antrian">

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


                @if ($antrians->status == "active")
                    <div class="col-xl-6">
                        <div class="d-flex align-items-center">
                            <button type="button" id="btn_next_antrian" value="{{ $antrians->id }}" onclick="onNext(this)" class="btn btn-success waves-effect btn-label waves-light"><i class="bx bx-skip-next label-icon"></i>Next Antrian</button>
                        </div>
                    </div>  
                @endif


            </div>



        </div><!-- end card body -->
    </div><!-- end card -->
</div>
@endforeach