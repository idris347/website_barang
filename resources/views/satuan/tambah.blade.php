
@extends('tampilan.layout')
@section('title')
@section('content')

<style>
    .fa-balance-scale {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-balance-scale mr-2 fa-3x"></i>Satuan Barang</h4>
<center>
<form action="{{ route('satuans.store') }}" method="POST" >
        @csrf
        <div class="card mt-2">
            <div class="card-header"><div class="card-title">Tambah Data Satuan</div> </div>
                <div class="card-body">
                    <div class="form-group text-left">
                        <label>Nama satuan</label>
                        <input type="text" class="form-control" name="nama_satuan" placeholder="Name">
                        @error('nama_satuan')
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