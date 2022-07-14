<?php

include "koneksi.php";

if (isset($_GET['id_onproses'])) {
    $id_onproses = $_GET['id_onproses'];
    $query = "DELETE FROM tb_pesanan WHERE id = $id_onproses";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: sedangproses_admin.php");
    } else {
        echo "gagal";
    }
}

if (isset($_GET['id_proses'])) {
    $id_proses = $_GET['id_proses'];
    $query = "DELETE FROM tb_pesanan WHERE id = $id_proses";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: sudahproses_admin.php");
    } else {
        echo "gagal";
    }
}

if (isset($_GET['id_mkn'])) {
    $id_mkn = $_GET['id_mkn'];
    $query = "DELETE FROM tb_makanan WHERE id = $id_mkn";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: makanan_admin.php");
    } else {
        echo "gagal";
    }
}

if (isset($_GET['id_mnm'])) {
    $id_mnm = $_GET['id_mnm'];
    $query = "DELETE FROM tb_minuman WHERE id = $id_mnm";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: minuman_admin.php");
    } else {
        echo "gagal";
    }
}

if (isset($_GET['id_karaoke'])) {
    $id_karaoke = $_GET['id_karaoke'];
    $query = "DELETE FROM tb_karaoke WHERE id = $id_karaoke";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: admin.php");
    } else {
        echo "gagal";
    }
}

if (isset($_GET['id_review'])) {
    $id_review = $_GET['id_review'];
    $query = "DELETE FROM tb_review WHERE id = $id_review";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: admin.php");
    } else {
        echo "gagal";
    }
}

if (isset($_GET['id_akun'])) {
    $id_akun = $_GET['id_akun'];
    $query = "DELETE FROM tb_login WHERE id = $id_akun";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: pengaturan_admin.php");
    } else {
        echo "gagal";
    }
}
