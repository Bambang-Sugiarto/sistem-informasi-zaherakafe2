<?php
include "koneksi.php";

$data_minuman = mysqli_query($koneksi, "SELECT * FROM tb_minuman");
$jumlah_minuman = mysqli_num_rows($data_minuman);

$data_makanan = mysqli_query($koneksi, "SELECT * FROM tb_makanan");
$jumlah_makanan = mysqli_num_rows($data_makanan);

$sedangproses = mysqli_query($koneksi, "SELECT * FROM tb_pesanan WHERE status='Menunggu'");
$jml_onproses = mysqli_num_rows($sedangproses);

$sudahproses = mysqli_query($koneksi, "SELECT * FROM tb_pesanan WHERE status='Selesai'");
$jml_proses = mysqli_num_rows($sudahproses);

$sedangproses = mysqli_query($koneksi, "SELECT * FROM tb_karaoke WHERE status='Menunggu'");
$jml_onproses_karaoke = mysqli_num_rows($sedangproses);

$sudahproses = mysqli_query($koneksi, "SELECT * FROM tb_karaoke WHERE status='Selesai'");
$jml_proses_karaoke = mysqli_num_rows($sudahproses);