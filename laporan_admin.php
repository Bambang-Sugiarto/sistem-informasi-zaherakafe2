<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
  </div>
  <!-- chart bar m&m-->
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Grafik Pemesan Makanan & Minuman</h6>
        </div>
        <div class="card-body">
          <div class="chart-bar">
            <canvas id="outbound"></canvas>
          </div>
          <hr>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card shadow mb-4 ml-1">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Statistik Pemesan Makanan & Minuman</h6>
        </div>
        <div class="card-body">
          <div class="chart-pie pt-4">
            <?php
            $tgl_sekarang = date('Y-m-d');
            $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
            $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekarang)));
            $sekarang = date('Y-m-d h:i:s');
            $sebulan = date('m');
            $setahun = date('Y');
            $sql_hari_ini = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_pesanan WHERE tanggal LIKE '%$tgl_sekarang%'");
            $pengunjung_hari_ini = mysqli_fetch_array($sql_hari_ini);

            $sql_kemarin = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_pesanan WHERE tanggal LIKE '%$kemarin%'");
            $pengunjung_kemarin = mysqli_fetch_array($sql_kemarin);

            $sql_seminggu = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_pesanan WHERE tanggal BETWEEN '$seminggu' AND '$sekarang'");
            $pengunjung_seminggu = mysqli_fetch_array($sql_seminggu);

            $sql_sebulan = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_pesanan WHERE month(tanggal) BETWEEN '$sebulan' AND '$setahun'");
            $pengunjung_sebulan = mysqli_fetch_array($sql_sebulan);

            $sql_setahun = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_pesanan WHERE year(tanggal) = '$setahun'");
            $pengunjung_setahun = mysqli_fetch_array($sql_setahun);

            $sql_seluruh = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_pesanan");
            $pengunjung_seluruh = mysqli_fetch_array($sql_seluruh);

            ?>
            <table class="table table-bordered">
              <tr>
                <td>Hari ini</td>
                <td>
                  <?= $pengunjung_hari_ini[0] ?>
                </td>
              </tr>
              <tr>

                <td>Kemarin</td>
                <td>
                  <?= $pengunjung_kemarin[0] ?>
                </td>
              </tr>
              <tr>
                <td>Minggu Ini</td>
                <td>
                  <?= $pengunjung_seminggu[0] ?>
                </td>
              </tr>
              <tr>
                <td>Bulan Ini</td>
                <td>
                  <?= $pengunjung_sebulan[0] ?>
                </td>
              </tr>
              <tr>
                <td>Tahun Ini</td>
                <td>
                  <?= $pengunjung_setahun[0] ?>
                </td>
              </tr>
            </table>
          </div>
          <hr>
          <div class="space mb-3">
            <strong>Total Pengunjung : <?= $pengunjung_seluruh[0] ?> </strong>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end chart bar m&m-->

  <!-- Grafik Karaoke -->
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Grafik Pemesan Karaoke</h6>
        </div>
        <div class="card-body">
          <div class="chart-bar">
            <canvas id="karaoke_chart"></canvas>
          </div>
          <hr>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card shadow mb-4 ml-1">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">Statistik Pemesan Karaoke</h6>
        </div>
        <div class="card-body">
          <div class="chart-pie pt-4">
            <?php
            $tgl_sekarang = date('Y-m-d');
            $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
            $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekarang)));
            $sekarang = date('Y-m-d h:i:s');
            $sebulan = date('m');
            $setahun = date('Y');
            $sql_hari_ini = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_karaoke WHERE tanggal LIKE '%$tgl_sekarang%'");
            $pengunjung_hari_ini_karaoke = mysqli_fetch_array($sql_hari_ini);

            $sql_kemarin = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_karaoke WHERE tanggal LIKE '%$kemarin%'");
            $pengunjung_kemarin_karaoke = mysqli_fetch_array($sql_kemarin);

            $sql_seminggu = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_karaoke WHERE tanggal BETWEEN '$seminggu' AND '$sekarang'");
            $pengunjung_seminggu_karaoke = mysqli_fetch_array($sql_seminggu);

            $sql_sebulan = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_karaoke WHERE month(tanggal) BETWEEN '$sebulan' AND '$setahun'");
            $pengunjung_sebulan_karaoke = mysqli_fetch_array($sql_sebulan);

            $sql_setahun = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_karaoke WHERE year(tanggal) = '$setahun'");
            $pengunjung_setahun_karaoke = mysqli_fetch_array($sql_setahun);

            $sql_seluruh = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_karaoke");
            $pengunjung_seluruh_karaoke = mysqli_fetch_array($sql_seluruh);

            ?>
            <table class="table table-bordered">
              <tr>
                <td>Hari ini</td>
                <td>
                  <?= $pengunjung_hari_ini_karaoke[0] ?>
                </td>
              </tr>
              <tr>

                <td>Kemarin</td>
                <td>
                  <?= $pengunjung_kemarin_karaoke[0] ?>
                </td>
              </tr>
              <tr>
                <td>Minggu Ini</td>
                <td>
                  <?= $pengunjung_seminggu_karaoke[0] ?>
                </td>
              </tr>
              <tr>
                <td>Bulan Ini</td>
                <td>
                  <?= $pengunjung_sebulan_karaoke[0] ?>
                </td>
              </tr>
              <tr>
                <td>Tahun Ini</td>
                <td>
                  <?= $pengunjung_setahun_karaoke[0] ?>
                </td>
              </tr>
            </table>
          </div>
          <hr>
          <div class="space mb-3">
            <strong>Total Pengunjung : <?= $pengunjung_seluruh_karaoke[0] ?> </strong>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Grafik Karaoke -->

  <!-- tabel m&m -->
  <div class="row">
    <div class="col-xl-12 col-lg-11 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Invoice Pemesan Makanan & Minuman</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush text-center">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>No HP / WA</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $query = "SELECT nama, tanggal, nohp, status,
                        (harga_makanan * jml_makanan) + (harga_minuman * jml_minuman) as total FROM tb_pesanan
                        INNER JOIN tb_makanan ON tb_pesanan.id_makanan = tb_makanan.id_makanan 
                        INNER JOIN tb_minuman ON tb_pesanan.id_minuman = tb_minuman.id_minuman
                        WHERE status = 'Selesai' ";
              $sql = mysqli_query($koneksi, $query);
              $jml_total = 0;
              $no = 1;
              while ($data = mysqli_fetch_array($sql)) {
                $jml_total += $data['total'];
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data["tanggal"]; ?></td>
                  <td><?= $data["nama"]; ?></td>
                  <td><?= $data["nohp"]; ?></td>
                  <td><?= "Rp " . number_format($data["total"], 2, ',', '.'); ?></td>
                  <td><span class="badge badge-success"><?= $data["status"]; ?></span></td>
                </tr>
              <?php } ?>

            </tbody>
            <thead class="thead-light">
              <tr>
                <th colspan="4">Jumlah Pendapatan</th>
                <th><?= "Rp " . number_format($jml_total, 2, ',', '.'); ?></th>
                <th></th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
  <!-- end tabel m&m -->

  <!-- tabel karaoke -->
  <div class="row">
    <div class="col-xl-12 col-lg-11 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Invoice Pemesan Karaoke</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush text-center">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>No HP / WA</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $query = "SELECT nama, tanggal, nohp,jml_lagu, harga,status, (harga * jml_lagu) AS total FROM tb_karaoke WHERE status='Selesai'";
              $sql = mysqli_query($koneksi, $query);
              $jml_total = 0;
              $no = 1;
              while ($data = mysqli_fetch_array($sql)) {
                $jml_total += $data['total'];
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data["tanggal"]; ?></td>
                  <td><?= $data["nama"]; ?></td>
                  <td><?= $data["nohp"]; ?></td>
                  <td><?= "Rp " . number_format($data["total"], 2, ',', '.'); ?></td>
                  <td><span class="badge badge-success"><?= $data["status"]; ?></span></td>
                </tr>
              <?php } ?>

            </tbody>
            <thead class="thead-light">
              <tr>
                <th colspan="4">Jumlah Pendapatan</th>
                <th><?= "Rp " . number_format($jml_total, 2, ',', '.'); ?></th>
                <th></th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>
  <!-- end tabel karaoke -->
