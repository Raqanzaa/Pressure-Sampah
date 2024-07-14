<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimalist Dropdown</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .dropdown-as-td {
            display: table-row;
            width: 100%;
        }

        .dropdown-as-td > button {
            width: 100%;
            text-align: left;
            border: none;
            background: none;
            padding: 0.5rem;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            padding: 0;
        }

        .dropdown-content.show {
            display: block;
        }

        .card-header {
            cursor: pointer;
        }

        .table-container {
            display: table;
            width: 100%;
            margin: 0 auto;
            padding: 1rem;
        }

        .table-cell {
            display: table-cell;
            vertical-align: top;
        }
    </style>
</head>
<body>

<section class="content-header">
</section>

<div class="container-fluid">
    <?php foreach ($grouped_data as $tahun => $bulan_data) : ?>
        <?php foreach ($bulan_data as $bulan => $data_by_tps) : ?>
            <div class="card mb-3">
                <div class="card-header" onclick="toggleDropdown(this)">
                    <?php echo 'Data Bulan ' . call_user_func($get_bulan_indonesia, $bulan) . ' ' . $tahun; ?>
                </div>
                <div class="dropdown-content">
                    <?php foreach ($data_by_tps as $tps_id => $kategori_data) : ?>
                        <div class="table-container">
                            <div class="table-cell">
                                <p><?php echo $kategori_data[array_key_first($kategori_data)]['nama_tps']; ?></p>
                                <button class="btn btn-info btn-sm mb-2" onclick="viewDetails('<?php echo $tps_id; ?>')">View Details</button>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kategori</th>
                                                <th>Total Berat Sampah</th>
                                                <th>Sampah Terdaur Ulang</th>
                                                <th>Residu Sampah</th>
                                                <th>Tingkat Keberhasilan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($kategori_data as $kategori_id => $data) : ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['nama_kategori']; ?></td>
                                                    <td><?php echo $data['berat_total'] . " kg"; ?></td>
                                                    <td><?php echo $data['berat_daur_ulang'] . " kg"; ?></td>
                                                    <td><?php echo $data['residu'] . " kg"; ?></td>
                                                    <td>
                                                        <?php 
                                                            $persentase_daur_ulang = ($data['berat_daur_ulang'] / $data['berat_total']) * 100;
                                                            if ($persentase_daur_ulang > 50) {
                                                                echo '<span class="badge badge-success">Berhasil</span>';
                                                            } elseif ($persentase_daur_ulang >= 30) {
                                                                echo '<span class="badge badge-warning text-dark">Netral</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger">Gagal</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>

<script>
    function toggleDropdown(element) {
        const content = element.nextElementSibling;
        content.classList.toggle('show');
    }

    function viewDetails(tpsId) {
        window.location.href = '<?= site_url('c_daur_ulang/view_details/') ?>' + tpsId;
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
