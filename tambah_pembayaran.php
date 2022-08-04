<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-11">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Pembayaran</h6>
        </div>
        <div class="card-body">
          <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Nama Bank</label>
              <input type="text" name="bank" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Total Pembayaran</label>
              <input type="text" name="jumlah" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Bukti Pembayaran</label>
              <div class="custom-file">
                <input type="file" name="bukti" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
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
  $nama_lengkap = $_POST['nama_lengkap'];
  $bank = $_POST['bank'];
  $jumlah = $_POST['jumlah'];
  $bukti = $_FILES['bukti']['name'];
  $sources = $_FILES['bukti']['tmp_name'];
  $folder = 'upload/';


  move_uploaded_file($sources, $folder . $bukti);
  $insert = mysqli_query($koneksi, "INSERT INTO tb_pembayaran VALUES(
        NULL,
        '$nama_lengkap',
        '$bank',
        '$jumlah',
        '$bukti')");
  if ($insert) {
    echo "<script>alert('Berhasil Upload Bukti Pembayaran!');document.location='admin.php'</script>";
  } else {
    echo 'Gagal Upload !';
  }
}
?>
<!-- end tambah menu -->