@extends('layouts.master')
@section('title', 'Home | Sistem Terdistribusi')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if (session('pesan'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('pesan') }}
                                </div>

                            @endif
                            <form action="/" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="number" value="{{ old('nik') }}" name="nik"
                                        class="form-control input-pill @error('nik') is-invalid @enderror" id="nik"
                                        placeholder="NIK">
                                    <div class="text-danger">
                                        @error('nik')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">

                                    <input type="text" value="{{ old('nama_lengkap') }}" name="nama_lengkap"
                                        class="form-control input-pill @error('nama_lengkap') is-invalid @enderror"
                                        id="namaLengkap" placeholder="Nama Lengkap">
                                    <div class="  text-danger">
                                        @error('nama_lengkap')
                                            {{ $message }}
                                        @enderror
                                    </div>


                                </div>
                                <div class="form-group">

                                    <input type="text" value="{{ old('alamat') }}" name="alamat"
                                        class="form-control input-pill @error('alamat') is-invalid @enderror" id="alamat"
                                        placeholder="Alamat">
                                    <div class="text-danger">
                                        @error('alamat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="nama_jalur" id="nama_jalur">
                                        <option value="1">Mandiri</option>
                                        <option value="2">BPJS</option>
                                    </select>


                                    {{-- <input type="text" value="{{ old('nama_jalur') }}" name="nama_jalur"
                                        class="form-control input-pill @error('nama_jalur') is-invalid @enderror"
                                        id="nama_jalur" placeholder="Nama Jalur">
                                    <div class="text-danger">
                                        @error('nama_jalur')
                                            {{ $message }}
                                        @enderror
                                    </div> --}}

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-round btn-sm float-right ">Simpan</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table  table-striped">
                                    <thead>
                                        <tr class="align-cetre">
                                            <th scope="col">Nomer Antrian</th>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Jalur</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($pengguna as $p)

                                            <tr>
                                                <td>{{ $p->id_pengguna }}</td>
                                                <td>{{ $p->nik }}</td>
                                                <td>{{ $p->nama_lengkap }}</td>
                                                <td>{{ $p->alamat }}</td>

                                                <?php if($p->id_jalur==1){ ?>
                                                <td> Mandiri</td>
                                                <?php }else{ ?>
                                                <td>BPJS</td>
                                                <?php } ?>
                                                <td> <a href="/edit/{{ $p->id_pengguna }}"
                                                        class="btn btn-warning btn-xs">
                                                        <i class="fas fa-pen"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#delete{{ $p->id_pengguna }}"><i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($pengguna as $p)

                    <div class="modal fade" id="delete{{ $p->id_pengguna }}" tabindex="-1" role="dialog"
                        aria-labelledby="{{ $p->nama_lengkap }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="{{ $p->nama_lengkap }}"> <i
                                            class="fas fa-exclamation-triangle"> </i> Perhatian

                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah kamu yakin menghapus user {{ $p->nama_lengkap }} ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                    <a href="/delete/{{ $p->id_pengguna }}" class="btn btn-danger">Yes</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

@endsection
