@extends('layouts.master')
@section('title', 'edit')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <form action="/update/{{ $pengguna->id_pengguna }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="number" value="{{ $pengguna->nik }}" name="nik"
                                    class="form-control input-pill @error('nik') is-invalid @enderror" id="nik"
                                    placeholder="NIK">
                                <div class="text-danger">
                                    @error('nik')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">

                                <input type="text" value="{{ $pengguna->nama_lengkap }}" name="nama_lengkap"
                                    class="form-control input-pill @error('nama_lengkap') is-invalid @enderror"
                                    id="namaLengkap" placeholder="Nama Lengkap">
                                <div class="  text-danger">
                                    @error('nama_lengkap')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">

                                <input type="text" value="{{ $pengguna->alamat }}" name="alamat"
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


                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-round btn-sm float-right ">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
