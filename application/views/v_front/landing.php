<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo site_url('c_landing'); ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?php echo base_url();?>assets/img/logo.svg" alt="">
        <h1 class="sitename">Presure Sampah</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo site_url('c_landing'); ?>#hero">Beranda</a></li>
          <li><a href="<?php echo site_url('c_landing'); ?>#regulation">Regulasi Peraturan</a></li>
          <li><a href="<?php echo site_url('c_landing'); ?>#statistic">Statistik</a></li>
          <li><a href="<?php echo site_url('c_landing'); ?>#cards">Developer Profiles</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="#" onclick="showLoginPopup()">Login Admin</a>
    </div>
  </header>

  <main class="main">

  <!-- LOGIN & REGISTER PAGE -->
  <div id="loginPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closeLoginPopup()">&times;</span>
        <div class="w-auto rounded-2xl m-auto bg-slate-900">
            <div class="flex flex-col gap-2 p-8">
                <p class="text-center text-3xl text-gray-300 mb-4">Login</p>
                <?php echo form_open('auth/login'); ?>
                <input type="email" name="email" class="mb-3 bg-slate-900 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-800 text-light" placeholder="Email" required>
                <input type="password" name="password" class="mb-3 bg-slate-900 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-800 text-light" placeholder="Password" required>
                <button type="submit" name="login" class="w-full inline-block cursor-pointer rounded-md bg-gray-700 px-4 py-3.5 text-center text-sm font-semibold uppercase text-white transition duration-200 ease-in-out hover:bg-gray-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 active:scale-95" value="login">Login</button>
                <?php echo form_close(); ?>
                <p class="text-center">atau</p>
                <div class="text-center">
                    <button class="btn btn-secondary w-full" type="button" onclick="showRegisterPopup()">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="registerPopup" class="popup">
    <div class="popup-content">
        <span class="close2" onclick="closeRegisterPopup()">&times;</span>
        <span class="back" onclick="showLoginPopup()">&larr; Back to Login</span>
        <div class="w-auto rounded-2xl m-auto bg-slate-900">
            <div class="flex flex-col gap-2 p-8">
                <p class="text-center text-3xl text-gray-300 mb-4">Register</p>
                <?php echo form_open('auth/register'); ?>
                <input type="text" name="full_name" class="mb-3 bg-slate-900 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-800 text-light" placeholder="Full Name" required>
                <input type="email" name="email" class="mb-3 bg-slate-900 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-800 text-light" placeholder="Email" required>
                <input type="password" name="password" class="mb-3 bg-slate-900 w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-gray-800 text-light" placeholder="Password" required>
                <button type="submit" name="register" class="w-full cursor-pointer rounded-md bg-gray-700 px-4 py-3.5 text-center text-sm font-semibold uppercase text-white transition duration-200 ease-in-out hover:bg-gray-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 active:scale-95" value="register">Register</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
    <!--  END Login & Register Page -->

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="<?php echo base_url();?>assets/img/Section.svg" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
        <img src="<?php echo base_url();?>assets/img/logo.svg" alt="" class="main-logo">
          <h1 data-aos="fade-up" class=""><span>Presure Sampah</span></h1>
          <p data-aos="fade-up" data-aos-delay="100" class="">Presentase Keberhasilan Daur Ulang Sampah<br></p>
        </div>
      </div>

    </section><!-- /Hero Section -->
    
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Presure Sampah</title>
  <style>
    .custom-paragraph {
      max-width: 600px; /* Set maximum width for the paragraph */
      margin: 0 auto;  /* Center align the paragraph */
    }
    .hero {
      height: 100px; /* Correct syntax for height */
    }
  </style>
</head>
<body>
  <!-- Hero Section -->
  <section id="hero-small" class="hero section">
    <div class="container text-center pt-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-5 d-flex justify-content-center align-items-center">
          <img data-aos="fade-right" src="<?php echo base_url();?>assets/img/logo-black.svg" alt="" class="secondary-logo me-4">
          <div>
            <h1 data-aos="fade-up" class=""><span class="text-dark">Presure</span></h1>
            <h1 data-aos="fade-up" class=""><span class="text-dark">Sampah</span></h1>
          </div>
        </div>
        <div class="col-lg-7 d-flex justify-content-center align-items-center">
          <div>
            <p data-aos="fade-up" data-aos-delay="100" class="text-dark custom-paragraph">
              Presur Sampah (Presentase Keberhasilan Daur Ulang Sampah) <span>
              adalah aplikasi untuk melacak dan menilai seberapa efektif daur ulang sampah.
              Dengan fitur-fitur pencatatan berat jenis sampah yang didaur ulang dan presentase daur ulang harian,
              mingguan, dan bulanan, aplikasi ini membantu pengguna memantau dan meningkatkan praktik daur ulang mereka.
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Hero Section -->
</body>
</html>

