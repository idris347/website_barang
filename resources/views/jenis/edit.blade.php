@extends('tampilan.layout')
@section('title')
@section('content')
<style>
    .fa-cubes {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-cubes mr-2 fa-3x"></i>Jenis Barang</h4>
<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="card">
        <div class="card-header">
            @foreach ($result as $idris)
            <form action="{{ route('jeniss.update',$idris->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $idris->id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_jenis">Nama Jenis:</label>
                                <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="{{ $idris->nama_jenis }}" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
