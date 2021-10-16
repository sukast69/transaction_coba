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

                                    <input type="date" value="{{ old('ttl') }}" name="ttl"
                                        class="form-control input-pill @error('ttl') is-invalid @enderror" id="ttl"
                                        placeholder="Tanggal Lahir">
                                    <div class="text-danger">
                                        @error('ttl')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" value="{{ old('nama_bank') }}" name="nama_bank"
                                        class="form-control input-pill @error('nama_bank') is-invalid @enderror"
                                        id="namaBank" placeholder="Nama Bank">
                                    <div class="text-danger">
                                        @error('nama_bank')
                                            {{ $message }}
                                        @enderror
                                    </div>
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
                                            <th scope="col">TTL</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengguna as $p)
                                            <tr>
                                                <td>{{ $p->nik }}</td>
                                                <td>{{ $p->nama_lengkap }}</td>
                                                <td>{{ $p->ttl }}</td>
                                            </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                                {{-- <table id="basic-datatables" class="display table  table-hover">
                                    <thead>
                                        <tr>

                                            <th scope="col">Nama Bank</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataBank as $db)
                                            <tr>
                                                <td>{{ $db->nama_bank }}</td>
                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table> --}}
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

                                            <th scope="col">Nama Bank</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataBank as $db)
                                            <tr>
                                                <td>{{ $db->nama_bank }}</td>
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
