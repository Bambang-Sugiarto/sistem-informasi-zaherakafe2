<!-- navbar admin -->
<?php include "navbar_admin.php";
include "koneksi.php";

$id = $_GET['id'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM tb_minuman WHERE id='$id'");
$data = mysqli_fetch_array($ambilData);

?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="./">Home</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-11">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Edit Menu Minuman</h6>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control" name="id_minuman" value="<?= $data['id_minuman'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nama_minuman" value="<?= $data['nama_minuman'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="harga_minuman" value="<?= $data['harga_minuman'] ?>">
            </div>
            <div class="form-group">
              <input type="file" class="form-control" value="<?= $data['gmb_minuman']; ?>" name="gmb_minuman" style="border-radius: 50px;">
              <label style="color: teal;">Nama file:
                <?= $data['gmb_minuman']; ?></label>
            </div>
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
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

if (isset($_POST['edit'])) {
  $id_minuman = $_POST['id_minuman'];
  $nama_minuman = $_POST['nama_minuman'];
  $harga_minuman = $_POST['harga_minuman'];
  $nama_foto = $_FILES['gmb_minuman']['name'];
  $sources = $_FILES['gmb_minuman']['tmp_name'];
  $folder = 'upload/';
  if ($sources != "") {
    move_uploaded_file($sources, $folder . $nama_foto);
    $update = mysqli_query($koneksi, "UPDATE tb_minuman SET
    id_minuman='$id_minuman',
    nama_minuman='$nama_minuman',
    harga_minuman='$harga_minuman',
    gmb_minuman='$nama_foto' WHERE id='$id'");
    if ($update) {
      echo "<script>window.alert('Berhasil update minuman !')
      window.location='minuman_admin.php'</script>";
    } else {
      echo 'Gagal Upload !';
    }
  } else {
    $update = mysqli_query($koneksi, "UPDATE tb_minuman SET
    id_minuman='$id_minuman',
    nama_minuman='$nama_minuman',
    harga_minuman='$harga_minuman' WHERE id='$id'");
    if ($update) {
      echo "<script>window.alert('Berhasil update minuman !')
      window.location='minuman_admin.php'</script>";
    } else {
      echo 'Gagal Upload !';
    }
  }
}
?>
<!-- end tambah menu -->