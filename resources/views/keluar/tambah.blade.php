@extends('tampilan.layout')
@section('content')
<style>
    .fa-sign-out-alt {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-sign-out-alt mr-2 fa-3x"></i>Barang Keluar</h4>
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">jumlah Data Barang keluar</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('keluars.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="barang">Barang:</label>
                            <select class="form-control" id="jenisp1" name="barang" onchange="hitungHarga();">
                                <option value="" selected disabled>Pilih Barang</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->stok_minimal }}" data-idbarang="{{ $barang->id_barang }}" data-stokminimal="{{ $barang->id_barang }}" >{{ $barang->id_barang }}&nbsp;{{ $barang->nama_barang }}&nbsp;{{ $barang->jenis }}</option>
                                @endforeach
                            </select>
                        @error('barang')
                        <span id="n" class="text-danger">{{ $message }}</span>
                        @enderror
                        </div> 
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_barang1" name="id_barang" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Stok:</label>
                            <input type="text" class="form-control" name="jumlah2" id="harga1"  readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Keluar:</label>
                            <input type="text" class="form-control" id="beratb1" name="jumlah1" onkeyup="hitungHarga();" 
                            onkeypress="return isNumberKey(event)" required>   
                        @error('jumlah1')
                        <span id="i" class="text-danger">{{ $message }}</span>
                        @enderror                      
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Total Stok</label>
                            <input type="number" class="form-control" id="hasil1" name="jumlah" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
