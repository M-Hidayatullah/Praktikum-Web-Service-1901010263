@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Soal</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-book"></i> Tambah Soal</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.soal.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>NAMA MK</label>
                                <input type="text" name="nama_mk" value="{{ old('nama_mk') }}" placeholder="Masukkan Nama MK" class="form-control @error('nama_mk') is-invalid @enderror">

                                @error('nama_mk')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Dosen</label>
                                <input type="text" name="dosen" value="{{ old('dosen') }}" placeholder="Masukkan Nama Dosen" class="form-control @error('dosen') is-invalid @enderror">

                                @error('dosen')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jumlah Soal</label>
                                <input type="number" name="jumlah_soal" value="{{ old('jumlah_soal') }}" placeholder="Masukkan Jumlah Soal" class="form-control @error('jumlah_soal') is-invalid @enderror">

                                @error('jumlah_soal')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan"vrows="6" style="height: 131px;"
                                          class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
