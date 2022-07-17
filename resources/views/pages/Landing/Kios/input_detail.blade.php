<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.Landing.meta')

    <title>@yield('title') | Klinik Citra Sehat</title>

    @include('includes.Landing.style')
    <link rel="stylesheet" type="text/css" href="{{ url('https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css')}}">
    <style>
        body{
            background-color: aqua;
        }
    </style>
</head>
<body>
    
    <input type="hidden" name="id_poli" value={{ $id_poli}} />

    <div class="d-flex justify-content-center pt-4">
        <div class="row">
            <img src="{{ url('/assets/images/LogoKlinikCS.jpg')}}" alt="" height="150">
            <h4 class="pt-4 text-center">
                KLINIK CITRA SEHAT
            </h4>
        </div>
    </div>

    <div class="container pt-4">
        <div class="mb-3">
            <label for="example-email-input" class="form-label">NIKES</label>
            <input class="form-control" type="text" id="nikes" placeholder="Nikes Pasien">
        </div>
        <div class="row">
            <div class="col-md-3">
                <button type="button" id="1" value="1" onclick="addNumber('1')" class="btn btn-success waves-effect waves-light w-xl h-xl" style="height: 100px">
                    1
                 </button>
            </div>
            <div class="col-md-3">
                <button type="button" id="2" value="2" onclick="addNumber('2')" class="btn btn-success waves-effect waves-light w-xl" style="height: 100px">
                    2
                 </button>
            </div>
            <div class="col-md-3">
                <button type="button" id="3" value="3" onclick="addNumber('3')" class="btn btn-success waves-effect waves-light w-xl" style="height: 100px">
                    3
                 </button>
            </div>
            <div class="col-md-3">
                <button type="button" onclick="deleteNumber()" class="btn btn-danger waves-effect waves-light w-xl" style="height: 100px">
                    Delete
                 </button>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-3">
                <button type="button" id="4" value="4" onclick="addNumber('4')" class="btn btn-success waves-effect waves-light w-xl" style="height: 100px">
                    4
                 </button>
            </div>
            <div class="col-md-3">
                <button type="button" id="5" value="5" onclick="addNumber('5')" class="btn btn-success waves-effect waves-light w-xl" style="height: 100px">
                    5
                 </button>
            </div>
            <div class="col-md-3">
                <button type="button" id="6" value="6" onclick="addNumber('6')" class="btn btn-success waves-effect waves-light w-xl" style="height: 100px">
                    6
                 </button>
            </div>

        </div>

        <div class="row mt-4">
            <div class="col-md-3">
                <button type="button" id="7" value="7" onclick="addNumber('7')" class="btn btn-success waves-effect waves-light w-xl" style="height: 100px"> 
                    7
                 </button>
            </div>
            <div class="col-md-3">
                <button type="button" id="8" value="8" onclick="addNumber('8')" class="btn btn-success waves-effect waves-light w-xl" value="8" onclick="addNumber('8')" style="height: 100px">
                    8
                 </button>
            </div>
            <div class="col-md-3">
                <button type="button" id="9" value="9" onclick="addNumber('9')"  class="btn btn-success waves-effect waves-light w-xl" style="height: 100px">
                    9
                 </button>
            </div>
            <div class="col-md-3">
                <button type="button" id="enter" class="btn btn-info waves-effect waves-light w-xl" style="height: 100px">
                    Enter
                 </button>
            </div>

        </div>


        <div class="row mt-4">
            <div class="col-md-3">

            </div>
            <div class="col-md-3">
                <button type="button" id="0" onclick="addNumber('0')" value="0" class="btn btn-success waves-effect waves-light w-xl" style="height: 100px">
                    0
                 </button>
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <div class="mb-3">
            <button type="button" onclick="back()" class="btn btn-warning waves-effect waves-light w-sm">
                Kembali
             </button>
        </div>
       

    </div>
    @include('includes.Landing.script')

    <script>

            var i = 0;
            var nikes_number = [];

            // function add number to input text with param id input text
            function addNumber(id)
            {
                let numberInput = document.getElementById(id).value
                document.getElementById('nikes').value += numberInput
                nikes_number[i] = numberInput
                i = i+1;
            }

            // function delete number like backspace 
            function deleteNumber()
            {
                var field = document.getElementById('nikes')
                field.value = field.value.slice(0,-1)
                nikes_number.pop();
                
                console.log(nikes_number)
            }

            function back()
            {
                window.location.href = "/kios"
            }  

        $(document).ready(function() {

            var tujuan_poli = $('input[name=id_poli]').val()
 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#enter').on('click', function(){
                var nikes = $('#nikes').val();

                if(nikes == "")
                {
                    alert('Nikes tidak boleh kosong !')
                }


                $.ajax({
                    type: 'GET',
                    url: '{{ route("kios.getpasienkios") }}',
                    data: {nikes: nikes},
                    success: function(res)
                    {
                            var id = res.id
                            var nama = res.nama
                            var nikes = res.nikes
                            var no_telepon = res.no_telp
                            var jenis_kelamin = res.jenis_kelamin
                            var umur = res.umur
                            var keluhan = "Disampaikan di klinik"

                        if(res.nikes != null)
                        {
                            location.href = '/kios-konfirmasi/'+nikes+'/'+{{$id_poli}}
                        }else{
                            alert("Nikes tidak ada!")
                        }
                    }
                })


            })
        })

    </script>
</body>
</html>