<!-- REGULATION SECTION -->
<section id="regulation" class="py-5">
    <div id="carouselExampleDark" class="carousel carousel-light slide" style="background-image: url('<?php echo base_url();?>assets/img/carousel.svg'); background-size: cover; background-position: center;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="container py-5" style="padding-right: 5%; padding-left: 5%;">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Pemerintah Nomor 27 Tahun 2020</h5>
                                    <p class="card-text">Pengelolaan Sampah Spesifik.</p>
                                    <a href="<?php echo base_url();?>assets/regulasi/PP Nomor 27 Tahun 2020.pdf" class="btn card-btn w-100" download>Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Presiden Republik Indonesia Nomor 83 Tahun 2018</h5>
                                    <p class="card-text">Penanganan Sampah Laut.</p>
                                    <a href="<?php echo base_url();?>assets/regulasi/Perpres Nomor 83 Tahun 2018.pdf" class="btn card-btn w-100" download>Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 6 Tahun 2022</h5>
                                    <p class="card-text">Sistem Informasi Pengelolaan Sampah Nasional.</p>
                                    <a href="<?php echo base_url();?>assets/regulasi/permen LHK No. 6 tahun 2022.pdf" class="btn card-btn w-100" download>Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 76 Tahun 2019</h5>
                                    <p class="card-text">Adipura.</p>
                                    <a href="<?php echo base_url();?>assets/regulasi/Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 76 Tahun 2019.pdf" class="btn card-btn w-100" download>Unduh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 75 Tahun 2019</h5>
                                    <p class="card-text">Peta Jalan Pengurangan Sampah Oleh Produsen.</p>
                                    <a href="<?php echo base_url();?>assets/regulasi/Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 75 Tahun 2019.pdf" class="btn card-btn w-100" download>Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Pemerintah Nomor 81 Tahun 2022</h5>
                                    <p class="card-text">Pengelolaan Sampah Rumah Tangga dan Sampah Sejenis Sampah Rumah Tangga.</p>
                                    <a href="<?php echo base_url();?>assets/regulasi/Permendagri Nomor 81 Tahun 2022 Tentang Pedoman Penyusunan RKPD 2023.pdf" class="btn card-btn w-100" download>Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Undang-undang Republik Indonesia Nomor 18 Tahun 2008</h5>
                                    <p class="card-text">Pengelolaan Sampah.</p>
                                    <a href="<?php echo base_url();?>assets/regulasi/UU Nomor 18 Tahun 2008.pdf" class="btn card-btn w-100" download>Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Lingkungan Hidup dan Kehutanan Nomor 14 Tahun 2021</h5>
                                    <p class="card-text">Pengelolaan Sampah Pada Bank Sampah.</p>
                                    <a href="<?php echo base_url();?>assets/regulasi/Permen LHK Nomor 14 Tahun 2021-.pdf" class="btn card-btn w-100" download>Unduh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- END REGULATION SECTION -->


