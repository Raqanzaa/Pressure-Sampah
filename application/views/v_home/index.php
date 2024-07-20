<!-- Content Header (Page header) -->
<section class="content-header">
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-truck"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah TPS</span>
            <span class="info-box-number"><?php echo $jumlah_tps; ?> <small>tps</small></span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Sampah</span>
            <span class="info-box-number"><?php echo number_format($total_sampah, 0, ',', '.'); ?> <small>kg</small></span>
          </div>
        </div>
      </div>

      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-recycle"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Sampah Terdaur Ulang</span>
            <span class="info-box-number"><?php echo number_format($total_daur_ulang, 0, ',', '.'); ?> <small>kg</small></span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-trash-alt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Residu Sampah</span>
            <span class="info-box-number"><?php echo number_format($total_residu, 0, ',', '.'); ?> <small>kg</small></span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <p class="text-center">
                    <strong>Keberhasilan Daur Ulang Sampah</strong>
                </p>
                <form id="filterForm" method="post" action="<?php echo site_url('dashboard'); ?>" style="display: flex; flex-wrap: wrap;">
                  <div class="form-group" style="flex: 1; margin-right: 10px;">
                      <select class="form-control" id="kategori_id" name="kategori_id">
                          <option value="">Semua Kategori</option>
                          <?php foreach ($kategori_sampah as $kategori): ?>
                              <option value="<?php echo $kategori['id_ktgrsampah']; ?>" <?php echo set_select('kategori_id', $kategori['id_ktgrsampah']); ?>>
                                  <?php echo $kategori['nama_kategori']; ?>
                              </option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group" style="flex: 1;">
                      <select class="form-control" id="tps_id" name="tps_id">
                          <option value="">Semua TPS</option>
                          <?php foreach ($nama_tps as $tps): ?>
                              <option value="<?php echo $tps['id_tps']; ?>" <?php echo set_select('tps_id', $tps['id_tps']); ?>>
                                  <?php echo $tps['nama_tps']; ?>
                              </option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                </form>
                <div class="chart">
                    <canvas id="areaChart" height="300" style="height: 300px;"></canvas>
                </div>
              </div>

              <div class="col-md-4 mb-5">
                <p class="text-center">
                  <strong>Target Daur Ulang Sampah</strong>
                </p>
                <div class="progress-group mt-5">
                    Bulanan
                    <span class="float-right"><b><?php echo $progress_bulanan['persen']; ?></b>%</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar <?php echo $progress_bulanan['kelas']; ?>" style="width: <?php echo $progress_bulanan['persen']; ?>%"></div>
                    </div>
                </div>
                <div class="progress-group mt-3">
                    Mingguan
                    <span class="float-right"><b><?php echo $progress_mingguan['persen']; ?></b>%</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar <?php echo $progress_mingguan['kelas']; ?>" style="width: <?php echo $progress_mingguan['persen']; ?>%"></div>
                    </div>
                </div>
                <div class="progress-group mt-3">
                    Harian
                    <span class="float-right"><b><?php echo $progress_harian['persen']; ?></b>%</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar <?php echo $progress_harian['kelas']; ?>" style="width: <?php echo $progress_harian['persen']; ?>%"></div>
                    </div>
                </div>

                <div class="kriteria-daurulang mt-5">
                    <p class="text-center">
                      <strong>Kriteria Keberhasilan Daur Ulang</strong>
                    </p>
                    <div class="d-flex justify-content-center mt-3">
                      <p class="pr-1"><i class="nav-icon fas fa-square text-success p-1"></i>> 50% = Berhasil</p>
                      <p class="pr-1"><i class="nav-icon fas fa-square text-warning p-1"></i>< 50% = Netral</p>
                      <p class="pr-1"><i class="nav-icon fas fa-square text-danger p-1"></i>< 30% = Gagal</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

<script>
document.addEventListener('DOMContentLoaded', function() {
  var kategoriSelect = document.getElementById('kategori_id');
  var tpsSelect = document.getElementById('tps_id');

  kategoriSelect.addEventListener('change', function() {
    submitForm();
  });

  tpsSelect.addEventListener('change', function() {
    submitForm();
  });

  function submitForm() {
    var kategoriId = kategoriSelect.value;
    var tpsId = tpsSelect.value;

    if (kategoriId === "" && tpsId === "") {
      window.location.href = "<?php echo site_url('dashboard'); ?>";
    } else {
      document.getElementById('filterForm').submit();
    }
  }
});
</script>
