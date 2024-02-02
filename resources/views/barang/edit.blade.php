@extends('tampilan.layout')
@section('content')
<style>
    .fa-database {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-database mr-2 fa-3x"></i> Barang</h4>

<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Barang</div>

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
                    @foreach ($result as $barang)
                    <form method="POST" action="{{ route('barangs.update', $barang->id_barang) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="foto">Foto Lama:</label>
                                <br>
                                <img src="{{ asset('data_file/' . $barang->foto) }}" alt="Foto Lama" style="max-width: 200px;">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="foto">Foto Baru:</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_barang">Nama Barang:</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_jenis">Jenis:</label>
                                <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="{{ $barang->jenis }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="stok_minimal">Stok Minimal:</label>
                                <input type="number" class="form-control" id="stok_minimal" name="stok_minimal" value="{{ $barang->stok_minimal }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_satuan">Satuan:</label>
                                <input type="text" class="form-control" id="nama_satuan" name="nama_satuan" value="{{ $barang->satuan }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
