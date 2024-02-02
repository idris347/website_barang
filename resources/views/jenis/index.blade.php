@extends('tampilan.layout')
@section('content')
@php 
$no = 1;
@endphp
<style>
    .fa-cubes {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-cubes mr-2 fa-3x"></i>Jenis Barang</h4>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>jenis barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        @csrf
                        <button type="button" class="badge badge-success"><i class="ti-file btn-icon-prepend"></i><a href="{{ route('jeniss.create') }}" style="text-decoration:none">Tambah Jenis Barang</a></button>
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
                                <th class="text-center">Nama User</th>
                                <th class="text-center" style="width:50px">Aksi </th>
                            </tr></thead>
                            <tbody>
                            @foreach ($query as $item)
                            <tr>
                                <td width="30" class="text-center">{{ $no++ }}</td>
                                <td width="180" class="text-center">{{ $item->nama_jenis }}</td>
                               <td class="text-center">
                                <a href="{{route('jeniss.edit',$item->id)}}" style="text-decoration:none"><button type="button" class="badge badge-primary"><i class="fas fa-edit"></i></button></a>
                             <button type="button" class="badge badge-danger delete-product" data-product-id="{{ $item->id }}"><i class="fas fa-trash-alt "></i></button>
                            
                            <form id="delete-form-{{$item->id}}" action="{{ route('jeniss.destroy',$item->id) }}" method="POST" style="display: none;">
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
@endsection