<!-- STATISTICS SECTION -->
<section id="statistic" class="statistic section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2 class="">Statistik</h2>
  </div><!-- End Section Title -->

  <!-- Statistics Content -->
  <div class="container">
    <div class="row text-center justify-center" data-aos="fade-up" data-aos-delay="100">
      <!-- Statistik 1 -->
      <!-- <div class="col-lg-4 col-md-6 mb-4">
      <div class="card custom-card custom-card-utama d-flex align-items-center" style="position: relative;">
          <img src="<?php echo base_url();?>assets/img/statistik1.svg" class="custom-statistik w-50 mt-3" alt="Statistik 1">
          <div class="card-body">
            <h1 class="card-title text-left fw-bold" id="stat-1">256</h1>
            <p class="text-left text-grey">UNIT</p>
            <p class="card-text text-left fw-bold">BSI (Bank Sampah Induk)</p>
          </div>
        </div>
      </div> -->
      <!-- Statistik 2 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card custom-card custom-card-utama align-items-center">
          <img src="<?php echo base_url();?>assets/img/statistik2.svg" class="custom-statistik card-img-top w-50 mt-3" alt="Statistik 2">
          <div class="card-body">
            <h1 class="card-title text-left fw-bold" id="stat-1">5</h1>
            <p class="text-left text-grey">UNIT</p>
            <p class="card-text text-left fw-bold">TPS (Tempat Pembuangan Sampah)</p>
          </div>
        </div>
      </div>
      <!-- Statistik 3 -->
      <!-- <div class="col-lg-4 col-md-6 mb-4">
        <div class="card custom-card custom-card-utama align-items-center">
          <img src="<?php echo base_url();?>assets/img/statistik3.svg" class="custom-statistik card-img-top w-50 mt-3" alt="Statistik 3">
          <div class="card-body">
            <h1 class="card-title text-left fw-bold" id="stat-1">4.681</h1>
            <p class="text-left text-grey">NASABAH</p>
            <p class="card-text text-left fw-bold">Lembaga/Rumah Tangga</p>
          </div>
        </div>
      </div> -->
    </div>
    <br>
    <!-- Year Filter -->
    <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
      <div class="col text-center">
        <label for="yearFilter" class="form-label"></label>
        <select class="form-select w-15 d-inline-block" id="yearFilter" style="max-width: 150px;">
          <option value="2022">TAHUN 2022</option>
          <option value="2023">TAHUN 2023</option>
          <option value="2024">TAHUN 2024</option>
        </select>
      </div>
    </div>
    <!-- Additional Statistics -->
    <div class="row text-center" data-aos="fade-up" data-aos-delay="300">
       <!-- Statistik 4 -->
       <div class="col-lg-4 col-md-6 mb-4">
        <div class="card custom-card d-flex align-items-center">
          <!-- <img src="<?php echo base_url();?>assets/img/statistik4.svg" class="custom-statistik-2 mt-3" alt="Icon 1"> -->
          <div class="card-body">
            <h2 class="card-title text-center fw-bold" id="stat-1">13</h2>
            <p class="text-center text-grey">Jenis Sampah</p>
          </div>
        </div>
      </div>
       <!-- Statistik 5 -->
       <div class="col-lg-4 col-md-6 mb-4">
        <div class="card custom-card d-flex align-items-center">
          <!-- <img src="<?php echo base_url();?>assets/img/statistik5.svg" class="custom-statistik-2 mt-3" alt="Icon 1"> -->
          <div class="card-body">
            <h2 class="card-title text-center fw-bold" id="stat-1">137.215,08 Ton</h2>
            <p class="text-center text-grey">Sampah Dikumpulkan</p>
          </div>
        </div>
      </div>
       <!-- Statistik 6 -->
       <div class="col-lg-4 col-md-6 mb-4">
        <div class="card custom-card d-flex align-items-center">
          <!-- <img src="<?php echo base_url();?>assets/img/statistik6.svg" class="custom-statistik-2 mt-3" alt="Icon 1"> -->
          <div class="card-body">
            <h2 class="card-title text-center fw-bold" id="stat-1">2.461,05 Ton</h2>
            <p class="text-center text-grey">Sampah Dimanfaatkan</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Additional Statistics -->
    <div class="row text-center justify-content-center" data-aos="fade-up" data-aos-delay="300">
       <!-- Statistik 7 -->
       <div class="col-lg-4 col-md-6 mb-4">
        <div class="card custom-card d-flex align-items-center">
          <!-- <img src="<?php echo base_url();?>assets/img/statistik7.svg" class="custom-statistik-2 mt-3" alt="Icon 1"> -->
          <div class="card-body">
            <h2 class="card-title text-center fw-bold" id="stat-1">5.313,96 Ton</h2>
            <p class="text-center text-grey">Sampah Didaur Ulang</p>
          </div>
        </div>
      </div>
       <!-- Statistik 8 -->
       <div class="col-lg-4 col-md-6 mb-4">
        <div class="card custom-card d-flex align-items-center">
          <!-- <img src="<?php echo base_url();?>assets/img/statistik8.svg" class="custom-statistik-2 mt-3" alt="Icon 1"> -->
          <div class="card-body">
            <h2 class="card-title text-center fw-bold" id="stat-1">25,61 Ton</h2>
            <p class="text-center text-grey">Residu</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END STATISTICS SECTION -->

<!-- ARTIKEL SECTION -->
<div class="container section-title" data-aos="fade-up">
    <h2 class="">Artikel</h2>
