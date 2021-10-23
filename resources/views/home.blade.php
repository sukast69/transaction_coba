@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if (session('pesan'))
                                <div class="alert alert-success" role="alert">
                                    Data berhasil ditambahkan!
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
                                        <option value="...."></option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BPJS">BPJS</option>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table  table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Alamat</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengguna as $p)
                                            <tr>
                                                <td>{{ $p->nik }}</td>
                                                <td>{{ $p->nama_lengkap }}</td>
                                                <td>{{ $p->alamat }}</td>
                                            </tr>
                                        @endforeach


                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="basic-datatables" class="display table  table-hover">
                                    <thead>
                                        <tr>

                                            <th scope="col">Nama Jalur</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataBank as $db)
                                            <tr>
                                                <td>{{ $db->nama_jalur }}</td>
                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
