<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .ribbon-wrapper {
        position: absolute;
        right: -10px;
        top: -10px;
        overflow: hidden;
        width: 100px; /* Adjust width for longer text */
        height: 75px;
    }

    .ribbon {
        font-size: 1rem;
        position: absolute;
        padding: 6px 15px;
        background-color: #007bff;
        color: #fff;
        text-transform: uppercase;
        transform: rotate(45deg);
        right: -45px; /* Adjust right position for longer text */
        top: 20px;
        white-space: nowrap; /* Prevent text from wrapping */
    }

    .info-box {
        background: #f4f6f9;
        border-radius: 8px;
        border: 1px solid #d2d6de;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative;
    }

    .info-box-content {
        padding: 10px;
    }

    .info-box-text {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .info-box-number {
        font-size: 1rem;
        color: #6c757d;
    }

    .info-box-icon {
        background: #007bff;
        color: #fff;
        border-radius: 50%;
        font-size: 2rem;
        padding: 10px;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div style="max-width: 800px; margin: 0 auto;">
    <canvas id="shiftChart"></canvas>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="jumbotron">
                <h1 class="display-4">Health Care Assistants</h1>
                <hr class="my-4">
                <p>Total People For The Week {{$total}}</p>
                <p>Total People For Today {{$today}}</p>
                <a href="/" class="btn btn-secondary"><i class = "fa fa-users"></i>Home</a>
            </div>
        </div>
        <div class = "col-md-8">
            <div style="max-width: 400px; margin: 0 auto;">
                <canvas id="shiftPieChart"></canvas>
                
    <script>
        // Your PHP data here (replace with actual data)
        var shiftCounts = <?php echo json_encode($shiftCounts); ?>;
        
        // Extracting data for chart
        var labels = shiftCounts.map(entry => entry.date);
        var morningShiftData = shiftCounts.map(entry => entry.morningshift);
        var nightShiftData = shiftCounts.map(entry => entry.nightshift);
        var lateShiftData = shiftCounts.map(entry => entry.lateshift);
        var longShiftData = shiftCounts.map(entry => entry.longshift);
        
        // Calculate total shifts for each day
        var totalShifts = shiftCounts.map(entry => entry.morningshift + entry.nightshift + entry.lateshift + entry.longshift);
        
        // Create descriptions for each slice
        var descriptions = labels.map((label, index) => {
            return `Date: ${label}\nTotal Shifts: ${totalShifts[index]}\nMorning: ${morningShiftData[index]}, Night: ${nightShiftData[index]}, Late: ${lateShiftData[index]}, Long: ${longShiftData[index]}`;
        });
        
        // Create a pie chart
        var ctx = document.getElementById('shiftPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: totalShifts,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        // Add more colors if needed
                    ],
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'bottom',
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            return descriptions[tooltipItem.index];
                        }
                    }
                }
            }
        });
    </script>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($shiftCounts as $shiftCount)
        <div class="col-md-4">
            <div class="info-box">
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-primary">
                        WCTC
                    </div>
                </div>
                <span class="info-box-icon bg-primary"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
            <h5 class="card-title">{{ date('Y-m-d (D)', strtotime($shiftCount->date)) }}</h5>
            <p class="card-text">Day of the week: {{ date('l', strtotime($shiftCount->date)) }}</p>
            <p class="card-text">Morning Shift: {{ $shiftCount->morningshift }}</p>
            <p class="card-text">Night Shift: {{ $shiftCount->nightshift }}</p>
            <p class="card-text">Late Shift: {{ $shiftCount->lateshift }}</p>
            <p class="card-text">Long Day Shift: {{ $shiftCount->longshift }}</p>   
            </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            
        </div>
    </div>
</div>