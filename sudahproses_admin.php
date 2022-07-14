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
                <th>No HP / WA</th>
                <th>Makanan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Minuman</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $query = "SELECT nama, nohp, nama_makanan, harga_makanan, jml_makanan, nama_minuman, harga_makanan,
                        nama_minuman, harga_minuman, jml_minuman, status,
                        (harga_makanan * jml_makanan) + (harga_minuman * jml_minuman) as total FROM tb_pesanan
                        INNER JOIN tb_makanan ON tb_pesanan.id_makanan = tb_makanan.id_makanan 
                        INNER JOIN tb_minuman ON tb_pesanan.id_minuman = tb_minuman.id_minuman
                        WHERE status = 'Selesai' ";
              $sql = mysqli_query($koneksi, $query);
              $no=1;
              while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data["nama"]; ?></td>
                  <td><?= $data["nohp"]; ?></td>
                  <td><?= $data["nama_makanan"]; ?></td>
                  <td><?= "Rp ".number_format($data["harga_makanan"], 2,',','.'); ?></td>
                  <td><?= $data["jml_makanan"]; ?></td>
                  <td><?= $data["nama_minuman"]; ?></td>
                  <td><?= "Rp ".number_format($data["harga_minuman"], 2,',','.'); ?></td>
                  <td><?= $data["jml_minuman"]; ?></td>
                  <td><?= "Rp ".number_format($data["total"], 2,',','.'); ?></td>
                  <td><span class="badge badge-success"><?= $data["status"]; ?></span></td>
                  <td>
                    <?php
                    $query2 = "SELECT id FROM tb_pesanan WHERE status='Selesai' AND nohp = '$data[nohp]'";
                    $sql2 = mysqli_query($koneksi, $query2);
                    while ($data2 = mysqli_fetch_array($sql2)) { ?>
                      <a href="hapus.php?id_proses=<?= $data2['id']; ?>" onclick="return confirm('Apakah anda yakin?');"><span class="btn btn-sm btn-danger mt-1">Hapus</span></a>
                      <a href="edit_proses.php?id=<?= $data2['id']; ?>"><span class="btn btn-sm btn-success px-3 mt-1">Edit</span></a>
                    <?php
                    }
                    ?>

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