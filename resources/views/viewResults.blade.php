<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .ribbon-wrapper {
        position: absolute;
        right: -10px;
        top: -10px;
        overflow: hidden;
        width: 75px;
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
        right: -25px;
        top: 20px;
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
    @foreach ($shiftCounts as $shiftCount)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ date('Y-m-d (D)', strtotime($shiftCount->date)) }}</h5>
            <p class="card-text">Day of the week: {{ date('l', strtotime($shiftCount->date)) }}</p>
            <p class="card-text">Morning Shift: {{ $shiftCount->morningshift }}</p>
            <p class="card-text">Night Shift: {{ $shiftCount->nightshift }}</p>
        </div>
    </div>
    @endforeach
</div>