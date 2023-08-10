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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Support Workers</h1>
                <hr class="my-4">
                <p>Total People For Today {{$totalJobs}}</p>
                <a href="/" class="btn btn-info">Add Entry</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($shifts as $shift)
        <div class="col-md-4">
            <div class="info-box">
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-primary">
                        
                    </div>
                </div>
                <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ \Carbon\Carbon::parse($shift->date)->format('l, F j, Y') }}</span>
                    <span class="info-box-number">Number of People: {{ $shift->num_people }}</span>
                    <span class="info-box-number">Shift: {{ $shift->shift }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($shifts->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $shifts->previousPageUrl() }}" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">Previous</span>
                        </a>
                    </li>
                @endif
                
                {{-- Pagination Elements --}}
                @foreach ($shifts->getUrlRange(1, $shifts->lastPage()) as $page => $url)
                    @if ($page == $shifts->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
                
                {{-- Next Page Link --}}
                @if ($shifts->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $shifts->nextPageUrl() }}" class="page-link" aria-label="Next">
                            <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
</div>
