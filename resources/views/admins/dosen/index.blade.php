@extends('admins.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert"">
            Data Berhasil di Tambah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('pesan_edit'))
        <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert"">
            Data Berhasil di Edit
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('pesan_hapus'))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"">
            Data Berhasil di Hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="pagetitle">
        <h1>Dosen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Dosen</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg">
                <div class="row">

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <a href="/dosen/create" type="button" class="btn btn-primary btn-sm mb-4">+ Tambah Dosen</a>
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Dosen</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            {{-- <th scope="col">Id User</th> --}}
                                            <th scope="col">NIP</th>
                                            <th scope="col">Nama Dosen</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Tempat Lahir</th>
                                            <th scope="col">Tangal Lahir</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor Telepon</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosens as $dosen)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{ $dosen->id_user }}</td> --}}
                                                <td>{{ $dosen->nip }}</td>
                                                <td>{{ $dosen->nama_dosen }}</td>
                                                <td>{{ $dosen->jabatan }}</td>
                                                <td>{{ $dosen->tempat_lahir }}</td>
                                                <td>{{ $dosen->tgl_lahir }}</td>
                                                <td>{{ $dosen->alamat }}</td>
                                                <td>{{ $dosen->notelp }}</td>
                                                <td>
                                                    <a href="{{ url('/dosen/' . $dosen->id_dosen) }}" class="btn btn-link"><span
                                                        class="badge bg-info text-dark"><i
                                                        class="bi bi-info-circle"></i> Detail</span></a>

                                                        <a href="{{ url('/dosen/' . $dosen->id_dosen . '/edit/') }}" class="btn btn-link"><span
                                                            class="badge bg-warning text-dark"><i
                                                            class="bi bi-info-circle"></i> Edit </span></a>

                                                    <form
                                                        action="{{ '/dosen/' . $dosen->id_dosen }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="#delete" class="btn btn-link"><span
                                                                class="badge bg-danger text-dark"><i
                                                                    class="bi bi-trash"></i> Hapus</span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $dosens->links() }}

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>

    <!-- The Modal -->
    <div id="modal_img" class="modal-image">
        <span class="close">&times;</span>
        <img class="modal-content-image" id="img01">
        <div id="caption"></div>
    </div>

@endsection