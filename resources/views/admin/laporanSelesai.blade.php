@extends('layouts.appAdmin')

@section('content')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <body id="page-top">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Selesai</h6>
            </div>
            <div class="p-3">
                <div class="d-flex">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#export">
                        Export
                    </button>
                </div>
            </div>
            <tbody>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @else
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Isi</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($lapor->where('status', 'selesai') as $l)
                                <tr>
                                    <td>{{ $l->id_pengaduan }}</td>
                                    <td>{{ $l->nik }}</td>
                                    <td>{{ $l->nama }}</td>
                                    <td>{{ $l->lokasi }}</td>
                                    <td>{{ $l->isi_laporan }}</td>
                                    <td>{{ $l->created_at }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#tanggapan{{ $l->id_pengaduan }}">
                                                Lihat Tanggapan
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

            </tbody>
            </table>
        </div>
        </div>
        </div>

        </div>
        @foreach ($tanggapan as $t)
            <div class="modal fade" id="tanggapan{{ $t->id_pengaduan }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Detail Laporan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="float-right font-italic">{{ $t->jenis }}</p>
                            <button class="btn btn-danger" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Detail Pelapor
                            </button>
                            <div class="collapse" id="collapseExample">
                                <div class="card-header">
                                    <pre>NIK    : {{ $t->nik }}</pre>
                                    <pre>Nama   : {{ $t->nama }}</pre>
                                    <pre>Lokasi : {{ $t->lokasi }}</pre>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title font-weight-bold">{{ $t->judul }}</h5>
                                <img class="card-img-top" src="{{ asset('images/' . $t->foto) }}" alt="Card image cap">
                                <p class="card-text mt-3">{{ $t->isi_laporan }}</p>
                                <div class="border p-3 mt-5 rounded">
                                    <h6 class="text-left font-italic font-weight-bold">Tanggapan:</h6>
                                    <p class="card-text">{{ $t->tanggapan }}</p>
                                    <p class="card-text font-italic text-right">{{ $t->tgl_tanggapan }}</p>
                                </div>
                                @if ($t->status == 0)
                                    <a href="" class="btn btn-primary">Edit Laporan</a>
                                @endif
                            </div>
                            <div class="card-footer text-muted">
                                {{ $l->created_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($lapor as $l)
            <!-- Modal -->
            <div class="modal fade" id="hapus{{ $l->id_pengaduan }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Laporan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary shadow">
                                        <div class="card-body">
                                            <form action="/hapus/validasi/{{ $l->id_pengaduan }}/{{ $l->foto }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="inputName">Peringatan</label>
                                                    <input type="text" id="inputName" value="cancelled" name="status"
                                                        class="form-control" hidden>
                                                    <input type="text" id="inputName" value="{{ $l->foto }}"
                                                        name="foto" class="form-control" hidden>
                                                    <input type="text" id="inputName"
                                                        value="Maaf Laporan Anda Melanggar Peraturan Kami!"
                                                        name="isi_laporan" class="form-control">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Modal -->
        <div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Export Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary shadow">
                                    <div class="card-body text-center">
                                        <form target="_blank" action="{{ route('export.pdf2') }}" method="post">
                                            @csrf
                                            <input type="date" name="from" id="" required>
                                            &nbsp; &nbsp; To &nbsp; &nbsp;
                                            <input type="date" name="to" id="" required>
                                            <br><br>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning btn-block">Export</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </body>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src=" {{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
