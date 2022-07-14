<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3 justify-content-center">
    <!-- Tampilan USER -->
    <?php if ($_SESSION['level'] == 'user') : ?>
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
                <div class="mt-2 mb-0 text-xs">
                  <a href="tambah_pesanan.php" class="btn btn-sm btn-outline-primary">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> Pesan</span>
                  </a>
                </div>
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
                <div class="mt-2 mb-0 text-xs">
                  <a href="tambah_pesanan.php" class="btn btn-sm btn-outline-primary">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> Pesan</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      
    <?php endif; ?>
    <!-- END Tampilan USER -->
    <?php if ($_SESSION['level'] == 'admin') : ?>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Minuman</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_minuman; ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                  <span>Jumlah Minuman</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fa fa-coffee fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Makanan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_makanan; ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                  <span>Jumlah Makanan</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-hamburger fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Makanan & Minuman</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jml_onproses; ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                  <span>Sedang Diproses</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Makanan & Minuman</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_proses ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                  <span>Sudah Diproses</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Karaoke</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_onproses_karaoke ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                  <span>Sedang Diproses</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Karaoke</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_proses_karaoke ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                  <span>Sudah Diproses</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Invoice Example -->
      <div class="col-xl-12 col-lg-11 mb-4">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pesanan</h6>
            <a class="m-0 float-right btn btn-danger btn-sm" href="sedangproses_admin.php">Selengkapnya <i class="fas fa-chevron-right"></i></a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>No HP / WA</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "koneksi.php";
                $query = "SELECT * FROM tb_pesanan";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nohp']; ?></td>
                    <?php
                    if ($data['status'] == "Menunggu") {
                    ?>
                      <td><span class="badge badge-warning"><?= $data['status']; ?></span></td>
                    <?php
                    } else { ?>
                      <td><span class="badge badge-success"><?= $data['status']; ?></span></td>
                    <?php
                    }
                    ?>
                    <td>
                      <a href="edit_proses.php?id=<?= $data['id']; ?>">
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
      <!-- Invoice Example -->
      <div class="col-xl-12 col-lg-11 mb-4">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Karaoke</h6>
            <a class="m-0 float-right btn btn-danger btn-sm" href="sedangproses_karaoke_admin.php">Selengkapnya <i class="fas fa-chevron-right"></i></a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Antrian</th>
                  <th>Nama</th>
                  <th>No HP / WA</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "koneksi.php";
                $query = "SELECT * FROM tb_karaoke";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nohp']; ?></td>
                    <?php
                    if ($data['status'] == "Menunggu") {
                    ?>
                      <td><span class="badge badge-warning"><?= $data['status']; ?></span></td>
                    <?php
                    } else { ?>
                      <td><span class="badge badge-success"><?= $data['status']; ?></span></td>
                    <?php
                    }
                    ?>
                    <td>
                      <a href="edit_karaoke.php?id=<?= $data['id']; ?>">
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
    <?php endif; ?>
  </div>
  <!--Row-->
</div>

<!-- footer admin -->
<?php include "footer_admin.php"; ?>
<!-- end footer admin -->