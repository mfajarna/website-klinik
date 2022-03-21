@extends('layouts.Dashboard.dashboard')


@section('title', 'Manajemen Dokter')

@push('after-style')

        <!-- DataTables -->
        <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')



@endsection


@push('after-script')
    <script>
        function autoLoad()
        {
            var url = '{{ route("menu.dokter.pemeriksaan.download-pdf", ['data' => $param]) }}';

            window.open(url);window.location.href = '/menu/dashboard'
        }


        autoLoad();
    </script>
@endpush