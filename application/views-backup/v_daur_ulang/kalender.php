<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendar CRUD</title>
    <style>
        .calendar-date {
            position: relative;
        }

        .crud-icons {
            position: absolute;
            top: 5px; 
            right: 5px;
            display: none;
        }

        .crud-icons a {
            padding-right: 10px;
        }

        .calendar-date:hover .crud-icons {
            display: block;
        }
    </style>

    <!-- Bootstrap CSS for modal -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Kalender Bulanan</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Input data harian</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Input Data Bulan <span id="namaBulan"></span></h3>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Create Form -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Input Data Harian Tanggal <span id="modalDate"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                <?php $this->load->view('v_daur_ulang/create'); ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarContainer = document.getElementById('calendar');
        const currentDate = new Date();
        const currentMonth = currentDate.getMonth();
        const currentYear = currentDate.getFullYear();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    
        const namaBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    
        document.getElementById('namaBulan').textContent = `${namaBulan[currentMonth]} ${currentYear}`;
    
        const kalenderData = <?= json_encode($kalender_data); ?>;
        const datesWithData = kalenderData.map(data => new Date(data.tanggal).getDate());
    
        const daysOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
        let calendarHtml = '<table class="table table-bordered"><thead><tr>';
    
        daysOfWeek.forEach(day => {
            calendarHtml += `<th>${day}</th>`;
        });
    
        calendarHtml += '</tr></thead><tbody><tr>';
    
        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        for (let i = 0; i < firstDay; i++) {
            calendarHtml += '<td></td>';
        }
    
        for (let date = 1; date <= daysInMonth; date++) {
            if ((firstDay + date - 1) % 7 === 0) {
                calendarHtml += '</tr><tr>';
            }
    
            const dateClass = datesWithData.includes(date) ? 'bg-success' : '';
    
            calendarHtml += `
                <td class="${dateClass}">
                    <div class="calendar-date" data-date="${date}">
                        ${date}
                        <div class="crud-icons">
                            <a href="#" class="add-icon text-light" data-toggle="modal" data-target="#createModal" data-date="${date}-${currentMonth+1}-${currentYear}"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </td>`;
        }
    
        calendarHtml += '</tr></tbody></table>';
        calendarContainer.innerHTML = calendarHtml;
    
        document.querySelectorAll('.add-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const date = this.getAttribute('data-date');
                document.getElementById('modalDate').textContent = date;
                document.getElementById('inputTanggal').value = date.split("-").reverse().join("-");
            });
        });
    
        document.querySelectorAll('.calendar-date').forEach(dateElement => {
            dateElement.addEventListener('mouseover', function() {
                this.querySelector('.crud-icons').style.display = 'block';
            });
            dateElement.addEventListener('mouseout', function() {
                this.querySelector('.crud-icons').style.display = 'none';
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const beratTotalInput = document.getElementById('berat_total');
        const beratDaurUlangInput = document.getElementById('berat_daur_ulang');
        const residuInput = document.getElementById('residu');

        function updateResidu() {
            const beratTotal = parseFloat(beratTotalInput.value) || 0;
            const beratDaurUlang = parseFloat(beratDaurUlangInput.value) || 0;
            residuInput.value = beratTotal - beratDaurUlang;
        }

        beratTotalInput.addEventListener('input', updateResidu);
        beratDaurUlangInput.addEventListener('input', updateResidu);
    });
    </script>
</body>
</html>
