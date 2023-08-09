<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Support Workers</h1>
                <hr class="my-4">
                <p>All Job Entries</p>
                <a href="/" class="btn btn-success">Add Entry</a>
            </div>
        </div>
    </div>
</div> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Number of People</th>
                                    <th>Shift</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shifts as $shift)
                                <tr>
                                    <!--<td>{{ $shift->date }}</td>
                                    <td>{{ $shift->num_people }}</td>
                                    <td>{{ $shift->shift }}</td>!-->
                                    <td>{{ \Carbon\Carbon::parse($shift->date)->format('l, F j, Y') }}</td>
                                    
                                    <td>{{ $shift->num_people }}</td>
                                    <td>{{ $shift->shift }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-danger">
                {{ $shifts->links() }}
            </button>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
