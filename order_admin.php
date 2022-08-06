<!-- navbar admin -->
<?php include "navbar_admin.php";

if (isset($_POST['add_to_cart'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $gambar = $_POST['gambar'];
  $jumlah_pesan = 1;

  $cek = mysqli_query($koneksi, "SELECT * FROM tb_cart WHERE nama = '$nama'");
  if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Menu Sudah Dipilih, Silahkan Pilih Menu Lain !');document.location='admin.php'</script>";
  } else {
    $insert = mysqli_query($koneksi, "INSERT INTO tb_cart VALUES(
        NULL,
        '$nama',
        '$harga',
        '$gambar',
        '$jumlah_pesan')");
    if ($insert) {
      echo "<script>alert('Berhasil Memesan !');document.location='admin.php'</script>";
    } else {
      echo 'Gagal Upload !';
    }
  }
}

?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pesan</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pesan</li>
    </ol>
  </div>

  <div class="row mb-3 justify-content-center">


    <?php
    include "koneksi.php";
    $query = "SELECT * FROM tb_karaoke";
    $sql = mysqli_query($koneksi, $query);
    $no = 1;
    while ($data = mysqli_fetch_array($sql)) { ?>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center text-center">
              <div class="col mr-2">
                <div class="badge badge-primary mb-2">Karaoke</div>
                <img src="upload/<?= $data['gambar'] ?>" width="153px">
                <div class="badge badge-success text-xs font-weight-bold text-uppercase mb-1">RP. <?= $data['harga'] ?></div>
                <div class="h5 mb-0 font-weight-bold text-primary"><?= $data['nama'] ?></div>
                <form action="#" method="POST">
                  <input type="hidden" name="nama" value="<?= $data['nama'] ?>">
                  <input type="hidden" name="harga" value="<?= $data['harga'] ?>">
                  <input type="hidden" name="gambar" value="<?= $data['gambar'] ?>">
                  <div class="mt-2 mb-0 text-xs">
                    <input type="submit" value="Pesan" class="btn btn-sm btn-outline-primary" name="add_to_cart">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php
    include "koneksi.php";
    $query = "SELECT * FROM tb_minuman";
    $sql = mysqli_query($koneksi, $query);
    $no = 1;
    while ($data = mysqli_fetch_array($sql)) { ?>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center text-center">
              <div class="col mr-2">
                <div class="badge badge-danger">Minuman</div>
                <img src="upload/<?= $data['gmb_minuman'] ?>" width="220px">
                <div class="badge badge-success text-xs font-weight-bold text-uppercase mb-1">RP. <?= $data['harga_minuman'] ?></div>
                <div class="h5 mb-0 font-weight-bold text-primary"><?= $data['nama_minuman'] ?></div>
                <form action="#" method="POST">
                  <input type="hidden" name="nama" value="<?= $data['nama_minuman'] ?>">
                  <input type="hidden" name="harga" value="<?= $data['harga_minuman'] ?>">
                  <input type="hidden" name="gambar" value="<?= $data['gmb_minuman'] ?>">
                  <div class="mt-2 mb-0 text-xs">
                    <input type="submit" value="Pesan" class="btn btn-sm btn-outline-primary" name="add_to_cart">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php
    include "koneksi.php";
    $query = "SELECT * FROM tb_makanan";
    $sql = mysqli_query($koneksi, $query);
    $no = 1;
    while ($data = mysqli_fetch_array($sql)) { ?>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center text-center">
              <div class="col mr-2">
                <div class="badge badge-warning">Makanan</div>
                <img src="upload/<?= $data['gmb_makanan'] ?>" width="220px">
                <div class="badge badge-success text-xs font-weight-bold text-uppercase mb-1">RP. <?= $data['harga_makanan'] ?></div>
                <div class="h5 mb-0 font-weight-bold text-primary"><?= $data['nama_makanan'] ?></div>
                <form action="#" method="POST">
                  <input type="hidden" name="nama" value="<?= $data['nama_makanan'] ?>">
                  <input type="hidden" name="harga" value="<?= $data['harga_makanan'] ?>">
                  <input type="hidden" name="gambar" value="<?= $data['gmb_makanan'] ?>">
                  <div class="mt-2 mb-0 text-xs">
                    <input type="submit" value="Pesan" class="btn btn-sm btn-outline-primary" name="add_to_cart">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>


  </div>
  <!--Row-->
</div>

<!-- footer admin -->
<?php include "footer_admin.php"; ?>
<!-- end footer admin -->