@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pengajuan: {{ $layanan->nama_layanan }}</h1>
    </div>

    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Tambah {{ $layanan->nama_layanan }}
                </div>
                <div class="card-body">
                    <form action="{{ route('pengajuan.store', $layanan->nama_layanan_slug) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="satpen_id">Satpen</label>
                            <div class="input-group">
                                <select class="form-control" id="satpen_id" name="satpen_id">
                                    <option value=""> - </option>
                                </select>
                                <span class="btn btn-danger" id="clear-satpen">x</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dokumen_persyaratan">Link Dok. Persyaratan</label>
                            <input type="text" class="form-control" id="dokumen_persyaratan" name="dokumen_persyaratan"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#satpen_id').select2({
            theme: 'bootstrap4',
            minimumInputLength: 3,
            ajax: {
                url: "{{ route('api.select2.satpen') }}",
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.nama_satpen,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#clear-satpen').click(function() {
            $("#satpen_id").val(null).trigger("change");
        });
    });
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="/vendor/select2/select2.min.css">
<link rel="stylesheet" href="/vendor/select2/select2-bootstrap4.min.css">
@endpush