@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Golongan</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Ubah Golongan
                </div>
                <div class="card-body">
                    <form action="{{ route('golongan.update', $golongan->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="nama_golongan">Nama Golongan</label>
                            <input type="text" class="form-control" id="nama_golongan" name="nama_golongan" required
                                value="{{ $golongan->nama_golongan }}">
                        </div>
                        <div class="form-group">
                            <label for="status_golongan">Status Golongan</label>
                            <input type="text" class="form-control" id="status_golongan" name="status_golongan" required
                                value="{{ $golongan->status_golongan }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
