<?php
include "koneksi.php";
include "jumlah.php";
// include "jumlah_data.php";
session_start();
if (empty($_SESSION['email'])) {
    echo "<script>alert('Silahkan login terlebih dahulu');
    document.location='login.php'</script>";
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
    <title>Zahera Kafe 2</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon">
                    <img src="assets/img/logo/logo2.png">
                </div>
                <div class="sidebar-brand-text mx-3">Zahera Kafe 2</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Menu
            </div>
            <?php if ($_SESSION['level'] == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="minuman_admin.php">
                        <i class="fa fa-coffee"></i>
                        <span>Minuman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="makanan_admin.php">
                        <i class="fa fa-hamburger"></i>
                        <span>Makanan</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
                    <i class="fa fa-users"></i>
                    <span>Pesanan</span>
                </a>
                <?php if ($_SESSION['level'] == 'user') : ?>
                    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="sedangproses_admin.php">Status</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="sedangproses_admin.php">Sedang Diproses</a>
                            <a class="collapse-item" href="sudahproses_admin.php">Sudah Diproses</a>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable5" aria-expanded="true" aria-controls="collapseTable">
                    <i class="fa fa-microphone"></i>
                    <span>Karaoke</span>
                </a>
                <?php if ($_SESSION['level'] == 'user') : ?>
                    <div id="collapseTable5" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="sedangproses_karaoke_admin.php">Status</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                    <div id="collapseTable5" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="sedangproses_karaoke_admin.php">Sedang Diproses</a>
                            <a class="collapse-item" href="sudahproses_karaoke_admin.php">Sudah Diproses</a>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable2" aria-expanded="true" aria-controls="collapseTable">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span>
                </a>
                <?php if ($_SESSION['level'] == 'user') : ?>
                    <div id="collapseTable2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="tambah_pesanan.php">Pesanan</a>
                            <a class="collapse-item" href="tambah_karaoke.php">Karaoke</a>
                            <a class="collapse-item" href="tambah_review.php">Review</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                    <div id="collapseTable2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="tambah_makanan.php">Makanan</a>
                            <a class="collapse-item" href="tambah_minuman.php">Minuman</a>
                            <a class="collapse-item" href="tambah_pesanan.php">Pesanan</a>
                            <a class="collapse-item" href="tambah_karaoke.php">Karaoke</a>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
            <?php if ($_SESSION['level'] == 'user') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_pembayaran.php">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                        <span>Pembayaran</span></a>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION['level'] == 'admin') : ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Testimoni
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="review_admin.php">
                        <i class="fa fa-star"></i>
                        <span>Review</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Lainnya
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="laporan_admin.php">
                        <i class="fa fa-book"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="detail_pembayaran.php">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                        <span>Pembayaran</span></a>
                </li>
            <?php endif; ?>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Pengaturan
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="pengaturan_admin.php">
                        <i class="fa fa-user"></i>
                        <span>Akun</span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link ro unded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="assets/img/boy.png" style="max-width: 60px">
                                <?php
                                $email = $_SESSION['email'];
                                $sql = "SELECT * FROM tb_login WHERE email ='$email'";
                                $result = mysqli_query($koneksi, $sql);
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                ?>

                                            <span class="ml-2 d-none d-lg-inline text-white small">Hai, <?= $row['nama_lengkap'] ?></span>
                                <?php
                                        }
                                    }
                                }


                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="edit_profile_user.php">
                                    <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->