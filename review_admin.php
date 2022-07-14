<?php include "navbar_admin.php"; ?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Testimoni</h1>
  </div>

  <div class="row mb-3">
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-11 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Review</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Review</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "koneksi.php";
              $query = "SELECT * FROM tb_review";
              $query_run = mysqli_query($koneksi, $query);
              $no = 1;
              while ($row = mysqli_fetch_array($query_run)) {
              ?>
                <tr>
                  <th><?= $no++ ?></th>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['email']; ?></td>
                  <td><?= $row['deskripsi']; ?></td>
                  <td>
                    <a href="hapus.php?id_review=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin?');">
                      <span class="btn btn-sm btn-danger px-3">Hapus</span></a>
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