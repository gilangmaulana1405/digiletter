@extends('admin.template');

@section('pageTitle')
Admin Profile
@endsection

@section('mainContentAdmin')
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
        <div class="card mb-4">
            <h5 class="card-header">Upload TTD Pimpinan</h5>
            <div class="card-body">
                <form method="post" action="{{ route('change.ttdpimpinan') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="penanda_tangan">Penanda Tangan</label>
                            <div class="input-group input-group-merge">
                                <textarea name="penanda_tangan" id="" class="form-control" placeholder="Masukkan penanda tangan" rows="4">{{ old('penanda_tangan') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="ttd_image">TTD Image</label>
                            <div class="input-group input-group-merge">
                                <input type="file" class="form-control" name="ttd_image" id="inputGroupFile02" onchange="previewFile()">
                            </div>
                            <div id="preview-container" style="display: none; margin-top: 20px;">
                                <img id="preview-image" alt="Preview Image" style="max-width: 100%; max-height: 200px;">
                                <button id="remove-btn" onclick="removeFile()" style="display: none; margin-top: 10px;">Remove File</button>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="nama_pimpinan">Nama Pimpinan</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="nama_pimpinan" class="form-control" name="nama_pimpinan" placeholder="Masukkan nama pimpinan" value="{{ old('nama_pimpinan') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="nomor_induk">Nomor Induk</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="nomor_induk" class="form-control" name="nomor_induk" value="{{ old('nomor_induk')}}" placeholder="Cth: NIDN/NIP. 1990xxxxxxxx" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="prodi_pimpinan">Pimpinan</label>
                            <div class="input-group input-group-merge">
                                <select name="prodi_pimpinan" id="select2IconsProdi" class="select2-icons form-select">
                                    <option value="Informatika" {{ old('prodi_pimpinan') == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                                    <option value="Sistem Informasi" {{ old('prodi_pimpinan') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                    <option value="Wadek" {{ old('prodi_pimpinan') == 'Wadek' ? 'selected' : '' }}>Wadek</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update TTD</button>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    function previewFile() {
        var fileInput = document.getElementById('inputGroupFile02');
        var previewContainer = document.getElementById('preview-container');
        var previewImage = document.getElementById('preview-image');
        var removeBtn = document.getElementById('remove-btn');

        var file = fileInput.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
                removeBtn.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    }

    function removeFile() {
        var fileInput = document.getElementById('inputGroupFile02');
        var previewContainer = document.getElementById('preview-container');
        var removeBtn = document.getElementById('remove-btn');

        fileInput.value = ''; // Clear the file input
        previewContainer.style.display = 'none';
        removeBtn.style.display = 'none';
    }

</script>

@endsection
