
@extends('tampilan.layout')
@section('title')
@section('content')

<style>
    .fa-cubes {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-cubes mr-2 fa-3x"></i>Jenis Barang</h4>
<center>
<form action="{{ route('jeniss.store') }}" method="POST" >
        @csrf
        <div class="card mt-2">
            <div class="card-header"><div class="card-title">Tambah Data Jenis</div> </div>
                <div class="card-body">
                    @if (session('danger'))
                    <div id="b" class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                    @endif
                    <div class="form-group text-left">
                        <label>Nama Jenis</label>
                        <input type="text" class="form-control" name="nama_jenis" placeholder="Name">
                        @error('nama_jenis')
                        <span id="i" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                        <button class="btn btn-primary" type="submit"> Submit </button>
                        </div>
                    </div>
                </div>      
        </div>
    </div>
</center>
@endsection

{{--  --}}