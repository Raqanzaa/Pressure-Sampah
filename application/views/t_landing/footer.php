<footer id="footer" class="footer position-relative">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-4 col-md-6 footer-about">
      <a href="<?php echo site_url('landing-page'); ?>" class="logo d-flex align-items-center">
        <span class="sitename">Presure Sampah</span>
      </a>
      <div class="footer-contact pt-3">
        <p>Universitas Alma Ata Yogyakarta</p>
        <p>Jl. Brawijaya No.99, Jadan, Tamantirto, Kec. Kasihan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55183</p>
        <p class="mt-3"><strong>Phone:</strong> <span>(0274) 4342288</span></p>
        <p><strong>Email:</strong> <span>uaa@almaata.ac.id</span></p>
      </div>
      <div class="social-links d-flex mt-4">
        <a href="https://x.com/uaa_jogja" target="_blank"><i class="bi bi-twitter-x"></i></a>
        <a href="https://web.facebook.com/UniversitasAlmaAtaYogyakarta/?locale=id_ID&_rdc=1&_rdr" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/universitas_almaata/" target="_blank"><i class="bi bi-instagram" ></i></a>
        <a href="https://www.linkedin.com/company/universitas-alma-ata-yogyakarta?originalSubdomain=id" target="_blank"><i class="bi bi-linkedin" ></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="#hero">Beranda</a></li>
        <li><a href="#regulation">Regulasi Peraturan</a></li>
        <li><a href="#statistic">Statistik</a></li>
        <li><a href="#artikel">Artikel</a></li>
        <li><a href="#cards">Developer Profiles</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Our Services</h4>
      <ul>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Web Development</a></li>
        <li><a href="#">Product Management</a></li>
        <li><a href="#">Marketing</a></li>
        <li><a href="#">Graphic Design</a></li>
      </ul>
    </div>

    <div class="col-lg-4 col-md-12 footer-newsletter">
    <h4>Presure Sampah</h4>
    <!-- <p>Subscribe to our newsletter and receive the latest news about our products and services!</p> -->
    <div class="flex space-x-1 mt-4">
        <a href="https://wartapendidikanjogja.com/">
            <img src="<?= base_url().'assets/img/warta.png' ?>" alt="Warta Pendidikan Jogja" class="img-responsive" style="width: auto; height: 80px;" target="_blank">
        </a>
        <a href="https://almaata.ac.id/">
            <img src="<?= base_url().'assets/img/uaa.png' ?>" alt="Universitas Alma Ata" class="img-responsive" style="width: auto; height: 80px;" target="_blank">
        </a>
    </div>
</div>


  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="px-1 sitename">Presure Sampah</strong><span>Manajemen Proyek 2024</span></p>
  <div class="credits">
    Designed by <a href="https://bootstrapmade.com/"><strong>Bootstrap</strong></a> Kelompok 5
  </div>
</div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url();?>assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url();?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if ($this->session->flashdata('success')): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '<?php echo $this->session->flashdata('success'); ?>',
                    timer: 3000,
                    showConfirmButton: false,
                    position: 'top-start',
                    toast: true
                });
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?php echo $this->session->flashdata('error'); ?>',
                    timer: 3000,
                    showConfirmButton: false,
                    position: 'top-start',
                    toast: true
                });
            <?php endif; ?>

            <?php if ($this->session->flashdata('validation_errors')): ?>
                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Errors',
                    html: '<?php echo $this->session->flashdata('validation_errors'); ?>',
                    timer: 5000,
                    showConfirmButton: true,
                    position: 'top-start',
                    toast: true
                });
            <?php endif; ?>
        });
    </script>

</body>

</html>