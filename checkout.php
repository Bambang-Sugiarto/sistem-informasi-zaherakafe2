<!-- navbar admin -->
<?php include "navbar_admin.php"; ?>
<!-- end navbar admin -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Checkout</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin.php">Home</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </ol>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-11">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="tampil-pesanan">
              <?php

              $query = mysqli_query($koneksi, "SELECT * FROM tb_cart");
              $jml_total = 0;
              if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                  $total_harga = number_format($row['harga'] * $row['jumlah_pesan']);
                  (int)$jml_total = (int)$jml_total + (int)$total_harga;
              ?>
                  <span><?= $row['nama'] ?>(<?= $row['jumlah_pesan'] ?>)</span>
              <?php
                }
              } else {
                echo "<div class='display-order'><span>Belanja Kosong</span></div>";
              }

              ?>
              <span class="grand-total">Jumlah Pembayaran: Rp.<?= $jml_total; ?>.000,00</span>
            </div>
            <?php
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM tb_login WHERE email ='$email'";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= $row['nama_lengkap'] ?>" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" placeholder="">
                  </div>
            <?php
                }
              }
            }


            ?>
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <input type="text" name="alamat" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>No HP</label>
              <input type="text" name="nohp" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label>Metode Pembayaran</label>
              <select class="select2-single-placeholder form-control" name="metode_bayar" id="select2SinglePlaceholder">
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="Cash On Delivery (COD)">Cash On Delivery (COD)</option>
              </select>
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
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $nohp = $_POST['nohp'];
  $metode_bayar = $_POST['metode_bayar'];

  $cart_query = mysqli_query($koneksi, "SELECT * FROM tb_cart");
  $price_total = 0;
  if (mysqli_num_rows($cart_query) > 0) {
    while ($data = mysqli_fetch_assoc($cart_query)) {
      $product_name[] = $data['nama'] . '(' . $data['jumlah_pesan'] . ')';
      $product_price = number_format($data['harga'] * $data['jumlah_pesan']);
      (int)$price_total += (int)$product_price;
    }
  }

  $total_product = implode(', ', $product_name);
  $insert = mysqli_query($koneksi, "INSERT INTO tb_checkout VALUES(
        NULL,
        '$tanggal',
        '$nama',
        '$email',
        '$alamat',
        '$nohp',
        '$metode_bayar',
        '$total_product',
        '$price_total',
        'Menunggu'
        )");
  if ($cart_query && $insert) {
    echo "<script>alert('Terimakasih Telah Memesan !');document.location='sedangproses_admin.php'</script>";
    $query = "DELETE FROM tb_cart";
    $run = mysqli_query($koneksi, $query);
  } else {
    echo 'Gagal!';
  }
}
?>
<!-- end tambah menu -->