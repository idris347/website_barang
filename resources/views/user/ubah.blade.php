@extends('tampilan.layout')
@section('content')
<form action="{{ url('ubah_pass') }}" method="POST">
    @csrf
    @foreach ($data as $user)
    <input type="hidden" name="role" value="{{ $user->role}}" required>

    @endforeach
<div class="row justify-content-center">
<div class="card text-center" style="width: 400px;">
    <div class="card-header h5 text-white bg-primary">Ubah Password</div>
    <div id="n">
        @if (Session('status'))
        <div class="alert alert-success">{{ Session('status') }}</div>
        @elseif (Session('error'))
        <div  class="alert alert-danger">{{ Session('error') }}</div>
        @endif
    </div>
    <div class="card-body px-5">
        <div class="form-outline">
            <label class="form-label" for="typeEmail">Password lama</label>
            <input type="password" id="oldpassword" name="old_password" class="form-control my-3" />
        </div>
        <div class="form-outline">
            <label class="form-label" for="typeEmail">Password baru</label>
            <input type="password" id="newpassword" name="new_password" class="form-control my-3" />
            @error('new_password')
            <span id="i" class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-outline">
            <label class="form-label" for="typeEmail">Konfirmasi Password</label>
            <input type="password" id="repeatpassword" name="repeat_password" class="form-control my-3" />
            @error('repeat_password')
            <span id="b" class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary form-control">simpan</button>
    </div>
</div>
</div>
</form>
@endsection