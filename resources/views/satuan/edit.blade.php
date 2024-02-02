@extends('tampilan.layout')
@section('title')
@section('content')
<<style>
    .fa-balance-scale {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-balance-scale mr-2 fa-3x"></i>Satuan Barang</h4>
 <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header"> @foreach ($result as $idris) 
                <form action="{{ route('satuans.update',$idris->id) }}"  method="post">
                    @csrf
                    @method('PUT')
                    <center>
                        <table>
                            <tr>
                                <input type="hidden" name="id" value="{{ $idris->id }}" required>
                                <th width="150"><label for="">Nama satuan</label></th>
                                <th><input type="text" class="form-control" name="nama_satuan" value="{{ $idris->nama_satuan }}" required><br></th>
                            </tr>      
                            <tr>
                                <th><button class="btn btn-primary" type="submit">Simpan</button></th>
                            </tr>
                        </table>
                    </center>
                    @endforeach
                </form>  
    </div>
</div>
    </div>
@endsection