</div>
<!--End Container Fluid-->

<!-- footer admin -->
<?php include "footer_admin.php"; ?>
<!-- end footer admin -->

<!-- grafik m&m -->
<script>
  var ctx = document.getElementById("outbound").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Hari Ini', 'Kemarin', 'Minggu Ini', 'Bulan Ini', 'Tahun Ini'],
      datasets: [{
        label: 'Total',
        data: [<?= $pengunjung_hari_ini[0] ?>, <?= $pengunjung_kemarin[0] ?>, <?= $pengunjung_seminggu[0] ?>, <?= $pengunjung_sebulan[0] ?>, <?= $pengunjung_setahun[0] ?>],
        backgroundColor: "#4e73df",
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 6
          },
          maxBarThickness: 25,
        }],

      }
    }
  });
</script>
<!-- end grafik m&m -->

<!-- grafik karaoke-->
<script>
  var ctx = document.getElementById("karaoke_chart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Hari Ini', 'Kemarin', 'Minggu Ini', 'Bulan Ini', 'Tahun Ini'],
      datasets: [{
        label: 'Total',
        data: [<?= $pengunjung_hari_ini_karaoke[0] ?>, <?= $pengunjung_kemarin_karaoke[0] ?>, <?= $pengunjung_seminggu_karaoke[0] ?>, <?= $pengunjung_sebulan_karaoke[0] ?>, <?= $pengunjung_setahun_karaoke[0] ?>],
        backgroundColor: "#4e73df",
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 6
          },
          maxBarThickness: 25,
        }],

      }
    }
  });
</script>
<!-- end grafik karaoke -->