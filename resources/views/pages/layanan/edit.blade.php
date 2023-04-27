@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Layanan</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Ubah Layanan
                </div>
                <div class="card-body">
                    <form action="{{ route('layanan.update', $model->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="nama_layanan">Nama Layanan</label>
                            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" required
                                value="{{ $model->nama_layanan }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_layanan_slug">Nama Layanan Slug</label>
                            <input type="text" class="form-control" id="nama_layanan_slug" name="nama_layanan_slug"
                                required value="{{ $model->nama_layanan_slug }}">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="status_layanan_1" name="status_layanan"
                                    class="custom-control-input" value="1" {{ $model->status_layanan == 1 ? 'checked' :
                                '' }}>
                                <label class="custom-control-label" for="status_layanan_1">Aktif</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="status_layanan_2" name="status_layanan"
                                    class="custom-control-input" value="0" {{ $model->status_layanan == 0 ? 'checked' :
                                '' }} >
                                <label class="custom-control-label" for="status_layanan_2">Non-Aktif</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection