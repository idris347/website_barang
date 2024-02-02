
@extends('tampilan.layout')
@section('title')
@section('content')
<style>
    .fa-database {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-database mr-2 fa-3x"></i> Barang</h4>
<center>
<form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="card mt-2">
            <div class="card-header"><div class="card-title">Tambah Data Barang</div> </div>
                <div class="card-body">
                    <div class="form-group text-left">
                        <label>Nama barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Name">
                        @error('nama_barang')
                        <span id="i" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label>Jenis</label>
                        <select name="nama_jenis" class="form-control">
                            <option value="" selected disabled>Pilih jenis barang</option>
                            @foreach( $data_jenis as $name )
                                <option > {{ $name->nama_jenis }}</option>
                            @endforeach
                        </select>
                         @error('jenis')
                        <span id="n" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label>satuan</label>
                        <select name="nama_satuan" class="form-control">
                            <option value="" selected disabled>Pilih Satuan barang</option>
                            @foreach( $data_satuan as $name )
                                <option > {{ $name->nama_satuan }}</option>
                            @endforeach
                        </select>           
                         @error('satuan')
                        <span id="b" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label>Stok Minimal</label>
                        <input type="text" class="form-control" name="stok_minimal" placeholder="Name">
                        @error('stok_minimal')
                        <span id="a" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label>foto</label>
                        <input type="file" class="form-control" name="foto" placeholder="Name">
                        @error('foto')
                        <span id="c" class="text-danger">{{ $message }}</span>
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