@extends('tampilan.layout')
@section('content')
    <style>
        .preloader-scan {
            margin: auto;
            position: relative;
        }

        .preloader-scan .laser {
            width: 120%;
            background-color: #e10012;
            margin-left: -10%;
            height: 2px;
            position: absolute;
            top: 1%;
            z-index: 2;
            box-shadow: 0 0 4px red;
            animation: scanning 2s infinite;
            filter: blur(1px);
        }

        @keyframes beam {
            50% {
                opacity: 0;
            }
        }

        @keyframes scanning {
            50% {
                transform: translateY(200px);
            }
        }
    </style>
    <div class="container col-lg-4 py-5">
        <div class="card bg-white shadow rounded-3 p-3 border-0">
            @if (session()->has('gagal'))
                <div class="alert alert-danger" role="alert">
                    {{ session('gagal') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h5>Scan detail barang:</h5>
            <div class="preloader-scan">
                <video style="width: 100%" id="preview"></video>
                <div class="laser"></div>
            </div>
            <div id="qrResult"></div>
            <form action="{{ route('store') }}" method="POST" id="form">
                @csrf
                <input type="hidden" name="id_barang" id="id_barang">
            </form>
        </div>
            <div class="card bg-white shadow rounded-3 p-3 border-0">
                <form action="{{ route('store') }}" method="POST" id="newForm">
                    @csrf
                    <!-- Your form fields go here -->
                    <label for="id_barang">masukan kodenya:</label>
                    <input type="text" name="id_barang" id="id_barang">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        <div class="table-responsive mt-5">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                </tr>
                @if (isset($barang))
                    <tr>
                        <td>
                            <div class="barang-container" onmouseover="showFoto('{{ url('/data_file/' . $barang->foto) }}')"
                                onmouseout="hideFoto()">
                                {{ $barang->nama_barang }}&nbsp;{{ $barang->jenis }}
                            </div>
                            <div class="hover-foto-container">
                                <img width="75px" height="75px" src="{{ url('/data_file/' . $barang->foto) }}">
                            </div>
                        </td>
                        <td>{{ $barang->stok_minimal }}&nbsp {{ $barang->satuan }}</td>
                    </tr>
                @elseif(request()->has('id_barang'))
                    <tr>
                        <td colspan="2">Data barang tidak ditemukan.</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    <style>
        .hover-foto-container {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            padding: 5px;
            z-index: 1;
        }

        .barang-container:hover+.hover-foto-container {
            display: block;
        }
    </style>

    <script>
        function showFoto(src) {
            const hoverFotoContainer = document.querySelector('.hover-foto-container');
            const img = hoverFotoContainer.querySelector('img');
            img.src = src;
        }

        function hideFoto() {
            const hoverFotoContainer = document.querySelector('.hover-foto-container');
            const img = hoverFotoContainer.querySelector('img');
            img.src = '';
        }
    </script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let scanner;

            function isMobileDevice() {
                return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
            }

            function startScanner(camera) {
                scanner = new Instascan.Scanner({
                    video: document.getElementById('preview')
                });

                scanner.addListener('scan', function(content) {
                    document.getElementById('id_barang').value = content;
                    document.getElementById('form').submit();
                });

                Instascan.Camera.getCameras().then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[camera]);
                    } else {
                        console.error('No cameras found.');
                    }
                }).catch(function(e) {
                    console.error(e);
                });
            }

            if (isMobileDevice()) {
                startScanner(1);
            } else {
                startScanner(0);
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            function hideAlerts() {
                let alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    setTimeout(function() {
                        alert.remove();
                    }, 5000);
                });
            }
            hideAlerts();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
