@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Persyaratan {{ $layanan->nama_layanan }}</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Ubah Syarat
                </div>
                <div class="card-body">
                    <form action="{{ route('layanan.syarat.update', [$layanan->id, $syarat->id]) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="persyaratan">Nama Persyaratan</label>
                            <input type="text" class="form-control" id="persyaratan" name="persyaratan" required
                                value="{{ $syarat->persyaratan }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