</div><!-- End Section Title -->
<section id="artikel" class="py-3">
    <div class="container">
        <div class="container py-5" style="padding-right: 5%; padding-left: 5%;">
            <div class="row pl-2 pr-2">
                <?php
                // Ambil maksimal 8 artikel terbaru, diurutkan berdasarkan tanggal_publikasi descending
                $counter = 0;
                foreach (array_reverse($artikel) as $a): // Mengambil array terbalik
                    $counter++;
                    if ($counter > 8) break; // Hanya tampilkan maksimal 8 artikel
                ?>
                    <div class="col-lg-3 col-md-6 mb-4 mb-4-custom">
                        <div class="card custom-card shadow-sm" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <img src="<?php echo base_url('assets/img/'.$a['gambar_artikel']); ?>" class="card-img-top" alt="<?php echo $a['judul']; ?>">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $a['judul']; ?></h5>
                                <p class="card-text"><?php echo $a['deskripsi']; ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo date('d F Y', strtotime($a['tanggal_publikasi'])); ?></small></p>
                                <a href="#" class="btn btn-success btn-sm btn-army" data-toggle="modal" data-target="#artikelModal-<?php echo $a['id_artikel']; ?>">Baca Artikel</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="artikelModal-<?php echo $a['id_artikel']; ?>" tabindex="-1" role="dialog" aria-labelledby="artikelModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="artikelModalLabel"><?php echo $a['judul']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo base_url('assets/img/'.$a['gambar_artikel']); ?>" class="img-fluid mb-3" alt="<?php echo $a['judul']; ?>">
                                    <p><?php echo $a['deskripsi']; ?></p>
                                    <p class="text-muted"><?php echo date('d F Y', strtotime($a['tanggal_publikasi'])); ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- END ARTIKEL SECTION -->

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .custom-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
    }

    .custom-card:hover {
        transform: translateY(-5px); /* Menggeser card ke atas saat hover */
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Bayangan lebih kuat saat hover */
    }

    .btn-army {
        background-color: #50B498; /* Ubah warna background menjadi hijau army */
        border-color: #006769; /* Ubah warna border sesuai dengan background */
    }
</style>

<script>
    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function () {
            $('body').css('padding-right', '0');
        });
    });
</script>



