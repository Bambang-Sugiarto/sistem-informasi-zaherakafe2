<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Karaoke</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Karaoke</li>
    </ol>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-11">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Karaoke</h6>
          <span class="badge badge-success">Harga Perlagu Rp 2.000,00</span>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label>No HP / WA</label>
              <input type="text" name="nohp" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Jumlah Lagu</label>
              
              <input type="number" name="jml_lagu" class="form-control" placeholder="">


            </div>
            <div class="form-group">
              <input type="hidden" name="harga" value="2000" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <input type="hidden" name="total" class="form-control" placeholder="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->
</div>

<!-- footer admin -->
<?php include "footer_admin.php"; ?>
<!-- end footer admin -->

<!-- tambah menu -->
<?php

if (isset($_POST['submit'])) {
  $tanggal = date('y-m-d');
  $nama = $_POST['nama'];
  $nohp = $_POST['nohp'];
  $jml_lagu = $_POST['jml_lagu'];
  $harga = $_POST['harga'];
  $total = $_POST['total'];
  $insert = mysqli_query($koneksi, "INSERT INTO tb_karaoke VALUES(
        NULL,
        '$tanggal',
        '$nama',
        '$nohp',
        '$jml_lagu',
        '2000',
        '$total',
        'Menunggu')");
  if ($insert) {
    echo "<script>alert('Pesanan Sedang Diproses !');document.location='sedangproses_karaoke_admin.php'</script>";
  } else {
    echo 'Gagal Upload !';
  }
}
?>
<!-- end tambah menu -->