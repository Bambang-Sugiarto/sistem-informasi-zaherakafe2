<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zahera Kafe 2</title>

  <!-- - favicon -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- - custom css link -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- - google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Rubik:wght@400;500;600;700&family=Shadows+Into+Light&display=swap" rel="stylesheet">

  <!-- - preload images -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.png" media="min-width(768px)">
  <link rel="preload" as="image" href="./assets/images/hero-banner-bg.png" media="min-width(768px)">
  <link rel="preload" as="image" href="./assets/images/hero-bg.jpg">

</head>

<body id="top">

  <!-- - #HEADER -->

  <header class="header" data-header="data-header">
    <div class="container">

      <h1>
        <a href="#" class="logo">Zahera Kafe 2<span class="span">.</span></a>
      </h1>

      <nav class="navbar" data-navbar="data-navbar">
        <ul class="navbar-list">

          <li class="nav-item">
            <a href="#home" class="navbar-link" data-nav-link="data-nav-link">Beranda</a>
          </li>

          <li class="nav-item">
            <a href="#food-menu" class="navbar-link" data-nav-link="data-nav-link">Minuman</a>
          </li>

          <li class="nav-item">
            <a href="#blog" class="navbar-link" data-nav-link="data-nav-link">Makanan</a>
          </li>

          <li class="nav-item">
            <a href="#karaoke" class="navbar-link" data-nav-link="data-nav-link">Karaoke</a>
          </li>

          <li class="nav-item">
            <a href="#footer" class="navbar-link" data-nav-link="data-nav-link">Tentang Kami</a>
          </li>

        </ul>
      </nav>

      <div class="header-btn-group">

        <a href="login.php"><button class="btn btn-hover">Login</button></a>

        <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn="data-menu-toggle-btn">
          <span class="line top"></span>
          <span class="line middle"></span>
          <span class="line bottom"></span>
        </button>
      </div>

    </div>
  </header>

  <!-- - #SEARCH BOX -->

  <div class="search-container" data-search-container="data-search-container">

    <div class="search-box">
      <input type="search" name="search" aria-label="Search here" placeholder="Type keywords here..." class="search-input">

      <button class="search-submit" aria-label="Submit search" data-search-submit-btn="data-search-submit-btn">
        <ion-icon name="search-outline"></ion-icon>
      </button>
    </div>

    <button class="search-close-btn" aria-label="Cancel search" data-search-close-btn="data-search-close-btn"></button>

  </div>

  <main>
    <article>

      <!-- - #HERO -->

      <section class="hero" id="home" style="background-image: url('./assets/images/hero-bg.jpg')">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Zahera Kafe 2</p>

            <h2 class="h1 hero-title">Njajan Puas Karaokepun Mantap !</h2>

            <p class="hero-text">Zahera Kafe 2 merupakan tempat tongkrongan untuk semua kalangan sekaligus tempat karaoke yang kekinian dan instagrameble</p>

            <button onclick="window.location.href='login.php'" class="btn">Pesan Sekarang !</button>

          </div>

          <!-- <figure class="hero-banner">
            <img src="./assets/images/hero-banner-bg.png" width="820" height="716" alt="" aria-hidden="true" class="w-100 hero-img-bg">
            
            <img src="./assets/images/hero-banner.png" width="700" height="637" loading="lazy" alt="Burger" class="w-100 hero-img">
          </figure> -->

        </div>
      </section>

      <!-- - #PROMO -->
      <section class="section food-menu" style="margin-top: -10px;" id="food-menu">
        <div class="container">

          <h2 class="h2 section-title">
            Menu
            <span class="span">Minuman</span>
          </h2>
          <p class="section-text">
            Berikut ini merupakan menu minuman yang ada di zahera kafe 2
          </p>
          <br>
          <ul class="food-menu-list">
            <?php
            include "koneksi.php";
            $query = "SELECT * FROM tb_minuman";
            $sql = mysqli_query($koneksi, $query);
            $no = 1;
            while ($data = mysqli_fetch_array($sql)) { ?>
              <li>
                <div class="food-menu-card">
                  <div class="card-banner">
                    <div class="badge"><?= $no++; ?></div>
                    <img src="upload/<?= $data['gmb_minuman']; ?>" width="300" height="300" loading="lazy" alt="Fried Chicken Unlimited" class="w-100">
                    <!-- <div class="badge">-15%</div> -->
                    <a href="login.php"><button class="btn food-menu-btn">Order Now</button></a>
                  </div>
                  <div class="wrapper">
                  </div>
                  <h3 class="h3 card-title"><?= $data['nama_minuman'] ?></h3>
                  <div class="price-wrapper">
                    <p class="price-text">Harga:</p>
                    <data class="price">RP. <?= $data['harga_minuman'] ?></data>
                  </div>

                </div>
              </li>
            <?php } ?>
          </ul>

        </div>
      </section>

      <section class="section section-divider white blog" style="margin-top: -150px;" id="blog">
        <div class="container">
          <h2 class="h2 section-title">
            Menu
            <span class="span">Makanan</span>
          </h2>
          <p class="section-text">
            Berikut ini merupakan menu makanan yang ada di zahera kafe 2
          </p>
          <br>
          <ul class="blog-list">
            <?php
            include "koneksi.php";
            $query = "SELECT * FROM tb_makanan";
            $sql = mysqli_query($koneksi, $query);
            $no = 1;
            while ($data = mysqli_fetch_array($sql)) { ?>
              <li>
                <div class="blog-card">
                  <div class="card-banner">
                    <img src="upload/<?= $data['gmb_makanan']; ?>" width="600" height="390" loading="lazy" alt="What Do You Think About Cheese Pizza Recipes?" class="w-100">
                    <div class="badge"><?= $no++; ?></div>
                  </div>
                  <div class="card-content">
                    <div class="card-meta-wrapper">
                    </div>
                    <h3 class="h3">
                      <a href="#" class="card-title"><?= $data['nama_makanan']; ?></a>
                    </h3>
                    <p class="card-text" style="color: orange;">
                      RP. <?= $data['harga_makanan'] ?>
                    </p>
                    <a href="login.php" class="btn-link">
                      <span>Pesan Sekarang!</span>
                      <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>
                  </div>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </section>


      <!-- - #ABOUT -->
      <!-- - #CTA -->

      <section class="section section-divider white cta" style="background-image: url('./assets/images/hero-bg.jpg')">
        <div class="container">

          <div class="cta-content">

            <h2 class="h2 section-title">
              Menu Spesial
              <span class="span">Pisang Plenets</span>
            </h2>
            <p class="section-text">
              Pisang Plenets adalah pisang yang diolah dengan cara dipenyet dan diberikan berbagai macam toping sesuai selera.
            </p>
            <a href="login.php"><button class="btn btn-hover">Pesan Sekarang!</button></a>
          </div>
          <figure class="cta-banner">
            <img src="assets/images/pisang.png" width="700" style="margin-top: -90px; margin-left: -50px;" height="637" loading="lazy" alt="Burger" class="w-100 cta-img">

          </figure>

        </div>
      </section>

      <!-- - #DELIVERY -->

      <section class="section section-divider gray delivery" id="karaoke">
        <div class="container">

          <div class="delivery-content">

            <h2 class="h2 section-title">
              Karaoke
              <span class="span">Time</span>
            </h2>

            <p class="section-text">
              Zahera Kafe 2 tidak hanya tempat tongkrongan biasa namun juga terdapat tempat karaoke yang membuat nongkrong jadi semakin nikmat.
            </p>

            <a href="login.php"><button class="btn btn-hover">Pesan Karaoke!</button></a>
          </div>

          <figure class="delivery-banner">
            <img src="./assets/images/delivery-banner-bg.png" width="700" height="602" loading="lazy" alt="clouds" class="w-100">

            <img src="./assets/images/mic.png" width="500" height="380" loading="lazy" alt="delivery boy" class="w-100 delivery-img" data-delivery-boy="data-delivery-boy">
          </figure>

        </div>
      </section>

      <!-- - #TESTIMONIALS -->

      <section class="section section-divider white testi">
        <div class="container">

          <a href=""><p class="section-subtitle">Tambahkan Review</p></a>

          <h2 class="h2 section-title">
            Testimoni
            <span class="span">Pelanggan</span>
          </h2>

          <p class="section-text">
            Berikut ini merupakan review pelanggan yang pernah berkunjung ke zahera kafe 2
          </p>

          <ul class="testi-list has-scrollbar">
            <?php
            include "koneksi.php";
            $query = "SELECT * FROM tb_review";
            $sql = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_array($sql)) { ?>
              <li class="testi-item">
                <div class="testi-card">

                  <div class="profile-wrapper">

                    <figure class="avatar">
                      <img src="./assets/images/avatar-1.jpg" width="80" height="80" loading="lazy" alt="Robert William">
                    </figure>

                    <div>
                      <h3 class="h4 testi-name"><?= $data['nama'] ?></h3>

                      <p class="testi-title"><?= $data['email'] ?></p>
                    </div>

                  </div>

                  <blockquote class="testi-text">
                    <?= $data['deskripsi'] ?>
                  </blockquote>

                  <div class="rating-wrapper">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                </div>
              </li>

            <?php
            }
            ?>


          </ul>

        </div>
      </section>

      <!-- - #BANNER -->

      <section class="section section-divider gray banner">
        <div class="container">
          <h2 class="h2 section-title text-center">
            Foto
            <span class="span">Dokumentasi</span>
          </h2>
          
          <br>
          <ul class="banner-list">

            <li class="banner-item banner-lg">
              <div class="banner-card">

                <img src="./assets/images/1.jpeg" width="550" height="450" loading="lazy" alt="Discount For Delicious Tasty Burgers!" class="banner-img">


              </div>
            </li>

            <li class="banner-item banner-sm">
              <div class="banner-card">

                <img src="./assets/images/2.jpeg" width="550" height="465" loading="lazy" alt="Delicious Pizza" class="banner-img">

              
            </li>

            <li class="banner-item banner-sm">
              <div class="banner-card">

                <img src="./assets/images/3.jpeg" width="550" height="465" loading="lazy" alt="American Burgers" class="banner-img">

            </li>

            <li class="banner-item banner-md">
              <div class="banner-card">

                <img src="./assets/images/4.jpeg" width="550" height="220" loading="lazy" alt="Tasty Buzzed Pizza" class="banner-img">

               

              </div>
            </li>

          </ul>

        </div>
      </section>

      <!-- - #BLOG -->


    </article>
  </main>

  <!-- - #FOOTER -->

  <footer class="footer" id="footer">

    <div class="footer-top" style="background-image: url('./assets/images/footer-illustration.png')">
      <div class="container">

        <div class="footer-brand">

          <a href="" class="logo">Zahera Kafe 2<span class="span">.</span></a>

          <p class="footer-text">
            Zahera Kafe 2 merupakan tempat tongkrongan untuk semua kalangan sekaligus tempat karaoke yang kekinian dan instagrameble
          </p>

          

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Informasi Kontak</p>
          </li>

          <li>
            <p class="footer-list-item">0822-2820-0156</p>
          </li>

          <li>
            <p class="footer-list-item">zaherakafe@gmail.com</p>
          </li>
          <li>
            <address class="footer-list-item">Jl. Cut Nyak Dien No.63, Jumumbang, Pagongan, Kec. Dukuhturi, Kabupaten Tegal, Jawa Tengah 52192</address>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Jam Operasional</p>
          </li>

          <li>
            <p class="footer-list-item">Senin-Minggu: 09:00-23:30</p>
          </li>

          <li>
            <p class="footer-list-item">Libur: Hari Raya Lebaran</p>
          </li>


        </ul>



      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <p class="copyright-text">
          &copy; 2022
          <a href="#" class="copyright-link">ZaheraKafe2</a>
          All Rights Reserved.
        </p>
      </div>
    </div>

  </footer>

  <!-- - #BACK TO TOP -->

  <a href="#top" class="back-top-btn" aria-label="Back to top" data-back-top-btn="data-back-top-btn">
    <ion-icon name="chevron-up"></ion-icon>
  </a>

  <!-- - custom js link -->
  <script src="./assets/js/script.js" defer="defer"></script>

  <!-- - ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="nomodule" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>