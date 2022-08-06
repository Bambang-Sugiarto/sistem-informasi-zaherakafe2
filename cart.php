<?php include "navbar_admin.php";

if (isset($_POST['update_jml_btn'])) {
  $update_jml = $_POST['update_jml'];
  $update_jml_id = $_POST['update_jml_id'];
  $update = mysqli_query($koneksi, "UPDATE tb_cart SET jumlah_pesan='$update_jml' WHERE id='$update_jml_id'");
  if ($update) {
    echo "<script>document.location='cart.php'</script>";
  } else {
    echo 'Gagal!';
  }
}

if (isset($_POST['update_nama_btn'])) {
  $update_nama = $_POST['update_nama'];
  $update_nama_id = $_POST['update_nama_id'];
  $update = mysqli_query($koneksi, "UPDATE tb_cart SET nama='$update_nama' WHERE id='$update_nama_id'");
  if ($update) {
    echo "<script>document.location='cart.php'</script>";
  } else {
    echo 'Gagal!';
  }
}

?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Belanja</h1>
  </div>

  <div class="row mb-3">
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-11 mb-4">

      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush text-center">
            <thead class="thead-light">
              <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah Pesan</th>
                <th>Jumlah Harga</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($koneksi, "SELECT * FROM tb_cart");
              $total_hrg = 0;
              if (mysqli_num_rows($query) > 0) {
                while ($result = mysqli_fetch_assoc($query)) { ?>
                  <tr>
                    <td><img src="upload/<?= $result['gambar']; ?>" style="width: 100px; height: 100px;" alt=""></td>
                    <?php if ($_SESSION['level'] == 'user') : ?>
                      <td><?= $result['nama'] ?></td>
                    <?php endif; ?>
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                      <td>
                        <form action="" method="POST">
                          <input type="hidden" name="update_nama_id" value="<?= $result['id'] ?>">
                          <input type="text" class="form-control" name="update_nama" style="width: 7rem; " value="<?= $result['nama'] ?>">
                          <input type="submit" class="btn btn-sm btn-warning mt-2" style="margin-left: -20px;" value="update" name="update_nama_btn" id="">
                        </form>
                      </td>
                    <?php endif; ?>
                    <td>Rp.<?= number_format($result['harga'], 2, ',', '.') ?></td>
                    <td>
                      <form action="" method="POST">
                        <input type="hidden" name="update_jml_id" value="<?= $result['id'] ?>">
                        <input type="number" class="form-control" min="1" name="update_jml" style="width: 7rem; " value="<?= $result['jumlah_pesan'] ?>">
                        <input type="submit" class="btn btn-sm btn-warning mt-2" style="margin-left: -20px;" value="update" name="update_jml_btn" id="">
                      </form>
                    </td>
                    <td>
                      Rp.<?= $sub_total = number_format($result['harga'] * $result['jumlah_pesan'], 2, ',', '.') ?>
                    </td>
                    <td>
                      <a href="hapus.php?id_cart=<?= $result['id']; ?>" onclick="return confirm('Apakah anda yakin?');">
                        <span class="btn mt-1 btn-sm mb-1 btn-danger"><i class="fas fa-trash"></i> Hapus</span></a>
                    </td>
                  </tr>
              <?php
                  $total_hrg += (int)$sub_total;
                };
              };

              ?>
              <tr>
                <?php if ($_SESSION['level'] == 'user') : ?>
                  <td>
                    <a href="admin.php" class="btn btn-primary">Lanjut Belanja</a>
                  </td>
                <?php endif; ?>
                <!-- END Tampilan USER -->
                <?php if ($_SESSION['level'] == 'admin') : ?>
                  <td>
                    <a href="order_admin.php" class="btn btn-primary">Lanjut Belanja</a>
                  </td>
                <?php endif; ?>
                <td colspan="3"><strong>Total Harga</strong></td>
                <td><strong>Rp.<?= $total_hrg; ?>.000,00</strong></td>
                <td><a href="hapus.php?id_cart_all=<?= $result['id']; ?>" onclick="return confirm('Apakah anda yakin?');">
                    <span class="btn mt-1 btn-sm mb-1 btn-danger"><i class="fas fa-trash"></i> Hapus Semua</span></a></td>
              </tr>
            </tbody>
          </table>
          <div class="checkout-btn text-center">
            <hr>
            <a href="checkout.php" class="btn btn-success <?= ($total_hrg > 1) ? '' : 'disabled'; ?>">Proses Checkout</a>
          </div>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
  <!--Row-->
</div>
<?php include "footer_admin.php"; ?>