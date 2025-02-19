@extends('layouts.navbar')
@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>
<div class="table-container">
    <div class="table-title">
        <h2>SURVEY AUTHORITY (SA)</h2><br>
        <button type="button" class="btn btn-success">ADD APPLICANT</button>
        
        <div class="search-box">
            <i class="material-icons">&#xE8B6;</i>
            <input type="text" id="searchInput" placeholder="Search&hellip;">
        </div>
    </div>
    <table id = "saTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant Name</th>
                <th>Applicant Number</th>
                <th>Patented/Subsisting</th>
                <th>Location</th>
                <th>Survey No.</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sadata as $ts)
            <tr>
            <td>{{ $ts->id_tsa}}</td>
            <td>{{ $ts->applicant_name }}</td>
            <td>{{ $ts->applicant_number }}</td>
            <td>{{ $ts->patented_subsisting }}</td>
            <td>{{ $ts->location }}</td>
            <td>{{ $ts->survey_no }}</td>
            <td>{{ $ts->remarks }}</td>
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
   document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("searchInput").addEventListener("input", function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll("#saTable tbody tr");

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
    document.querySelectorAll(".delete-confirm").forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            let deleteUrl = this.getAttribute("data-url");

            swal({
                title: "Are you sure?",
                text: "Record will be moved to archives",
                icon: "warning",
                buttons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            });
        });
    });
});

@if(Session::has('message'))
swal("Error logging in", "{{ Session::get('message') }}", "error");
@elseif(Session::has('success'))
swal("Application Added", "{{ Session::get('success') }}", "success");
@endif 
</script>

</body>
@endsection