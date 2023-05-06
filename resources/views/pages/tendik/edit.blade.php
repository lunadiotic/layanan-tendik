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
                    Ubah Tendik
                </div>
                <div class="card-body">
                    <form action="{{ route('tendik.update', $tendik->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" required
                                value="{{ $tendik->nip }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_tendik">Nama Tendik</label>
                            <input type="text" class="form-control" id="nama_tendik" name="nama_tendik" required
                                value="{{ $tendik->nama_tendik }}">
                        </div>
                        <div class="form-group">
                            <label for="golongan_id">Pangkat/Golongan</label>
                            <select class="form-control" id="golongan_id" name="golongan_id" required>
                                <option value="">Pilih Golongan</option>
                                @foreach ($golongan as $key => $value)
                                <option value="{{ $key }}" {{ $tendik->golongan_id == $key ? 'selected' : ''}} >{{
                                    $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satpen_id">Satpen</label>
                            <select class="form-control" id="satpen_id" name="satpen_id" required>
                                @foreach ($satpen as $key => $value)
                                <option value="{{ $key }}" {{ $tendik->satpen_id == $key ? 'selected' : ''}}>{{ $value
                                    }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Akhir</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" required
                                value="{{ $tendik->pendidikan }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="" class="form-control" required>
                                <option value="guru" {{ $tendik->status == 'guru' ? 'selected' : ''}}>Guru</option>
                                <option value="kepala sekolah" {{ $tendik->status == 'kepala sekolah' ? 'selected' :
                                    ''}}>Kepala Sekolah</option>
                                <option value="tenaga kependidikan" {{ $tendik->status == 'tenaga kependidikan' ?
                                    'selected' : ''}}>Tenaga Kependidikan</option>
                                <option value="pengawas sekolah" {{ $tendik->status == 'pengawas sekolah' ? 'selected' :
                                    ''}}>Pengawas Sekolah</option>
                                <option value="penilik" {{ $tendik->status == 'penilik' ? 'selected' : ''}}>Penilik
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_detail">Nama PLT</label>
                            <input type="text" class="form-control" id="status_detail" name="status_detail" required
                                value="{{ $tendik->status_detail }}">
                        </div>
                        <div class="form-group">
                            <label for="korwil">Korwil</label>
                            <input type="text" class="form-control" id="korwil" name="korwil" required
                                value="{{ $tendik->korwil }}">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No.HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required
                                value="{{ $tendik->no_hp }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pensiun</label>
                            <input type="date" class="form-control" id="tahun_pensiun" name="tahun_pensiun" required
                                value="{{ $tendik->tahun_pensiun }}">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required
                                value="{{ $tendik->keterangan }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection