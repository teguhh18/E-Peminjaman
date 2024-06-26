@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Edit Ruangan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="respon">

            </div>
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-12 card-tools text-right">
                            <a href="{{ route('admin.ruangan.index') }}" class="btn btn-xs btn-warning btn-add">
                                <i class="fa fa-arrow-left"></i> kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <form action="{{ route('admin.ruangan.update', $ruangan->id) }}" method="POST" class="form-horizontal"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        {{-- <div class="form-group"> --}}
                        <div class="row">
                            <div class="col-md-6 @error('kode_ruangan') has-error @enderror">
                                <label for="kode_ruangan" class="control-label">Kode Ruangan</label>
                                <input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan"
                                    placeholder="Kode Ruangan" value="{{ old('kode_ruangan', $ruangan->kode_ruangan) }}" readonly>
                                @error('kode_ruangan')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                                {{-- <small class="text-muted form-help-text">Example block-level help text here.</small> --}}
                            </div>
                            <div class="col-md-6  @error('nama_ruangan') has-error @enderror">
                                <label for="nama_ruangan" class=" control-label">Nama Ruangan</label>
                                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan"
                                    placeholder="Nama Ruangan" value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                                    required>
                                @error('nama_ruangan')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6  @error('lantai') has-error @enderror">
                                <label for="lantai" class="control-label">Lantai</label>
                                <input type="number" class="form-control" id="lantai" name="lantai"
                                    placeholder="lantai" required value="{{ old('lantai', $ruangan->lantai) }}">
                                @error('lantai')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6  @error('tipe') has-error @enderror">
                                <label for="tipe" class="control-label">Tipe</label>
                                <input type="text" class="form-control" id="tipe" name="tipe"
                                    placeholder="Lokasi" value="{{ old('tipe', $ruangan->tipe) }}">
                                @error('tipe')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-md-6  @error('kapasitas') has-error @enderror">
                                <label for="kapasitas" class=" control-label">Kapasitas</label>
                                <input type="text" class="form-control" id="kapasitas" name="kapasitas"
                                    placeholder="Kapasitas" value="{{ old('kapasitas', $ruangan->kapasitas) }}">
                            </div>
                            <div class="col-md-6  @error('luas') has-error @enderror">
                                <label for="luas" class=" control-label">Luas</label>
                                <input type="text" class="form-control" id="luas" name="luas" placeholder="Luas "
                                    value="{{ old('luas', $ruangan->luas) }}">
                                @error('luas')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6  @error('kondisi') has-error @enderror">
                                {{-- {{ dd(old($ruangan->kodisi)) }} --}}
                                <label for="kondisi" class=" control-label">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-control">
                                    <option value="">-Kondisi Ruangan-</option>
                                    <option {{ old('kondisi', $ruangan->kondisi) == 'Baik' ? 'selected' : '' }}>Baik
                                    </option>
                                    <option {{ old('kondisi', $ruangan->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>
                                        Rusak
                                        Berat</option>
                                    <option {{ old('kondisi', $ruangan->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>
                                        Rusak Ringan</option>
                                </select>
                                @error('kondisi')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6  @error('gedung_id') has-error @enderror">
                                <label for="gedung_id" class=" control-label">Gedung</label>
                                <select name="gedung_id" id="gedung_id" class="form-control">
                                    <option value="">-Pilih Gedung-</option>
                                    @foreach ($gedungs as $gedung)
                                        <option value="{{ $gedung->id }}"
                                            {{ old('kondisi', $ruangan->gedung_id) == $gedung->id ? 'selected' : '' }}>
                                            {{ $gedung->nama }}</option>
                                    @endforeach
                                </select>
                                @error('gedung_id')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6  @error('unit_kerja_id') has-error @enderror">
                                <label for="unit_kerja_id" class=" control-label">Unit Kerja</label>
                                <select name="unit_kerja_id" id="unit_kerja_id" class="form-control">
                                    <option value="">-Pilih Unit Kerja-</option>
                                    @foreach ($unitkerjas as $uk)
                                        <option value="{{ $uk->id }}"
                                            {{ old('kondisi', $ruangan->unit_kerja_id) == $uk->id ? 'selected' : '' }}>
                                            {{ $uk->kode }} - {{ $uk->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('unit_kerja_id')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <div class="col-md-6  @error('bisa_pinjam') has-error @enderror">
                                <label for="bisa_pinjam" class=" control-label">Bisa Pinjam</label>
                                <select name="bisa_pinjam" id="bisa_pinjam" class="form-control">
                                    <option value="">-Pilih-</option>
                                    <option value="0"
                                        {{ old('bisa_pinjam', $ruangan->bisa_pinjam) == '0' ? 'selected' : '' }}>Tidak</option>
                                    <option value="1"
                                        {{ old('bisa_pinjam', $ruangan->bisa_pinjam) == '1' ? 'selected' : '' }}>Bisa</option>
                                   
                                </select>
                                @error('bisa_pinjam')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row">

                            <div class="col-md-6  @error('status') has-error @enderror">
                                <label for="status" class=" control-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">-Pilih Status-</option>
                                    <option value="1"
                                        {{ old('kondisi', $ruangan->status) == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="2"
                                        {{ old('kondisi', $ruangan->status) == '2' ? 'selected' : '' }}>Dihapus</option>
                                    <option value="3"
                                        {{ old('kondisi', $ruangan->status) == '3' ? 'selected' : '' }}>Diperbaiki</option>
                                </select>
                                @error('status')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-6  @error('foto_ruangan') has-error @enderror">
                                <label for="foto_ruangan" class="control-label">Foto Ruangan</label>
                                <label class="custom-file px-file" for="success-input-4">
                                    <input type="file" id="success-input-4" class="custom-file-input"
                                        name="foto_ruangan" accept="image/*" onchange="previewImage()">
                                    <span class="custom-file-control form-control">Pilih file...</span>
                                    <div class="px-file-buttons">
                                        <button type="button" class="btn btn-xs px-file-clear">Clear</button>
                                        <button type="button"
                                            class="btn btn-primary btn-xs px-file-browse">Browse</button>
                                    </div>
                                </label>
                                @if ($ruangan->foto_ruangan)
                                    <img src="{{ asset('storage/ruangans/' . $ruangan->foto_ruangan) }}"
                                        class="img-preview img-fluid mb-3 d-block" width="250px">
                                @else
                                    <img class="img-preview img-fluid mb-3" width="250px">
                                @endif
                                @error('foto_ruangan')
                                    <small class="form-message">
                                        {{ $message }}
                                    </small>
                                @enderror
                                <img class="img-preview img-fluid mb-3" width="250px">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div id="tempat-modal"></div>

    @push('js')
        <script>
            setTimeout(function() {
                document.getElementById('respon').innerHTML = '';
            }, 3000);
        </script>
        <script>
            function previewImage() {
                const image = document.querySelector('#success-input-4');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    @endpush
@endsection
