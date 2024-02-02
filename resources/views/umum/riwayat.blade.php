@extends('tampilan.layout')
@section('content')
    @if (session('danger'))
    <div id="b" class="alert alert-danger">
        {{ session('danger') }}
    </div>
    @endif
    @php 
$no = 1;
@endphp
<style>
    .fa-clock {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
    .fade-in-out {
    animation: fadeInOut 3s ease infinite;
    opacity: 0; /* Mulai dengan elemen yang tidak terlihat */
}

@keyframes fadeInOut {
    0%, 100% {
        opacity: 0; /* Elemen tidak terlihat di awal dan akhir animasi */
    }
    50% {
        opacity: 1; /* Elemen terlihat di tengah-tengah animasi */
    }
}
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-clock mr-2 fa-3x"></i> Riwayat</h4>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Riwayat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        @csrf
                            @if (session('success'))
                            <div id="i" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <thead>
                            <tr class="table-info">
                                <th class="text-center" style="width:50px" >No.</th>
                                <th class="text-center">kode barang</th>
                                <th class="text-center">tanggal</th>
                                <th class="text-center">status</th>
                            </tr></thead>
                            <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td width="30" class="text-center">{{ $no++ }}</td>
                                <td width="180" class="text-center">{{ $item->kode }}</td>
                                <td width="180" class="text-center">    {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </td>
                                <td width="100" class="text-center">
                                    @if($item->status == 'Masuk')
                                    <div class="bg-primary fade-in-out text-white "><span >Masuk</span></div>
                                    @elseif($item->status == 'Keluar')
                                    <div class="bg-warning fade-in-out text-white "><span >Keluar</span></div>
                                    @endif
                                </td>
                            @endforeach
                            </tr></tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection