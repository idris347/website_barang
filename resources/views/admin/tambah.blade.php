
@extends('tampilan.layout')
@section('title')
@section('content')
<style>
    .fa-user-tie {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-user-tie mr-2 fa-3x"></i> Admin Page - Data Admin</h4>
<center>
<form action="{{ route('users.store') }}" method="POST" >
        @csrf
        <div class="card mt-2">
            <div class="card-header"><div class="card-title">Tambah Data Admin</div> </div>
                <div class="card-body">
                    <div class="form-group text-left">
                        <label>UserName</label>
                        <input type="text" class="form-control" name="username" placeholder="username">
                        @error('username')
                        <span id="i" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        @error('email')
                        <span id="n" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group  text-left">
                        <label for="password">Password</label>
                        <input type="password" class="form-control"  name="password" required>
                        @error('password')
                        <span id="i" class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    <div class="form-group  text-left">
                        <label for="hakAkses">Hak Akses</label>
                        <select class="form-control" name="hakakses" required>
                          <option value="Admin Gudang">Admin Gudang</option>
                          <option value="Kepala Gudang">Kepala Gudang</option>
                        </select>
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