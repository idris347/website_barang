@extends('tampilan.layout')

@section('content')
<style>
    .fa-home {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-home mr-2 fa-3x"></i> Dashboard</h4>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div> 
        
    @endif
    {{-- <marquee class="py-3"  direction="left">
        <h1>Selamat Datang Di Halaman <strong>{{ Auth::user()->name }}</strong></h1>
    </marquee> --}}
    
    @if (Auth::user()->role=='1')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center">
          <div class="card card-statistic-2 ">
            <div class="card-stats">
              <div class="card-stats-title">Data User
              </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap ">
              <div class="card-header">
                <h4>Total User</h4>
              </div>
              <div class="card-body">
                <h1>{{ $konsumen }}</h1>
              </div>
            </div>
          </div>
        </div>
        
      </div>

      @elseif(Auth::user()->role=='2')
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">DATA BARANG
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-cube"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Data Barang</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $barang }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">STATISTIK
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Statistik</h4>
                    </div>
                    <div class="card-body">
                        <h5>Data Masuk : {{ $masuk }} <br> Data Keluar : {{ $keluar }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">DATA BARANG MASUK
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-arrow-circle-down"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Barang Masuk</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $masuk }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">DATA BARANG KELUAR
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-arrow-circle-up"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Barang Keluar</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $keluar }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
     @elseif(Auth::user()->role=='3')
     <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">LAPORAN DATA BARANG
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-clone"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>DATA LAPORAN</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $barang }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">LAPORAN MASUK BARANG
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-clone"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>DATA LAPORAN</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $masuk }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">LAPORAN KELUAR BARANG
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-clone"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>DATA LAPORAN</h4>
                    </div>
                    <div class="card-body">
                        <h1>{{ $keluar }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

      @endif
</div>

<div class="card mt-sm-5 mt-md-0">
    <img class="mt-5 " style="width: 100%"  alt="image" src="{{ asset('midas') }}/assets/img/b2.png" ><br><br>
  </div>
</div>
@endsection
