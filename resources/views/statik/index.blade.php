@extends('tampilan.layout')
@section('content')
<style>
    .fa-chart-bar {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h4 class="page-title text-white mt-2"><i class="fas fa-chart-bar mr-2 fa-3x"></i>
    Statistik</h4>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Statistik Barang Masuk</h3>
    </div>
    <div class="card-body">
        <canvas id="myBarChart" height="100"></canvas> <!-- Tinggi grafik ditingkatkan agar lebih enak dilihat -->
    </div>
</div>
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Statistik Barang Keluar</h3>
    </div>
    <div class="card-body">
        <canvas id="keluarBarChart" height="100"></canvas> <!-- Tinggi grafik ditingkatkan agar lebih enak dilihat -->
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    var labels = {{ Js::from($labels) }};
    var users = {{ Js::from($data) }};

    const data = {
    labels: labels,
    datasets: [{
        label: 'Barang Masuk',
        backgroundColor: 'rgb(54, 162, 235)',
        borderColor: 'rgb(54, 162, 235)',
        data: users,
        barThickness: 50, // Ubah nilai ini sesuai dengan lebar yang diinginkan
    }]
};


    const config = {
        type: 'bar', // Mengubah jenis grafik menjadi bar
        data: data,
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const myBarChart = new Chart(
        document.getElementById('myBarChart'),
        config
    );
</script>
<script type="text/javascript">
    var keluarLabels = {{ Js::from($keluarLabels) }};
    var keluarUsers = {{ Js::from($keluarData) }};

   const keluarData = {
    labels: keluarLabels,
    datasets: [{
        label: 'Barang Keluar',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: keluarUsers,
        barThickness: 50, // Ubah nilai ini sesuai dengan lebar yang diinginkan
    }]
};


    const keluarConfig = {
        type: 'bar', // Mengubah jenis grafik menjadi bar
        data: keluarData,
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const keluarBarChart = new Chart(
        document.getElementById('keluarBarChart'),
        keluarConfig
    );
</script>
@endsection
