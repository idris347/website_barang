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
    .fa-user-tie {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-user-tie mr-2 fa-3x"></i> Admin Page - Data Admin</h4>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Admin</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        @csrf
                        <button type="button" class="badge badge-success"><i class="ti-file btn-icon-prepend"></i><a href="{{ route('users.create') }}" style="text-decoration:none">Tambah Data Admin</a></button>
                            <br>
                            <br>
                            @if (session('success'))
                            <div id="i" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <thead>
                            <tr class="table-info">
                                <th class="text-center">No.</th>
                                <th class="text-center">username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Hak Akses</th>
                                <th class="text-center"  style="width:50px">Aksi Edit</th>
                                <th class="text-center"  style="width:50px">Aksi Hapus</th>
                            </tr></thead>
                            <tbody>
                            @foreach ($query as $item)
                            <tr>
                                <td width="30" class="text-center">{{ $no++ }}</td>
                                <td width="180">{{ $item->username }}</td>
                                <td width="180">{{ $item->email}}</td>
                                <td width="100">
                                    @if($item->role == 1)
                                    <p style="color:rgb(0, 255, 0); font-weight: bold;">SuperAdmin</p>
                                    @elseif($item->role == 2)
                                    Admin Gudang
                                    @elseif ($item->role == 3) 
                                    Kepala Gudang
                                    @endif
                                </td>
                            <td>
                                <a href="{{route('users.edit',$item->id)}}" style="text-decoration:none"><button type="button" class="badge badge-primary"><i class="fas fa-edit"></i></button></a>
                            </td>
                            @if ($item->role == 1)
                            <td></td>
                            @else  
                            <td>  <button type="button" class="badge badge-danger delete-product" data-product-id="{{ $item->id }}"><i class="fas fa-trash-alt "></i></button>
                            
                                <form id="delete-form-{{$item->id}}" action="{{ route('users.destroy',$item->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
    
                                </form></td>
                            @endif
                            @endforeach
                            </tr></tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection