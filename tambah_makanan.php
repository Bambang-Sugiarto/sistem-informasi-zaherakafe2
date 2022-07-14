<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-11">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Menu Makanan</h6>
        </div>
        <div class="card-body">
          <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>ID Makanan</label>
              <input type="text" name="id_makanan" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Nama Makanan</label>
              <input type="text" name="nama_makanan" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Harga Makanan</label>
              <input type="text" name="harga_makanan" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Upload Gambar</label>
              <div class="custom-file">
                <input type="file" name="gmb_makanan" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
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
  $id_makanan = $_POST['id_makanan'];
  $nama_makanan = $_POST['nama_makanan'];
  $harga_makanan = $_POST['harga_makanan'];
  $nama_foto = $_FILES['gmb_makanan']['name'];
  $sources = $_FILES['gmb_makanan']['tmp_name'];
  $folder = 'upload/';

  $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_makanan WHERE id_makanan = '$id_makanan'"));
  if ($cek > 0) {
    echo "<script>window.alert('Id menu yang anda masukan sudah ada')
      window.location='tambah_makanan.php'</script>";
  } else {
    move_uploaded_file($sources, $folder . $nama_foto);
    $insert = mysqli_query($koneksi, "INSERT INTO tb_makanan VALUES(
        NULL,
        '$id_makanan',
        '$nama_makanan',
        '$harga_makanan',
        '$nama_foto')");
    if ($insert) {
      echo "<script>alert('Selamat Data Anda Sudah Tersimpan !');document.location='admin.php'</script>";
    } else {
      echo 'Gagal Upload !';
    }
  }
}
?>
<!-- end tambah menu -->