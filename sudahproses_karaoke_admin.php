<?php include "navbar_admin.php"; ?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sudah Proses</h1>
  </div>

  <div class="row mb-3">
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-11 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Karaoke</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush text-center">
            <thead class="thead-light">
              <tr>
                <th>Antrian</th>
                <th>Nama</th>
                <th>No HP / WA</th>
                <th>Jumlah Lagu</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "koneksi.php";
              $query = "SELECT nama,nohp,jml_lagu, harga,status, (harga * jml_lagu) AS total FROM tb_karaoke WHERE status='Selesai'";
              $query_run = mysqli_query($koneksi, $query);
              $no = 1;
              while ($row = mysqli_fetch_array($query_run)) {
              ?>
                <tr>
                  <th><?= $no++ ?></th>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['nohp']; ?></td>
                  <td><?= $row['jml_lagu']; ?></td>
                  <td><?= "Rp ".number_format($row['harga'], 2,',','.'); ?></td>
                  <td><?= "Rp ".number_format( $row['total'], 2,',','.'); ?></td>
                  <td><span class="badge badge-success"><?= $row['status']; ?></span></td>
                  <td>
                  <?php
                    $query2 = "SELECT id FROM tb_karaoke WHERE nohp = '$row[nohp]'";
                    $sql2 = mysqli_query($koneksi, $query2);
                    while ($data2 = mysqli_fetch_array($sql2)) { ?>
                      <a href="hapus.php?id_karaoke=<?= $data2['id']; ?>" onclick="return confirm('Apakah anda yakin?');"><span class="btn btn-sm btn-danger mt-1">Hapus</span></a>
                      <a href="edit_karaoke.php?id=<?= $data2['id']; ?>"><span class="btn btn-sm btn-success px-3 mt-1">Edit</span></a>
                    <?php
                    }
                    ?>
                  </td>

                </tr>

              <?php
              }

              ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
  <!--Row-->
</div>
<?php include "footer_admin.php"; ?>