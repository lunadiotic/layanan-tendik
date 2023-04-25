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
                    Tambah Persyaratan
                </div>
                <div class="card-body">
                    <form action="{{ route('layanan.syarat.store', $layanan->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="persyaratan">Persyaratan</label>
                            <input type="text" class="form-control" id="persyaratan" name="persyaratan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
