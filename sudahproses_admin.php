<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sudah Diproses</h1>
  </div>

  <div class="row mb-3">
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-11 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush text-center">
            <thead class="thead-light">
              <tr>
                <th>Antrian</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Pembayaran</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $query = "SELECT * FROM tb_checkout WHERE status = 'Selesai' ";

              $sql = mysqli_query($koneksi, $query);
              $no = 1;
              while ($data = mysqli_fetch_array($sql)) { ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data["nama"]; ?></td>
                  <td><?= $data["email"]; ?></td>
                  <td><?= $data["alamat"]; ?></td>
                  <td><?= $data["nohp"]; ?></td>
                  <td><?= $data["metode_bayar"]; ?></td>
                  <td><?= $data["total_pesan"]; ?></td>
                  <td><?= $data["total_bayar"]; ?>.000,00</td>
                  <td><?= $data["tanggal"]; ?></td>
                  <td><span class="badge badge-success"><?= $data["status"]; ?></span></td>
                  <td>
                    <?php if ($_SESSION['level'] == 'user') : ?>
                      <a href="hapus.php?id_onproses=<?= $data['id']; ?>" onclick="return confirm('Apakah anda yakin?');"><span class="btn btn-sm btn-danger mt-1">Batal</span></a>
                    <?php endif; ?>
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                      <a href="hapus.php?id_onproses=<?= $data['id']; ?>" onclick="return confirm('Apakah anda yakin?');"><span class="btn btn-sm btn-danger mt-1">Hapus</span></a>
                      <a href="edit_proses.php?id=<?= $data['id']; ?>"><span class="btn btn-sm btn-success px-3 mt-1">Edit</span></a>
                    <?php endif; ?>
                  </td>

                </tr>


              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
  <!--Row-->
</div>

<!-- footer admin -->
<?php include "footer_admin.php"; ?>
<!-- end footer admin -->