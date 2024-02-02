@extends('tampilan.layout')
@section('content')
<style>
      .block {
            border: 1px solid #ccc;
            width: 100px;
            height: 50px;
            cursor: pointer;
        }
        .canvas {
            border: 1px solid #ccc;
            min-height: 300px;
            position: relative;
        }
</style>
<style>
    .fa-wrench {
        font-size: 1.5rem; /* Ubah ukuran logo sesuai kebutuhan Anda */
    }
</style>
<h3 class="page-title text-white mt-2"><i class="fas fa-wrench"></i>&nbsp;Planogram</h3>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Planogram</h2>
                
            </div>
            <div class="col-md-6">
                <h3>Blocks</h3>
                <div class="block" id="block1">Block 1</div>
                <div class="block" id="block2">Block 2</div>
                <!-- Tambahkan blok lainnya jika diperlukan -->
            </div>
            <div class="col-md-6">
                <h3>Canvas</h3>
                <div class="canvas" id="canvas"></div><br>
                <a href="url('invalid')" class="btn btn-primary">Simpan</a>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var blocks = document.querySelectorAll('.block');
    blocks.forEach(function(block) {
        block.addEventListener('dragstart', function(event) {
            event.dataTransfer.setData('text/plain', block.id);
        });

        // Tambahkan event listener untuk klik ganda
        block.addEventListener('dblclick', function(event) {
            var newName = prompt('Masukkan nama baru:');
            if (newName) {
                this.innerText = newName;
            }
        });

        // Tambahkan event listener untuk klik dan seret
        block.addEventListener('mousedown', function(event) {
            var block = this;
            var offsetX = event.clientX - block.offsetLeft;
            var offsetY = event.clientY - block.offsetTop;

            document.addEventListener('mousemove', moveBlock);
            document.addEventListener('mouseup', function() {
                document.removeEventListener('mousemove', moveBlock);
            });

            function moveBlock(event) {
                var newLeft = event.clientX - offsetX;
                var newTop = event.clientY - offsetY;
                block.style.left = newLeft + 'px';
                block.style.top = newTop + 'px';
            }
        });

        // Tambahkan event listener untuk klik kanan (ubah ukuran)
        block.addEventListener('contextmenu', function(event) {
            event.preventDefault();
            var newSize = prompt('Masukkan ukuran baru (cth. 150px atau 50%):');
            if (newSize) {
                block.style.width = newSize;
            }
        });
    });

    var canvas = document.querySelector('.canvas');
    canvas.addEventListener('dragover', function(event) {
        event.preventDefault();
    });

    canvas.addEventListener('drop', function(event) {
        event.preventDefault();
        var blockId = event.dataTransfer.getData('text/plain');
        var blockText = document.getElementById(blockId).textContent;
        var rect = canvas.getBoundingClientRect();
        var offsetX = event.clientX - rect.left;
        var offsetY = event.clientY - rect.top;

        var block = document.createElement('div');
        block.classList.add('block');
        block.id = blockId;
        block.innerText = blockText;
        block.style.position = 'absolute';
        block.style.left = offsetX + 'px';
        block.style.top = offsetY + 'px';

        canvas.appendChild(block);

        // Tambahkan event listener untuk blok baru
        block.addEventListener('dragstart', function(event) {
            event.dataTransfer.setData('text/plain', block.id);
        });

        block.addEventListener('dblclick', function(event) {
            var newName = prompt('Masukkan nama baru:');
            if (newName) {
                this.innerText = newName;
            }
        });

        block.addEventListener('mousedown', function(event) {
            var block = this;
            var offsetX = event.clientX - block.offsetLeft;
            var offsetY = event.clientY - block.offsetTop;

            document.addEventListener('mousemove', moveBlock);
            document.addEventListener('mouseup', function() {
                document.removeEventListener('mousemove', moveBlock);
            });

            function moveBlock(event) {
                var newLeft = event.clientX - offsetX;
                var newTop = event.clientY - offsetY;
                block.style.left = newLeft + 'px';
                block.style.top = newTop + 'px';
            }
        });

        block.addEventListener('contextmenu', function(event) {
            event.preventDefault();
            var newSize = prompt('Masukkan ukuran baru (cth. 150px atau 50%):');
            if (newSize) {
                block.style.width = newSize;
            }
        });
    });
});
</script>
@endsection
