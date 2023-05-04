@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proses Pengajuan: {{ $layanan->nama_layanan }}</h1>
    </div>

    <div class="row">

        <div class="col-lg-12">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Proses {{ $layanan->nama_layanan }} - {{ $tendik->nip }} - {{
                    $tendik->nama_tendik }} - {{ $satpen->nama_satpen }}
                </div>
                <div class="card-body">
                    <form
                        action="{{ route('daftar.pengajuan.proses.store', [$layanan->nama_layanan_slug, $pengajuan->id]) }}"
                        method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="golongan_lama">Pangkat/Golongan Lama</label>
                                    <div class="input-group">
                                        <select class="form-control" id="golongan_lama" name="golongan_lama">
                                            @foreach ($golongan as $key => $value)
                                            <option value="{{ $value->id }}" {{ $value->id === $pengajuan->golongan_lama
                                                ? 'selected' : ''}}>{{
                                                $value->nama_golongan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="golongan_baru">Pangkat/Golongan Baru</label>
                                    <div class="input-group">
                                        <select class="form-control " id="golongan_baru" name="golongan_baru">
                                            @foreach ($golongan as $key => $value)
                                            <option value="{{ $value->id }}" {{ $value->id === $pengajuan->golongan_baru
                                                ? 'selected' : ''}}>{{ $value->nama_golongan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="3"
                                        class="form-control">{{ $pengajuan->keterangan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dokumen_sk">Link Dok. SK</label>
                                    <input type="text" class="form-control" id="dokumen_sk" name="dokumen_sk" required
                                        value="{{ $pengajuan->dokumen_sk }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Pengajuan</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="menunggu" {{ $pengajuan->status == 'menunggu' ? 'selected' : ''
                                            }}>Menunggu</option>
                                        <option value="proses" {{ $pengajuan->status == 'proses' ? 'selected' : ''
                                            }}>Proses</option>
                                        <option value="selesai" {{ $pengajuan->status == 'selesai' ? 'selected' : ''
                                            }}>Selesai</option>
                                        <option value="revisi" {{ $pengajuan->status == 'revisi' ? 'selected' : ''
                                            }}>Revisi</option>
                                        <option value="ditolak" {{ $pengajuan->status == 'ditolak' ? 'selected' : ''
                                            }}>Ditolak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Checklist Persyaratan Jika Ada</label>
                                    @foreach($syaratLayanan as $syarat)
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="syarat-{{ $syarat->id }}"
                                            name="persyaratan_id[]" value="{{ $syarat->id }}" {{ in_array($syarat->id,
                                        $pengajuan->syarat->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="syarat-{{ $syarat->id }}">{{
                                            $syarat->persyaratan
                                            }}</label>
                                    </div>
                                    @endforeach
                                </div>
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
