@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tendik</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Tambah Tendik
                </div>
                <div class="card-body">
                    <form action="{{ route('tendik.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_tendik">Nama Tendik</label>
                            <input type="text" class="form-control" id="nama_tendik" name="nama_tendik" required>
                        </div>
                        <div class="form-group">
                            <label for="golongan_id">Pangkat/Golongan</label>
                            <select class="form-control" id="golongan_id" name="golongan_id" required>
                                <option value="">Pilih Golongan</option>
                                @foreach ($golongan as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satpen_id">Nama Sekolah</label>
                            <select class="form-control" id="satpen_id" name="satpen_id" required>
                                @foreach ($satpen as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Akhir</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="" class="form-control" required>
                                <option value="guru">Guru</option>
                                <option value="kepala sekolah">Kepala Sekolah</option>
                                <option value="tenaga kependidikan">Tenaga Kependidikan</option>
                                <option value="pengawas sekolah">Pengawas Sekolah</option>
                                <option value="penilik">Penilik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_detail">Nama PLT</label>
                            <input type="text" class="form-control" id="status_detail" name="status_detail">
                        </div>
                        <div class="form-group">
                            <label for="korwil">Korwil</label>
                            <input type="text" class="form-control" id="korwil" name="korwil" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No.HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pensiun</label>
                            <input type="date" class="form-control" id="tahun_pensiun" name="tahun_pensiun">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection