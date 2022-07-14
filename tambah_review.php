<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Review</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Review</li>
    </ol>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-11">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Review</h6>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <input type="text" name="deskripsi" class="form-control" placeholder="">
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
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $deskripsi = $_POST['deskripsi'];
  $insert = mysqli_query($koneksi, "INSERT INTO tb_review VALUES(
        NULL,
        '$nama',
        '$email',
        '$deskripsi')");
  if ($insert) {
    echo "<script>alert('Berhasil Menambahkan Review !');document.location='admin.php'</script>";
  } else {
    echo 'Gagal!';
  }
}
?>
<!-- end tambah menu -->