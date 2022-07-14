<!-- navbar admin -->
<?php include "navbar_admin.php";
include "koneksi.php";

$id = $_GET['id'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id='$id'");
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
          <h6 class="m-0 font-weight-bold text-primary">Edit Akun</h6>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="email" value="<?= $data['email'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="pass" value="<?= $data['pass'] ?>">
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
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $update = mysqli_query($koneksi, "UPDATE tb_login SET
    email='$email',
    pass='$pass'
    WHERE id='$id'");
  if ($update) {
    echo "<script>window.alert('Update AKun Berhasil!')
      window.location='pengaturan_admin.php'</script>";
  } else {
    echo 'Gagal Update!';
  }
}
?>
<!-- end tambah menu -->