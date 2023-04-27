@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h3 text-gray-800">Data Layanan</h1>
        <a href="{{ route('layanan.create') }}" class="btn btn-primary">Tambah</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Layanan</th>
                            <th>Slug</th>
                            <th>Status</th>
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
            ajax: "{{ route('layanan.index') }}",
            columns: [
                {data: 'nama_layanan', name: 'nama_layanan'},
                {data: 'nama_layanan_slug', name: 'nama_layanan_slug'},
                {data: function(data) {
                    return data.status_layanan == 1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Non-Aktif</span>'
                }, name: 'status_layanan'},
                {data: function(data) {
                    return '<a href="/layanan/' + data.id  +'/syarat" class="btn btn-sm btn-info">Persyaratan</a>'
                }, name: 'persyaratan'},
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