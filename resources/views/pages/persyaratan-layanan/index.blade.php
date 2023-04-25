@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h3 text-gray-800">Persyaratan: {{ $layanan->nama_layanan }}</h1>
        <a href="{{ route('layanan.syarat.create', $layanan->id) }}" class="btn btn-primary">Tambah</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Persyaratan</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    // Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('layanan.syarat.index', $layanan->id) }}",
            columns: [
                {data: 'persyaratan', name: 'persyaratan'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
    });
});

</script>
@endpush

@push('styles')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
