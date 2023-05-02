@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h3 text-gray-800">Daftar Pengajuan: {{ $layanan->nama_layanan }}</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Nama Satpen</th>
                            <th>Tanggal Terbit</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Persyaratan</th>
                            <th>SK</th>
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
            ajax: "{{ route('daftar.pengajuan.index', $layanan->nama_layanan_slug) }}",
            columns: [
                {data: 'created_at', name: 'created_at'},
                {data: 'tendik.nip', name: 'tendik.nip'},
                {data: 'tendik.nama_tendik', name: 'tendik.nama_tendik'},
                {data: 'satpen.nama_satpen', name: 'satpen.nama_satpen'},
                {data: 'tanggal_terbit', name: 'tanggal_terbit'},
                {data: 'tanggal_selesai', name: 'tanggal_selesai'},
                {data: 'status', name: 'status'},
                {data: function(data) {
                    return '<a href="' + data.dokumen_persyaratan  +'" class="btn btn-sm btn-info">Link</a>'
                }, name: 'dokumen_persyaratan'},
                {data: function(data) {
                    if(data.dokumen_sk !== null) {
                        return '<a href="' + data.dokumen_sk  +'" class="btn btn-sm btn-info">Link</a>'
                    } else {
                        return '-'
                    }
                }, name: 'dokumen_sk'},
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
