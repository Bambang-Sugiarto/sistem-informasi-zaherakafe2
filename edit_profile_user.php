<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-11">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM tb_login WHERE email ='$email'";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" readonly name="email" value="<?= $row['email']; ?>" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?= $row['nama_lengkap']; ?>" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="pass" value="<?= $row['pass']; ?>" class="form-control" placeholder="">
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

            <?php
                }
              }
            }

            ?>

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
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $update = mysqli_query($koneksi, "UPDATE tb_login SET nama_lengkap='$nama_lengkap', email='$email', pass='$pass' WHERE email='$email'");
  if ($update) {
    echo "<script>alert('Berhasil Update Profile !');document.location='admin.php'</script>";
  } else {
    echo 'Gagal!';
  }
}
?>
<!-- end tambah menu -->