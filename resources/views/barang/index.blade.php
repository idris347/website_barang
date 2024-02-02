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
    .fa-database {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-database mr-2 fa-3x"></i> Barang</h4>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        @csrf
                        <button type="button" class="badge badge-success"><i class="ti-file btn-icon-prepend"></i><a href="{{ route('barangs.create') }}" style="text-decoration:none">Tambah Barang</a></button>
                            <br>
                            <br>
                            @if (session('success'))
                            <div id="i" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <thead>
                            <tr class="table-info">
                                <th class="text-center" style="width:50px" >No.</th>
                                <th class="text-center">id Barang</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">jenis</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">QrCode</th>
                                <th class="text-center">foto</th>
                                <th class="text-center" style="width:50px">Aksi </th>
                            </tr></thead>
                            <tbody>
                            @foreach ($query as $item)
                            <tr>
                                <td width="30" class="text-center">{{ $no++ }}</td>
                                <td width="180" class="text-center">{{ $item->id_barang }}</td>
                                <td width="180" class="text-center">{{ $item->nama_barang }}</td>
                                <td width="180" class="text-center">{{ $item->jenis }}</td>
                                <td width="180" class="text-center">{{ $item->stok_minimal }}</td>
                                <td width="180" class="text-center">{{ $item->satuan }}</td>
                                <td width="180" class="text-center">
                                    {!! QrCode::size(100)->generate($item->id_barang); !!}
                                    <a href="{{ route('downloadQrCode', $item->id_barang) }}" class="btn btn-sm btn-success" download>Download QR Code</a>
                                </td>                           
                                   <td><img width="75px" height="75px" src="{{ url('/data_file/'.$item->foto) }}"></td>                                    
                                    <td class="text-center">
                                <a href="{{route('barangs.edit',$item->id_barang)}}" style="text-decoration:none"><button type="button" class="badge badge-primary"><i class="fas fa-edit"></i></button></a>
                             <button type="button" class="badge badge-danger delete-product" data-product-id="{{ $item->id_barang }}"><i class="fas fa-trash-alt "></i></button>
                             <button type="button"class="badge badge-info detail-product" data-product-id="{{ $item->id_barang }}" data-product-name="{{ $item->nama_barang }}" data-product-jenis="{{ $item->jenis }}" data-product-image="{{ url('/data_file/'.$item->foto) }}"><i class="fas fa-info-circle"></i></button>
                            <form id="delete-form-{{$item->id_barang}}" action="{{ route('barangs.destroy',$item->id_barang) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')

                            </form></td>
                            @endforeach
                            </tr></tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const detailButtons = document.querySelectorAll('.detail-product');
        
        detailButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const productId = button.getAttribute('data-product-id');
                const productName = button.getAttribute('data-product-name');
                const productjenis= button.getAttribute('data-product-jenis');
                const productImage = button.getAttribute('data-product-image');
                
                Swal.fire({
                    title: productName +" "+ productjenis,
                    text: "Data Barang di Gudang",
                    imageUrl: productImage,
                    imageAlt: productName,
                    imageWidth: 400,
                    imageHeight: 200,
                });
            });
        });
    });
</script>
@endsection