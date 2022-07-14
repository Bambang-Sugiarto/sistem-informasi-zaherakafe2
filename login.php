<?php
include 'koneksi.php';
error_reporting(0);

session_start();

if (isset($_SESSION['email'])) {
  header("Location:admin.php");
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM tb_login WHERE email = '$email' AND pass = '$pass'";
  $result = mysqli_query($koneksi, $sql);
  $cek = mysqli_num_rows($result);

  if ($cek > 0) {
    $data = mysqli_fetch_assoc($result);

    // berfungsi mengecek jika user login sebagai admin
    if ($data['level'] == "admin") {
      // berfungsi membuat session
      $_SESSION['email'] =  $data['email'];
      $_SESSION['level'] = "admin";
      //berfungsi mengalihkan ke halaman admin
      header("location:admin.php");
    }
    else if($data['level'] == "user")
    {
      $_SESSION['email'] =  $data['email'];
      $_SESSION['level'] = "user";
      //berfungsi mengalihkan ke halaman admin
      header("location:admin.php");
    }
    else{
      echo "<script>alert('Email atau Password Anda Salah, Silihkan Coba Lagi!')</script>";
    }
  }else
  {
    echo "<script>alert('Email atau Password Anda Salah, Silihkan Coba Lagi!')</script>";
  }
}


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
  <title>Login</title>
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
                    <h1 class="h4 text-gray-900 mb-4">Log In</h1>
                  </div>
                  <form action="" method="POST" class="user">
                    <div class="form-group">
                      <input class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" name="pass" placeholder="Password">
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" name="submit" class="btn btn-primary btn-block mb-2">Masuk</button>
                      <a href="buat_akun.php" style="text-decoration: none;">Buat Akun</a>
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