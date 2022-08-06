<?php

include "koneksi.php";

if (isset($_GET['id_onproses'])) {
    $id_onproses = $_GET['id_onproses'];
    $query = "DELETE FROM tb_checkout WHERE id = $id_onproses";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: admin.php");
    } else {
        echo "gagal";
    }
}

if (isset($_GET['id_byr'])) {
    $id_byr = $_GET['id_byr'];
    $query = "DELETE FROM tb_pembayaran WHERE id = $id_byr";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: detail_pembayaran.php");
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

if (isset($_GET['id_cart'])) {
    $id_cart = $_GET['id_cart'];
    $query = "DELETE FROM tb_cart WHERE id = $id_cart";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: cart.php");
    } else {
        echo "gagal";
    }
}

if (isset($_GET['id_cart_all'])) {
    $id_cart_all = $_GET['id_cart_all'];
    $query = "DELETE FROM tb_cart";
    $run = mysqli_query($koneksi, $query);
    if ($run) {
        header("Location: cart.php");
    } else {
        echo "gagal";
    }
}
