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
                <h4>Laporan barang masuk</h4>
            </div>
            
            <div class="card-body">
                <div class="my-2">
                    <form action="{{ route('laporan_masuk') }}" method="GET">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tanggal Awal</span>
                            </div>
                            <input type="date" class="form-control" name="start_date">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tanggal Akhir</span>
                            </div>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <center><button class="btn btn-primary" type="submit">GET</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if (isset($query) && count($query) > 0)
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="col-md-6">
                        <form action="{{ route('cetak1') }}" method="GET" target="_blank">
                            <input type="hidden" name="start_date" value="{{ request()->input('start_date') }}">
                            <input type="hidden" name="end_date" value="{{ request()->input('end_date') }}">
                            <button class="btn btn-danger" type="submit">Print PDF</button>
                        </form>
                    </div>
                    <table id="example" class="table table-bordered table-hover">
                        @csrf
                        <br>
                        <br>
                        <thead>
                            <tr class="table-info">
                                <th class="text-center" style="width:50px">No.</th>
                                <th class="text-center">id_masuk</th>
                                <th class="text-center">Barang</th>
                                <th class="text-center">jumlah</th>
                                <th class="text-center">satuan</th>
                                <th class="text-center">tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($query as $item)
                            <tr>
                                <td width="30" class="text-center">{{ $no++ }}</td>
                                <td width="180" class="text-center">{{ $item->id_masuk }}</td>
                                <td width="180" class="text-center">{{ $item->nama_barang }}--{{ $item->jenis }}--</td>
                                <td width="180" class="text-center">{{ $item->jumlah }}</td>
                                <td width="180" class="text-center">{{ $item->satuan }}</td>
                                <td width="180" class="text-center">{{ $item->tanggal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
