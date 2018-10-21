<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jQuery/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
  
function confirm_delete(){
    var msg=confirm("Apakah Anda yakin ingin menghapus Admin ini ?"); 
    if(msg==true){
        return true;    
    }else{
        return false;
    }
} 
function confirm_konfirmasi_pembayaran(){
    var msg=confirm("Konfirmasi pembayaran ini ?"); 
    if(msg==true){
        return true;    
    }else{
        return false;
    }
} 
function confirm_tolak_pembayaran(){
    var msg=confirm("Tolak pembayaran ini ?"); 
    if(msg==true){
        return true;    
    }else{
        return false;
    }
} 
function confirm_delete_pembayaran(){
    var msg=confirm("Hapus pembayaran ini ?"); 
    if(msg==true){
        return true;    
    }else{
        return false;
    }
} 
function confirm_delete_user(){
    var msg=confirm("Apakah Anda yakin ingin menghapus Member ini ?");
    if(msg==true){
        return true;    
    }else{
        return false;
    }
}
var counter = 1;
var limit = 10;
 function addInput(divName){
     if (counter == limit)  {
          alert("Upps,, hanya boleh menambahkan " + counter + " form !");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<label class='col-sm-2 control-label'>Ukuran</label><div class='col-sm-5'><input style='text-transform:uppercase;' name='produk_size[]' type='text' class='form-control' placeholder='Ukuran'></div><div class='col-sm-5'><input name='produk_stok[]' type='number' class='form-control' placeholder='Stok'></div>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
function confirm_delete_produk(){
    var msg=confirm("Apakah Anda yakin ingin menghapus Produk ini ?");
    if(msg==true){
        return true;    
    }else{
        return false;
    }
}
function confirm_delete_provinsi(){
    var msg=confirm("Apakah Anda yakin ingin menghapus Provinsi ini ?");
    if(msg==true){
        return true;    
    }else{
        return false;
    }
}
function confirm_delete_ongkir(){
    var msg=confirm("Apakah Anda yakin ingin menghapus Ongkir ini ?");
    if(msg==true){
        return true;    
    }else{
        return false;
    }
}
function confirm_delete_kategori(){
    var msg=confirm("Semua produk dalam Kategori ini akan terhapus. Apakah Anda yakin ingin menghapus Kategori ini ?");
    if(msg==true){
        var msg1=confirm("Verifikasi penghapusan. Klik Oke atau Batal");
        if (msg1==true) {
            return true;
        }else{
            return false;
        }   
    }else{
        return false;
    }
}
function confirm_delete_pesanan(){
    var msg=confirm("Apakah Anda yakin ingin menghapus Pesanan ini ?");
    if(msg==true){
        var msg1=confirm("Verifikasi penghapusan. Klik Oke atau Batal");
        if (msg1==true) {
            return true;
        }else{
            return false;
        }   
    }else{
        return false;
    }
}
</script>


<script>

$(document).ready(function(){
    <?php
        if (@$_GET['aksi']=='edit_admin') {
        echo "
            $(window).load(function(){
                    $('#modalEditAdmin').modal('show');
                });
        ";
        }
        elseif (@$_GET['aksi']=='change_password_admin') {
            echo "
            $(window).load(function(){
                    $('#modalChangePassword').modal('show');
                });
        ";
        }
        else if (@$_GET['aksi']=='edit_member') {
        echo "
            $(window).load(function(){
                    $('#modalEditMember').modal('show');
                });
        ";
        }
        elseif (@$_GET['aksi']=='change_password_member') {
            echo "
            $(window).load(function(){
                    $('#modalChangePasswordMember').modal('show');
                });
        ";
        }
        elseif (@$_GET['aksi']=='edit_kategori') {
            echo "
            $(window).load(function(){
                    $('#modalEditKategori').modal('show');
                });
        ";
        }
        elseif (@$_GET['aksi']=='edit_produk') {
            echo "
            $(window).load(function(){
                    $('#modalEditProduk').modal('show');
                });
        ";
        }
        elseif (@$_GET['aksi']=='edit_provinsi') {
            echo "
            $(window).load(function(){
                    $('#modalEditProvinsi').modal('show');
                });
        ";
        }
        elseif (@$_GET['aksi']=='edit_ongkir') {
            echo "
            $(window).load(function(){
                    $('#modalEditOngkir').modal('show');
                });
        ";
        }
        elseif (@$_GET['aksi']=='konfirmasi_pengiriman') {
            echo "
            $(window).load(function(){
                    $('#modalKonfirmasiPengiriman').modal('show');
                });
        ";
        }
    ?>

});
</script>

<!-- Morris.js charts -->
<script src="assets/js/raphael-min.js"></script>
<script src="assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="assets/js//moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>