@extends('layouts.navbar')
@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<body>
<div class="table-container">
    <div class="table-title">
        <h2>SPECIAL PATENT (GOVERNMENT) </h2>

        <div class="search-box">
            <i class="material-icons">&#xE8B6;</i>
            <input type="text" id="searchInput" placeholder="Search&hellip;">
        </div>

    </div>
    <table id = "spTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant Name</th>
                <th>Applicant Number</th>
                <th>Reffered Investigator</th>
                <th>Patented/Subsisting</th>
                <th>Location</th>
                <th>Survey No.</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($spdata as $sp)
            <tr>
            <td>{{ $sp->id_sp}}</td>
            <td>{{ $sp->applicant_name }}</td>
            <td>{{ $sp->applicant_number }}</td>
            <td>{{ $sp->referred_investigator}}</td>
            <td>{{ $sp->patented_subsisting }}</td>
            <td>{{ $sp->location }}</td>
            <td>{{ $sp->survey_no }}</td>
            <td>{{ $sp->remarks }}</td>
            <td> 
                <div class="actions">
                <a href="#" class="edit"><i class="material-icons">&#xE254;</i></a>
                <a href="#" class="delete"><i class="material-icons">&#xE872;</i></a>
                </div>
                    </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        <div class="hint-text">Showing <b>#</b> out of <b>#</b> entries</div>
        <div class="pagination">
            <a href="#"><i class="material-icons">&#xE5CB;</i></a>
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#"><i class="material-icons">&#xE5CC;</i></a>
        </div>
    </div>
</div>
 <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("searchInput").addEventListener("input", function() { 
                    const searchValue = this.value.toLowerCase();
                    const rows = document.querySelectorAll("#spTable tbody tr");
                    
                    rows.forEach(row => {
                        const cells = row.querySelectorAll("td");
                        let match = false;
        
                        cells.forEach(cell => {
                            if (cell.textContent.toLowerCase().includes(searchValue)) {
                                match = true;
                            }
                        });
        
                        row.style.display = match ? "" : "none";
                    });
                });
        
                @if (Session::has("message"))
                    swal("Error logging in", "{{ Session::get('message') }}", "error");
                @elseif(Session::has('success'))
                    swal("Success", "{{ Session::get('success') }}", "success");
                @endif
            });
        </script>


@endsection