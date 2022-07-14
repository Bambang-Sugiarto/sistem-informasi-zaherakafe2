<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
    </ol>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-11">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Pesanan</h6>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label>No HP / WA</label>
              <input type="text" name="nohp" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Makanan</label>
              <select class="select2-single-placeholder form-control" name="id_makanan" id="select2SinglePlaceholder">
                <?php
                $query = "SELECT * FROM tb_makanan";
                $sql = mysqli_query($koneksi, $query);
                while ($data = mysqli_fetch_array($sql)) { ?>
                  <option value="<?= $data['id_makanan']; ?>"><?= $data['nama_makanan']; ?></option>
                <?php
                }

                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah makanan</label>
              <input type="number" name="jml_makanan" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Minuman</label>
              <select class="select2-single-placeholder form-control" name="id_minuman" id="select2SinglePlaceholder">
                <?php
                $query = "SELECT * FROM tb_minuman";
                $sql = mysqli_query($koneksi, $query);
                while ($data = mysqli_fetch_array($sql)) { ?>
                  <option value="<?= $data['id_minuman']; ?>"><?= $data['nama_minuman']; ?></option>
                <?php
                }

                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah Minuman</label>
              <input type="number" name="jml_minuman" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <input type="hidden" name="total" value="" class="form-control" placeholder="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
  $tanggal = date("y-m-d");
  $id_makanan = $_POST['id_makanan'];
  $id_minuman = $_POST['id_minuman'];
  $nama = $_POST['nama'];
  $nohp = $_POST['nohp'];
  $jml_makanan = $_POST['jml_makanan'];
  $jml_minuman = $_POST['jml_minuman'];
  $total = $_POST['total'];
  $insert = mysqli_query($koneksi, "INSERT INTO tb_pesanan VALUES(
        NULL,
        '$tanggal',
        '$id_minuman',
        '$id_makanan',
        '$nama',
        '$nohp',
        '$jml_makanan',
        '$jml_minuman',
        '$total',
        'Menunggu')");
  if ($insert) {
    echo "<script>alert('Pesanan Sedang Diproses !');document.location='sedangproses_admin.php'</script>";
  } else {
    echo 'Gagal Upload !';
  }
}
?>
<!-- end tambah menu -->