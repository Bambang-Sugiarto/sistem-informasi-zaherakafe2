<!-- navbar admin -->
<?php include "navbar_admin.php";
include "koneksi.php";

$id = $_GET['id'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM tb_makanan WHERE id='$id'");
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
          <h6 class="m-0 font-weight-bold text-primary">Edit Menu Makanan</h6>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control" name="id_makanan" value="<?= $data['id_makanan'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nama_makanan" value="<?= $data['nama_makanan'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="harga_makanan" value="<?= $data['harga_makanan'] ?>">
            </div>
            <div class="form-group">
              <input type="file" class="form-control" value="<?= $data['gmb_makanan']; ?>" name="gmb_makanan" style="border-radius: 50px;">
              <label style="color: teal;">Nama file:
                <?= $data['gmb_makanan']; ?></label>
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
  $id_makanan = $_POST['id_makanan'];
  $nama_makanan = $_POST['nama_makanan'];
  $harga_makanan = $_POST['harga_makanan'];
  $nama_foto = $_FILES['gmb_makanan']['name'];
  $sources = $_FILES['gmb_makanan']['tmp_name'];
  $folder = 'upload/';
  if ($sources != "") {
    move_uploaded_file($sources, $folder . $nama_foto);
    $update = mysqli_query($koneksi, "UPDATE tb_makanan SET
    id_makanan='$id_makanan',
    nama_makanan='$nama_makanan',
    harga_makanan='$harga_makanan',
    gmb_makanan='$nama_foto' WHERE id='$id'");
    if ($update) {
      echo "<script>window.alert('Berhasil update makanan !')
      window.location='makanan_admin.php'</script>";
    } else {
      echo 'Gagal Upload !';
    }
  }else
  {
    $update = mysqli_query($koneksi, "UPDATE tb_makanan SET
    id_makanan='$id_makanan',
    nama_makanan='$nama_makanan',
    harga_makanan='$harga_makanan' WHERE id='$id'");
    if ($update) {
      echo "<script>window.alert('Berhasil update makanan !')
      window.location='makanan_admin.php'</script>";
    } else {
      echo 'Gagal Upload !';
    }
  }
}
?>
<!-- end tambah menu -->