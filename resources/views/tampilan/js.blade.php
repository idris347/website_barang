 <!-- General JS Scripts -->
 <script src="{{ url('midas', []) }}/assets/modules/jquery.min.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/popper.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/tooltip.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/moment.min.js"></script>
 <script src="{{ url('midas', []) }}/assets/js/stisla.js"></script>
 
 {{-- ?ss --}}
 <!-- JS Libraies -->
 <script src="{{ url('midas', []) }}/assets/modules/jquery.sparkline.min.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/chart.min.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/summernote/summernote-bs4.js"></script>
 <script src="{{ url('midas', []) }}/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
 <!-- Page Specific JS File -->
 <script src="{{ url('midas', []) }}/assets/js/page/index.js"></script>
 
 <!-- Template JS File -->
 <script src="{{ url('midas', []) }}/assets/js/scripts.js"></script>
 <script src="{{ url('midas', []) }}/assets/js/custom.js"></script>
 
 <script type="text/javascript">
    $(document).ready(function() {
        $("#jenisp").change(function() {
        var selectedOption = $(this).children("option:selected");
        var harga = parseFloat(selectedOption.val());
        var idBarang = selectedOption.data('idbarang'); // Ambil nilai id_barang dari atribut data
        $("#harga").val(harga);
        $("#id_barang").val(idBarang); // Set nilai id_barang pada input

        // Set nilai stok minimal saat memilih barang
        var stokMinimal = parseFloat(selectedOption.data('stokminimal'));
        $("#stokMinimal").val(stokMinimal);
    });

    $("#beratb").keyup(function() {
        hitungHarga();
    });

    function hitungHarga() {
        var selectedOption = $("#jenisp").children("option:selected");
        var jenisCucian = parseFloat(selectedOption.val());
        var berat = parseFloat($("#beratb").val());
        var stokMinimal = parseFloat(selectedOption.data('stokminimal')); // Ambil nilai stok minimal dari atribut data
        var totalStok = jenisCucian + berat;

        if (totalStok < stokMinimal) {
            totalStok = stokMinimal;
        }

        $("#hasil").val(totalStok);
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
});
    $(document).ready(function() {
        $("#jenisp1").change(function() {
        var selectedOption = $(this).children("option:selected");
        var harga = parseFloat(selectedOption.val());
        var idBarang = selectedOption.data('idbarang'); // Ambil nilai id_barang dari atribut data
        $("#harga1").val(harga);
        $("#id_barang1").val(idBarang); // Set nilai id_barang pada input

        // Set nilai stok minimal saat memilih barang
        var stokMinimal = parseFloat(selectedOption.data('stokminimal'));
        $("#stokMinimal1").val(stokMinimal);
    });

    $("#beratb1").keyup(function() {
        hitungHarga();
    });

    function hitungHarga() {
        var selectedOption = $("#jenisp1").children("option:selected");
        var jenisCucian = parseFloat(selectedOption.val());
        var berat = parseFloat($("#beratb1").val());
        var stokMinimal = parseFloat(selectedOption.data('stokminimal')); // Ambil nilai stok minimal dari atribut data
        var totalStok = jenisCucian - berat;

        if (totalStok < stokMinimal) {
            totalStok = stokMinimal;
        }

        $("#hasil1").val(totalStok);
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
});
</script>

<script>
       $(document).ready(function() {
        $("#n").fadeIn('fast').delay(3000).fadeOut('fast');
    });
       $(document).ready(function() {
        $("#i").fadeIn('fast').delay(3000).fadeOut('fast');
    });
       $(document).ready(function() {
        $("#b").fadeIn('fast').delay(3000).fadeOut('fast');

    });
       $(document).ready(function() {
        $("#a").fadeIn('fast').delay(3000).fadeOut('fast');

    });
       $(document).ready(function() {
        $("#c").fadeIn('fast').delay(3000).fadeOut('fast');

    });
       $(document).ready(function() {
        $("#d").fadeIn('fast').delay(3000).fadeOut('fast');

    });
    $(document).on('click', '.delete-product', function() {
        let productId = $(this).data('product-id');
        Swal.fire({
            title: 'Apakah Kamu yakin?',
            text: "Ingin Menghapus Data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ya,saya akan hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Terhapus!',
                'data sudah berhasil di hapus.',
                'success')
                $(`#delete-form-${productId}`).submit();
            }
        });
    });
</script>


  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>new DataTable('#example');</script>