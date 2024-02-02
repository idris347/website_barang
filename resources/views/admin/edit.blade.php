@extends('tampilan.layout')
@section('title')
@section('content')
<style>
    .fa-user-tie {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-user-tie mr-2 fa-3x"></i> Admin Page - Data Admin</h4>

<div class="col-sm-6 col-md-6 col-lg-6">
    <div class="card">
        <div class="card-header">
            @foreach ($result as $idris)
            <form action="{{ route('users.update',$idris->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <input type="hidden" name="id" value="{{ $idris->id }}" required>
                    <div class="col-md-6">
                        <label for="username">username</label>
                        <input type="text" class="form-control" name="username" value="{{ $idris->username }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $idris->email }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
