<!-- navbar admin -->
<?php include "navbar_admin.php";
include "koneksi.php";

$id = $_GET['id'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM tb_pesanan
WHERE id='$id'");
$data = mysqli_fetch_array($ambilData);

?>
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
          <h6 class="m-0 font-weight-bold text-primary">Edit Menu Makanan</h6>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <select class="select2-single-placeholder form-control" name="status" id="select2SinglePlaceholder">
                <option value="<?= $data["status"]; ?>"><?= $data['status']; ?></option>
                <option value="Selesai">Selesai</option>
                <option value="Menunggu">Menunggu</option>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
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
  $status = $_POST['status'];
  $update = mysqli_query($koneksi, "UPDATE tb_pesanan SET status = '$status' WHERE id = '$id'");
  if ($update) {
    echo "<script>alert('Selamat Data Anda Sudah Tersimpan !');document.location='admin.php'</script>";
  } else {
    echo 'Gagal Upload !';
  }
}
?>
<!-- end tambah menu -->