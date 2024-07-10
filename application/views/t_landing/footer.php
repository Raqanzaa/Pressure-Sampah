<footer id="footer" class="footer position-relative">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-4 col-md-6 footer-about">
      <a href="<?php echo site_url('c_landing'); ?>" class="logo d-flex align-items-center">
        <span class="sitename">Presure Sampah</span>
      </a>
      <div class="footer-contact pt-3">
        <p>Pemerintah</p>
        <p>Kabupaten Bantul, DIY</p>
        <p class="mt-3"><strong>Phone:</strong> <span>+62 81 391 531 561</span></p>
        <p><strong>Email:</strong> <span>sanurfz@gmail.com</span></p>
      </div>
      <div class="social-links d-flex mt-4">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Regulasi Peraturan</a></li>
        <li><a href="#">Statistik</a></li>
        <li><a href="#">Developer Profiles</a></li>
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
      <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
      <form action="forms/newsletter.php" method="post" class="php-email-form">
        <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
      </form>
    </div>

  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="px-1 sitename">Presure Sampah</strong><span>Manajemen Proyek 2024</span></p>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you've purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
    Designed by <a href="https://bootstrapmade.com/">Kelompok 5</a>
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