@extends('tampilan.layout')
@section('content')
@php 
$no = 1;
@endphp
<style>
    .fa-clone {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-clone mr-2 fa-3x"></i>Data Masuk Barang</h4>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>barang</h4>
            </div>
            <div class="col-md-6">
                <form action="{{ route('barang.filter') }}" method="get">
                    <div class="input-group mb-3">
                        <select name="filter" class="form-control">
                            <option value="" @if($selectedFilter === '') selected @endif>Pilih Data</option>
                            <option value="minimal" @if($selectedFilter === 'minimal') selected @endif>Jumlah Minimum</option>
                            <option value="seluruh" @if($selectedFilter === 'seluruh') selected @endif>Jumlah Seluruh</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        @if(isset($query) && count($query) > 0 && isset($selectedFilter))
        <div class="table-responsive">
            <div class="col-md-6">
                <a href="{{ url('cetak') }}" class="btn btn-danger">Print PDF</a>
            </div><br>
            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr class="table-info">
                        <th class="text-center" style="width:50px">No.</th>
                        <th class="text-center">id Barang</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">jenis</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center">Satuan</th>
                        <th class="text-center">foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($query as $item)
                    <tr>
                        <td width="30" class="text-center">{{ $no++ }}</td>
                        <td width="180" class="text-center">{{ $item->id_barang }}</td>
                        <td width="180" class="text-center">{{ $item->nama_barang }}</td>
                        <td width="180" class="text-center">{{ $item->jenis }}</td>
                        <td width="180" class="text-center">{{ $item->stok_minimal }}</td>
                        <td width="180" class="text-center">{{ $item->satuan }}</td>
                        <td><img width="75px" height="75px" src="{{ url('/data_file/'.$item->foto) }}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center">Tidak ada data yang cocok dengan filter yang dipilih.</p>
        @endif
    </div>
</div>
@endsection
