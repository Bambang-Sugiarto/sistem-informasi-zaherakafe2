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
          <h6 class="m-0 font-weight-bold text-primary text-center">Grafik Pemesan (Makanan, Minuman dan Karaoke)</h6>
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
          <h6 class="m-0 font-weight-bold text-primary text-center">Statistik Pemesan (Makanan, Minuman dan Karaoke)</h6>
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
            $sql_hari_ini = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_checkout WHERE tanggal LIKE '%$tgl_sekarang%'");
            $pengunjung_hari_ini = mysqli_fetch_array($sql_hari_ini);

            $sql_kemarin = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_checkout WHERE tanggal LIKE '%$kemarin%'");
            $pengunjung_kemarin = mysqli_fetch_array($sql_kemarin);

            $sql_seminggu = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_checkout WHERE tanggal BETWEEN '$seminggu' AND '$sekarang'");
            $pengunjung_seminggu = mysqli_fetch_array($sql_seminggu);

            $sql_sebulan = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_checkout WHERE month(tanggal) BETWEEN '$sebulan' AND '$setahun'");
            $pengunjung_sebulan = mysqli_fetch_array($sql_sebulan);

            $sql_setahun = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_checkout WHERE year(tanggal) = '$setahun'");
            $pengunjung_setahun = mysqli_fetch_array($sql_setahun);

            $sql_seluruh = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_checkout");
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

  <!-- tabel m&m -->
  <div class="row">
    <div class="col-xl-12 col-lg-11 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Invoice Pemesan (Makanan, Minuman dan Karaoke)</h6>
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
              $query = "SELECT * FROM tb_checkout
                        WHERE status = 'Selesai' ";
              $sql = mysqli_query($koneksi, $query);
              $jml_total = 0;
              $no = 1;
              while ($data = mysqli_fetch_array($sql)) {
                $jml_total += $data['total_bayar'];
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data["tanggal"]; ?></td>
                  <td><?= $data["nama"]; ?></td>
                  <td><?= $data["nohp"]; ?></td>
                  <td>Rp <?= $data["total_bayar"]; ?>.000,00</td>
                  <td><span class="badge badge-success"><?= $data["status"]; ?></span></td>
                </tr>
              <?php } ?>

            </tbody>
            <thead class="thead-light">
              <tr>
                <th colspan="4">Jumlah Pendapatan</th>
                <th>Rp <?= $jml_total; ?>.000,00</th>
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

