
<!-- ini adalah kode bawaan scan -->
@extends('tampilan.layout')
@section('content')
    <style>
        body {
            padding: 20px;
        }

        .card {
            max-width: 100%;
            max-height: 50%;
        }

        .fa-cubes {
            font-size: 1.5rem;
            /* Ubah ukuran logo sesuai kebutuhan Anda */
        }

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
    <div class="container col-lg-4 py-5 ">
        <div class="card bg-white shadow rounded-3 p-3 border-0">
            <h5>Scan Barang:</h5>
            <p id="cameraInfo"></p>
            <div class="preloader-scan">
                <video style="width: 100%" id="preview"></video>
                <div class="laser"></div>
            </div>
        </div>
        <div class="table-responsive">
            <div class="card bg-white shadow rounded-3 p-3 border-0">
                <h5>Scanned QR Code:</h5>
                <p id="qrResult"></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        let scanner;

        function startScanner(camera) {
            if (scanner) {
                scanner.stop();
            }

            scanner = new Instascan.Scanner({
                video: document.getElementById('preview'),
                mirror: false
            });
            scanner.addListener('scan', function(content) {
                const qrResultElement = document.getElementById('qrResult');
                qrResultElement.innerHTML = `<a href="#" target="_blank">${content}</a>`;
            });

            scanner.start(camera);
        }

        Instascan.Camera.getCameras().then(function(cameras) {
            const cameraInfoElement = document.getElementById('cameraInfo');
            if (cameras.length > 0) {
                if (cameras.length === 1) {
                    cameraInfoElement.textContent = 'Camera: Laptop camera';
                    startScanner(cameras[0]);
                } else if (cameras.length === 2) {
                    cameraInfoElement.textContent = 'Camera: Switchable (Front/Back)';
                    const frontCamera = cameras.find(camera => camera.name.toLowerCase().includes('front'));
                    const backCamera = cameras.find(camera => camera.name.toLowerCase().includes('back'));
                    startScanner(backCamera || frontCamera || cameras[0]);
                }
            } else {
                cameraInfoElement.textContent = 'No cameras found.';
            }
        }).catch(function(e) {
            console.error(e);
        });
    </script>
@endsection
