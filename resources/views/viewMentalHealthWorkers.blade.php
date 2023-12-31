<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4 animate__animated animate__fadeInLeft">Mental Health Care Assistants</h1>
                <hr class="my-4">
                <p class = "animate__animated animate__SlideInUp">Total People For Today {{$today}}</p>
                <p class = "animate__animated animate__fadeInRight">Total People For The Week {{$total}}</p>
                <a href="/" class="btn btn-secondary"><i class = "fa fa-users"></i>Home</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <button onclick="generatePDF()" class = "btn btn-info"><i class = "fa fa-print"></i>Generate PDF</button>
    <hr>
    <script>
        function generatePDF() {
            var doc = new jsPDF();
            // HTML content to be converted
            var htmlContent = document.getElementById('pdf-content').innerHTML;
        
            doc.text('Mental Health Workers Report', 10, 10); // Title
            doc.fromHTML(htmlContent, 10, 20, {
                width: 190
            });
        
            // Save the PDF
            doc.save('MentalHealthWorkers.pdf');
        }
        </script>
<div class="container">
    <div class="row" id = "pdf-content">
        @foreach ($shiftCounts as $shiftCount)
        <div class="col-md-4 animate__animated animate__zoomIn">
            <div class="info-box">
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-primary">
                        We Choose To Care
                    </div>
                </div>
                <span class="info-box-icon bg-primary"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
            <h5 class="card-title">{{ date('d-m-y (D)', strtotime($shiftCount->date)) }}</h5>
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