<!-- STATISTICS CARDS -->
<section id="cards" class="cards section">
<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
<h2 class="">Developer Profiles</h2>
</div><!-- End Section Title -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Cards</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto px-4 py-8">
    <!-- Profile Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
      <!-- Profile Card 1 (Kiri) -->
      <div class="rounded-xl overflow-hidden relative text-center p-4 group items-center flex flex-col max-w-sm mx-auto hover:shadow-2xl transition-all duration-500 shadow-xl lg:w-80">
        <div class="text-gray-500 group-hover:scale-105 transition-all">
          <svg class="w-20 h-20" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" stroke-linejoin="round" stroke-linecap="round"></path>
          </svg>
        </div>
        <div class="group-hover:pb-10 transition-all duration-500 delay-200">
          <h1 class="font-semibold text-gray-700 text-lg">Ahmad Rozaq U.</h1>
          <p class="text-gray-500 text-sm">@a.rzq_u</p>
        </div>
        <div class="flex items-center transition-all duration-500 delay-200 group-hover:bottom-3 -bottom-full absolute gap-2 justify-evenly w-full">
          <div class="flex gap-3 text-2xl bg-gray-700 text-white p-1 hover:p-2 transition-all duration-500 delay-200 rounded-full shadow-sm">
            <a href="#" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" fill="currentColor" viewBox="0 0 1024 1024">
                <path d="M511.6 76.3C264.3 76.2 64 276.4 64 523.5 64 718.9 189.3 885 363.8 946c23.5 5.9 19.9-10.8 19.9-22.2v-77.5c-135.7 15.9-141.2-73.9-150.3-88.9C215 726 171.5 718 184.5 703c30.9-15.9 62.4 4 98.9 57.9 26.4 39.1 77.9 32.5 104 26 5.7-23.5 17.9-44.5 34.7-60.8-140.6-25.2-199.2-111-199.2-213 0-49.5 16.3-95 48.3-131.7-20.4-60.5 1.9-112.3 4.9-120 58.1-5.2 118.5 41.6 123.2 45.3 33-8.9 70.7-13.6 112.9-13.6 42.4 0 80.2 4.9 113.5 13.9 11.3-8.6 67.3-48.8 121.3-43.9 2.9 7.7 24.7 58.3 5.5 118 32.4 36.8 48.9 82.7 48.9 132.3 0 102.2-59 188.1-200 212.9a127.5 127.5 0 0138.1 91v112.5c.8 9 0 17.9 15 17.9 177.1-59.7 304.6-227 304.6-424.1 0-247.2-200.4-447.3-447.5-447.3z"></path>
              </svg>
            </a>
            <a href="https://www.instagram.com/a.rzq_u" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" viewBox="0 0 16 16" xmlns="socialSvg instagramSvg" fill="currentColor">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
              </svg>
            </a>
            <a href="https://www.linkedin.com/in/ahmad-rozaq-ubaidillah-044892278" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" fill="currentColor" viewBox="0 0 960 1000">
                <path d="M480 20c133.333 0 246.667 46.667 340 140s140 206.667 140 340c0 132-46.667 245-140 339S613.333 980 480 980c-132 0-245-47-339-141S0 632 0 500c0-133.333 47-246.667 141-340S348 20 480 20M362 698V386h-96v312h96m-48-352c34.667 0 52-16 52-48s-17.333-48-52-48c-14.667 0-27 4.667-37 14s-15 20.667-15 34c0 32 17.333 48 52 48m404 352V514c0-44-10.333-77.667-31-101s-47.667-35-81-35c-44 0-76 16.667-96 50h-2l-6-42h-84c1.333 18.667 2 52 2 100v212h98V518c0-12 1.333-20 4-24 8-25.333 24.667-38 50-38 32 0 48 22.667 48 68v174h98"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Profile Card 2 (Tengah) -->
      <div class="rounded-xl overflow-hidden relative text-center p-4 group items-center flex flex-col max-w-sm mx-auto hover:shadow-2xl transition-all duration-500 shadow-xl lg:w-80">
        <div class="text-gray-500 group-hover:scale-105 transition-all">
          <svg class="w-20 h-20" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" stroke-linejoin="round" stroke-linecap="round"></path>
          </svg>
        </div>
        <div class="group-hover:pb-10 transition-all duration-500 delay-200">
          <h1 class="font-semibold text-gray-700 text-lg">Nur Ikhsan M. H.</h1>
          <p class="text-gray-500 text-sm">@sanurfz</p>
        </div>
        <div class="flex items-center transition-all duration-500 delay-200 group-hover:bottom-3 -bottom-full absolute gap-2 justify-evenly w-full">
          <div class="flex gap-3 text-2xl bg-gray-700 text-white p-1 hover:p-2 transition-all duration-500 delay-200 rounded-full shadow-sm">
            <a href="#" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" fill="currentColor" viewBox="0 0 1024 1024">
                <path d="M511.6 76.3C264.3 76.2 64 276.4 64 523.5 64 718.9 189.3 885 363.8 946c23.5 5.9 19.9-10.8 19.9-22.2v-77.5c-135.7 15.9-141.2-73.9-150.3-88.9C215 726 171.5 718 184.5 703c30.9-15.9 62.4 4 98.9 57.9 26.4 39.1 77.9 32.5 104 26 5.7-23.5 17.9-44.5 34.7-60.8-140.6-25.2-199.2-111-199.2-213 0-49.5 16.3-95 48.3-131.7-20.4-60.5 1.9-112.3 4.9-120 58.1-5.2 118.5 41.6 123.2 45.3 33-8.9 70.7-13.6 112.9-13.6 42.4 0 80.2 4.9 113.5 13.9 11.3-8.6 67.3-48.8 121.3-43.9 2.9 7.7 24.7 58.3 5.5 118 32.4 36.8 48.9 82.7 48.9 132.3 0 102.2-59 188.1-200 212.9a127.5 127.5 0 0138.1 91v112.5c.8 9 0 17.9 15 17.9 177.1-59.7 304.6-227 304.6-424.1 0-247.2-200.4-447.3-447.5-447.3z"></path>
              </svg>
            </a>
            <a href="https://www.instagram.com/sanurfz" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" viewBox="0 0 16 16" xmlns="socialSvg instagramSvg" fill="currentColor">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
              </svg>
            </a>
            <a href="https://www.linkedin.com/in/sanurfz" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" fill="currentColor" viewBox="0 0 960 1000">
                <path d="M480 20c133.333 0 246.667 46.667 340 140s140 206.667 140 340c0 132-46.667 245-140 339S613.333 980 480 980c-132 0-245-47-339-141S0 632 0 500c0-133.333 47-246.667 141-340S348 20 480 20M362 698V386h-96v312h96m-48-352c34.667 0 52-16 52-48s-17.333-48-52-48c-14.667 0-27 4.667-37 14s-15 20.667-15 34c0 32 17.333 48 52 48m404 352V514c0-44-10.333-77.667-31-101s-47.667-35-81-35c-44 0-76 16.667-96 50h-2l-6-42h-84c1.333 18.667 2 52 2 100v212h98V518c0-12 1.333-20 4-24 8-25.333 24.667-38 50-38 32 0 48 22.667 48 68v174h98"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Profile Card 3 (Kanan) -->
      <div class="rounded-xl overflow-hidden relative text-center p-4 group items-center flex flex-col max-w-sm mx-auto hover:shadow-2xl transition-all duration-500 shadow-xl lg:w-80">
        <div class="text-gray-500 group-hover:scale-105 transition-all">
          <svg class="w-20 h-20" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" stroke-linejoin="round" stroke-linecap="round"></path>
          </svg>
        </div>
        <div class="group-hover:pb-10 transition-all duration-500 delay-200">
          <h1 class="font-semibold text-gray-700 text-lg">Vina Dhamayanti</h1>
          <p class="text-gray-500 text-sm">@dhamayantivina</p>
        </div>
        <div class="flex items-center transition-all duration-500 delay-200 group-hover:bottom-3 -bottom-full absolute gap-2 justify-evenly w-full">
          <div class="flex gap-3 text-2xl bg-gray-700 text-white p-1 hover:p-2 transition-all duration-500 delay-200 rounded-full shadow-sm">
            <a href="#" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" fill="currentColor" viewBox="0 0 1024 1024">
                <path d="M511.6 76.3C264.3 76.2 64 276.4 64 523.5 64 718.9 189.3 885 363.8 946c23.5 5.9 19.9-10.8 19.9-22.2v-77.5c-135.7 15.9-141.2-73.9-150.3-88.9C215 726 171.5 718 184.5 703c30.9-15.9 62.4 4 98.9 57.9 26.4 39.1 77.9 32.5 104 26 5.7-23.5 17.9-44.5 34.7-60.8-140.6-25.2-199.2-111-199.2-213 0-49.5 16.3-95 48.3-131.7-20.4-60.5 1.9-112.3 4.9-120 58.1-5.2 118.5 41.6 123.2 45.3 33-8.9 70.7-13.6 112.9-13.6 42.4 0 80.2 4.9 113.5 13.9 11.3-8.6 67.3-48.8 121.3-43.9 2.9 7.7 24.7 58.3 5.5 118 32.4 36.8 48.9 82.7 48.9 132.3 0 102.2-59 188.1-200 212.9a127.5 127.5 0 0138.1 91v112.5c.8 9 0 17.9 15 17.9 177.1-59.7 304.6-227 304.6-424.1 0-247.2-200.4-447.3-447.5-447.3z"></path>
              </svg>
            </a>
            <a href="https://www.instagram.com/dhamayantivina" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" viewBox="0 0 16 16" xmlns="socialSvg instagramSvg" fill="currentColor">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
              </svg>
            </a>
            <a href="https://www.linkedin.com/in/vinadhamayanti" class="hover:scale-110 transition-all duration-500 delay-200">
              <svg width="1em" height="1em" fill="currentColor" viewBox="0 0 960 1000">
                <path d="M480 20c133.333 0 246.667 46.667 340 140s140 206.667 140 340c0 132-46.667 245-140 339S613.333 980 480 980c-132 0-245-47-339-141S0 632 0 500c0-133.333 47-246.667 141-340S348 20 480 20M362 698V386h-96v312h96m-48-352c34.667 0 52-16 52-48s-17.333-48-52-48c-14.667 0-27 4.667-37 14s-15 20.667-15 34c0 32 17.333 48 52 48m404 352V514c0-44-10.333-77.667-31-101s-47.667-35-81-35c-44 0-76 16.667-96 50h-2l-6-42h-84c1.333 18.667 2 52 2 100v212h98V518c0-12 1.333-20 4-24 8-25.333 24.667-38 50-38 32 0 48 22.667 48 68v174h98"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- END STATISTICS CARDS -->

</main>
