@extends('admins.layouts.main')

@section('container')
    <div class="card">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">
                <form action="/pelanggaran" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <h5 class="card-header text-center font-weight-bold">Buat Data Pelanggaran</h5><br>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="pelanggaran" class="form-label" style="text-align: center;">Pelanggaran</label>
                                <input
                                    type="text"
                                    name="pelanggaran"
                                    class="form-control @error('pelanggaran') is-invalid @enderror"
                                    id="pelanggaran"
                                    value="{{ old('pelanggaran') }}"
                                    autofocus
                                    placeholder="Pelanggaran"
                                >
                                @error('pelanggaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="dosen" class="form-label">Mahasiswa</label>
                                <select class="form-select @error('id_mhs') is-invalid @enderror" name="id_mhs" aria-label="Default select example">
                                    <option selected value="">Pilih Mahasiswa</option>
                                    @foreach($mahasiswas as $mhs)
                                        @if (old('id_mhs') == $mhs->id_mhs)
                                            <option value="{{ $mhs->id_mhs }}" selected>{{ $mhs->nama_mhs }}</option>
                                        @else
                                            <option value="{{ $mhs->id_mhs }}">{{ $mhs->nama_mhs }}-{{ $mhs->nim }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('id_mhs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- <div class="mb-3">
                                <label for="surat" class="form-label">Surat SP</label>
                                <input
                                    type="file"
                                    name="surat"
                                    class="form-control @error('surat') is-invalid @enderror"
                                    id="surat"
                                    value="{{ old('surat') }}"
                                >
                                @error('surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> -->

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal"
                                >
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="id_semester" class="form-label">Semester</label>
                                <select name="id_semester" id="id_semester" class="form-select @error('id_semester') is-invalid @enderror">
                                    @foreach($semesters as $semester)
                                    <option value="{{ $semester->id_semester }}">{{ $semester->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_semester')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="waktu_keterlambatan" class="form-label">Waktu Keterlambatan (jam)</label>
                                <input
                                    type="number"
                                    name="waktu_keterlambatan"
                                    class="form-control @error('waktu_keterlambatan') is-invalid @enderror"
                                    id="waktu_keterlambatan"
                                    value="{{ old('waktu_keterlambatan') }}"
                                >
                                @error('waktu_keterlambatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <input type="hidden" name="status" value="baik">

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
    </div>
    <br>
@endsection
