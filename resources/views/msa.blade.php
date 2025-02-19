@extends('layouts.navbar')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<body>
<div class="table-container">
    <div class="table-title">
        <h2>MISCELLANEOUS APPLICATION (MSA)</h2>
        
        <div class="search-box">
            <i class="material-icons">&#xE8B6;</i>
            <input type="text" id="searchInput" placeholder="Search&hellip;">
        </div>
    </div>
    <button class="addApplicant" onclick="openForm()">ADD APPLICANT</button>
    <table id="msaTable">
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
        @foreach($msadata as $ms)
            <tr>
            <td>{{ $ms->id_msa}}</td>
            <td>{{ $ms->applicant_name }}</td>
            <td>{{ $ms->applicant_number }}</td>
            <td>{{ $ms->patented_subsisting }}</td>
            <td>{{ $ms->location }}</td>
            <td>{{ $ms->survey_no }}</td>
            <td>{{ $ms->remarks }}</td>
            <td> 
                <div class="actions">
                <a href="#" class="edit"><i class="material-icons">&#xE254;</i></a>
                <a href="{{ route('deletemsa') }}" class="delete-confirm" data-url="{{ route('deletemsa') }}">
    <i class="material-icons">&#xE872;</i>
</a>
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

<div class="form-popup" id="myForm">
  <form action="{{ route('addmsa') }}" class="form-container" method="POST">
    @csrf
    <h1>ADD APPLICANT</h1>

    <label for="applicantname">Applicant Name</label>
    <input type="text" placeholder="Full name" name="applicantname" required><br>

    <label for="applicantnumber">Applicant Number</label>
    <input type="number" placeholder="Applicant Number" name="applicantnumber" required><br>

    <label for="status">Status (Subsisting/Patented)</label>
    <select name="status">
    <option>Select</option>
    <option value="subsisting">Subsisting</option>
    <option value="patented">Patented</option>
    </select><br>

    <label for="location">Applicant Number</label>
    <input type="text" placeholder="Location" name="location" required><br>

    <label for="surveynumber">Survey Number</label>
    <input type="text" placeholder="Survey Number" name="surveynumber" required><br>

    <label for="remarks">Remarks</label>
    <input type="text" placeholder="Remarks" name="remarks" required><br>

    <input type="submit" class="btn">
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("searchInput").addEventListener("input", function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll("#msaTable tbody tr");

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