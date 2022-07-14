<?php
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/img/logo/logo.png" rel="icon">
  <title>Buat Akun</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <br>
  <div class="container-login mt-5">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                  </div>
                  <form action="" method="POST" class="user">
                    <div class="form-group">
                      <input class="form-control" name="nama_lengkap" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" name="pass" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="level" value="user">
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" name="submit" class="btn btn-primary btn-block mb-2">Daftar</button>
                    </div>
                  </form>
                  <!-- <div class="text-center">
                    <a class="font-weight-bold small" href="register.html">Buat akun</a>
                  </div> -->
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $level = $_POST['level'];

  $insert = mysqli_query($koneksi, "INSERT INTO tb_login VALUES(
        NULL,
        '$nama_lengkap',
        '$email',
        '$pass',
        '$level')");
  if ($insert) {
    echo "<script>alert('Selamat Anda Berhasil Membuat Akun!');document.location='login.php'</script>";
  } else {
    echo 'Gagal Upload !';
  }
}
?>