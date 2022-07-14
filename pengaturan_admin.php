<?php include "navbar_admin.php"; ?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Akun</h1>
  </div>

  <div class="row mb-3">
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-11 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Pengaturan Akun</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Password</th>
                <th>Level</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "koneksi.php";
              $query = "SELECT * FROM tb_login";
              $query_run = mysqli_query($koneksi, $query);
              $no = 1;
              while ($row = mysqli_fetch_array($query_run)) {
              ?>
                <tr>
                  <th><?= $no++ ?></th>
                  <td><?= $row['nama_lengkap']; ?></td>
                  <td><?= $row['email']; ?></td>
                  <td><?= $row['pass']; ?></td>
                  <td><?= $row['level']; ?></td>
                  <td>

                    <a href="hapus.php?id_akun=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda Yakin?')">
                      <span class="btn btn-sm btn-danger">Hapus</span></a>
                    <a href="edit_akun.php?id=<?= $row['id']; ?>">
                      <span class="btn btn-sm btn-success px-3">Edit</span></a>

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