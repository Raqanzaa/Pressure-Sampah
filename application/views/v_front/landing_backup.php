
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo site_url('c_landing'); ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?php echo base_url();?>assets/img/logo.svg" alt="">
        <h1 class="sitename">Presure Sampah</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo site_url('c_landing'); ?>#hero" class="">Beranda</a></li>
          <li><a href="<?php echo site_url('c_landing'); ?>#hero-small" class="">About</a></li>
          <li><a href="<?php echo site_url('c_landing'); ?>#regulation">Regulasi Peraturan</a></li>
          <li><a href="<?php echo site_url('c_landing'); ?>#statistic">Statistik</a></li>
          <li><a href="<?php echo site_url('c_landing'); ?>#services">Peta Guwosari</a></li>
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
    
    <!-- Hero Section -->
<section id="hero-small" class="hero section" style="height=100px">
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
          <p data-aos="fade-up" data-aos-delay="100" class="text-dark custom-paragraph">Presur Sampah (Presentase Keberhasilan Daur Ulang Sampah) <span>
            adalah aplikasi untuk melacak dan menilai seberapa efektif daur ulang sampah. Dengan fitur-fitur pencatata berat jenis sampah yang didaur ulang dan presentase daur ulang harian, mingguan, dan bulanan, aplikasi ini membantu pengguna memantau dan meningkatkan praktik daur ulang mereka.
          </span>
          <br></p>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Hero Section -->

<!-- REGULATION SECTION -->
<section id="regulation" class="py-5">
    <div id="carouselExampleDark" class="carousel carousel-light slide" style="background-image: url('<?php echo base_url();?>assets/img/carousel.svg'); background-size: cover; background-position: center;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
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
                                    <a href="" class="btn card-btn w-100">Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Presiden Republik Indonesia Nomor 83 Tahun 2018</h5>
                                    <p class="card-text">Penanganan Sampah Laut.</p>
                                    <a href="" class="btn card-btn w-100">Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 6 Tahun 2022</h5>
                                    <p class="card-text">Sistem Informasi Pengelolaan Sampah Nasional.</p>
                                    <a href="" class="btn card-btn w-100">Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 76 Tahun 2019</h5>
                                    <p class="card-text">Adipura.</p>
                                    <a href="" class="btn card-btn w-100">Unduh</a>
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
                                    <a href="" class="btn card-btn w-100">Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Pemerintah Nomor 81 Tahun 2022</h5>
                                    <p class="card-text">Pengelolaan Sampah Rumah Tangga dan Sampah Sejenis Sampah Rumah Tangga.</p>
                                    <a href="" class="btn card-btn w-100">Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Undang-undang Republik Indonesia Nomor 18 Tahun 2008</h5>
                                    <p class="card-text">Pengelolaan Sampah.</p>
                                    <a href="" class="btn card-btn w-100">Unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="card custom-card align-items-center">
                                <img src="<?php echo base_url();?>assets/img/regulation.svg" class="card-img-top w-75 mt-3" alt="Regulation Image 1">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Peraturan Lingkungan Hidup dan Kehutanan Nomor 14 Tahun 2021</h5>
                                    <p class="card-text">Pengelolaan Sampah Pada Bank Sampah.</p>
                                    <a href="" class="btn card-btn w-100">Unduh</a>
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

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                <div class="faq-content">
                  <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
                <div class="profile mt-auto">
                  <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
                <div class="profile mt-auto">
                  <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
                <div class="profile mt-auto">
                  <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
                <div class="profile mt-auto">
                  <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
                <div class="profile mt-auto">
                  <img src="<?php echo base_url();?>assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p><strong>Guwosari</strong></p>
              <p> Kec. Pajangan, Kabupaten Bantul, Daerah Istimewa Yogyakarta</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>02746461041</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>desa.guwosari@bantulkab.go.id</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31617.619288146845!2d110.28969034135062!3d-7.873877497481937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af8b6f41c8365%3A0x5027a76e3568830!2sGuwosari%2C%20Kec.%20Pajangan%2C%20Kabupaten%20Bantul%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1720009745620!5m2!1sid!2sid" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>
