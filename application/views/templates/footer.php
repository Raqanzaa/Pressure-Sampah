</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <!-- <b>Version</b> 3.2.0 -->
  </div>
  <strong>Copyright &copy; 2024 <a href="https://adminlte.io">Pressure Sampah</a>.</strong> All rights reserved.
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

<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>

<!-- REQUIRED SCRIPTS -->
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE-3.2.0/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<script defer>
document.addEventListener('DOMContentLoaded', function() {
  // Get all nav-link elements
  var navLinks = document.querySelectorAll('.nav-link');

  // Add click event listener to each nav-link
  navLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
      // Prevent default behavior if necessary
      // event.preventDefault();

      // Remove active class from all nav-link elements
      navLinks.forEach(function(link) {
        link.classList.remove('active');
      });

      // Add active class to the clicked nav-link
      this.classList.add('active');
    });
  });

  // Check URL to maintain active class on page reload
  var currentPath = window.location.pathname;
  var foundActive = false;
  navLinks.forEach(function(link) {
    var linkPath = new URL(link.href).pathname;
    if (linkPath === currentPath) {
      navLinks.forEach(function(link) {
        link.classList.remove('active');
      });
      link.classList.add('active');
      foundActive = true;
    }
  });

  // If no nav-link matches the current URL, default to the Dashboard link
  if (!foundActive) {
    navLinks.forEach(function(link) {
      link.classList.remove('active');
    });
    document.querySelector('.nav-link[href="<?php echo base_url();?>c_home"]').classList.add('active');
  }
});
</script>





<!-- SCRIPT FOR CHART -->
<script>
$(document).ready(function() {
  // Get context with jQuery - using jQuery's .get() method.
  var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

  var areaChartData = {
    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label               : 'Sampah Basah',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius         : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label               : 'Sampah Kering',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [65, 59, 80, 81, 56, 55, 40]
      },
    ]
  };

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true, // Display the legend
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  };

  // This will get the first returned node in the jQuery collection.
  new Chart(areaChartCanvas, {
    type: 'line',
    data: areaChartData,
    options: areaChartOptions
  });
});
</script>

</body>
</html>
