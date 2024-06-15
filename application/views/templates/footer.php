</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!-- <b>Version</b> 3.2.0 -->
    </div>
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Pessure Sampah</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/dist/js/demo.js"></script> -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var navLinks = document.querySelectorAll('.nav-item .nav-link');

    // Add 'active' class to the current link and remove it from others
    navLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            navLinks.forEach(function(navLink) {
                navLink.classList.remove('active');
            });
            this.classList.add('active');
        });
    });

    // Set 'active' class based on the current URL
    var currentPath = window.location.pathname;
    navLinks.forEach(function(link) {
        if (link.href.includes(currentPath)) {
            link.classList.add('active');
        }
    });
});
</script>

</body>
</html>