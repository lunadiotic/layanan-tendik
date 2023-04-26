@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Satpen</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Ubah Satpen
                </div>
                <div class="card-body">
                    <form action="{{ route('satpen.update', $satpen->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="nama_satpen">Nama Satpen</label>
                            <input type="text" class="form-control" id="nama_satpen" name="nama_satpen"
                                value="{{ $satpen->nama_satpen }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jenjang">Jenjang</label>
                            <input type="text" class="form-control" id="jenjang" name="jenjang"
                                value="{{ $satpen->jenjang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                value="{{ $satpen->kecamatan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"
                                required>{{ $satpen->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="detail_satpen">Detail</label>
                            <textarea name="detail_satpen" id="detail_satpen" cols="30" rows="3" class="form-control"
                                required>{{ $satpen->detail_satpen }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="status_satpen_1" name="status_satpen"
                                    class="custom-control-input" value="1" {{ $satpen->status_satpen == 1 ? 'checked' :
                                '' }}>
                                <label class="custom-control-label" for="status_satpen_1">Aktif</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="status_satpen_2" name="status_satpen"
                                    class="custom-control-input" value="0" {{ $satpen->status_satpen == 0 ? 'checked' :
                                '' }}>
                                <label class="custom-control-label" for="status_satpen_2">Non-Aktif</label>
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
