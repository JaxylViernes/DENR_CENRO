@extends('layouts.navbar')
@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<body>
<div class="table-container">
    <div class="table-title">
<<<<<<< HEAD
        <h2>RESIDENTIAL FREE PATENT APPLICATION (RFPA)</h2>

        <div class="search-box">
=======
        <div class="title-left">
        <h2>RESIDENTIAL FREE PATENT APPLICATION</h2>
        <button class="addApplicant" onclick="openForm()">ADD APPLICANT</button>
        </div>
        <div class="search-filter">
            <p class="p-filter">Filter: </p>
            <div class="filter">
            <!-- <select name="filter1" id="filter1">

                <option selected disabled hidden style = "color: #a0a5b1;" >Cleared/Old</option>
                <option value="Subsisting">Cleared</option>
                <option value="Patented">Old</option>
                <option value="">All</option>
            </select> -->
            <select name="filter" id="filter">

                <option selected disabled hidden style = "color: #a0a5b1;" >Patented/Subsisting</option>
                <option value="Subsisting">Subsisting</option>
                <option value="Patented">Patented</option>
                <option value="All">All</option>
            </select>
            </div>
            <div class="search-box">
>>>>>>> 7ce7c29d426a7ac63529c781ad49d3c610c6fdfc
            <i class="material-icons">&#xE8B6;</i>
            <input type="text" id="searchInput" placeholder="Search&hellip;">
        </div>
<<<<<<< HEAD

    </div>
    <table id = "rfpaTable">
=======
        </div>
       
    </div>
    <table class = "table" id ="tables">
>>>>>>> 7ce7c29d426a7ac63529c781ad49d3c610c6fdfc
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
        @foreach($rfpadata as $rfpa)
            <tr>
            <td>{{ $rfpa->id_rfpa}}</td>
            <td>{{ $rfpa->applicant_name }}</td>
            <td>{{ $rfpa->applicant_number }}</td>
            <td>{{ $rfpa->reffered_investigator}}</td>
            <td>{{ $rfpa->patented_subsisting }}</td>
            <td>{{ $rfpa->location }}</td>
            <td>{{ $rfpa->survey_no }}</td>
            <td>{{ $rfpa->remarks }}</td>
            <td> 
                <div class="actions">
                <a href="#" class="edit"><i class="material-icons">&#xE254;</i></a>
                <a href="{{ route('deletemsa') }}" class="delete-confirm" data-url="{{ route('deletemsa') }}">
    <i class="material-icons">&#xe149;</i>
                </div>
                    </td>
            </tr>
           @endforeach
        </tbody>
    </table>
<<<<<<< HEAD
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
                    const rows = document.querySelectorAll("#rfpaTable tbody tr");
                    
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
=======

    <script>

document.querySelector("#filter").addEventListener("change", filterTable);

function filterTable(){
    
    const selectedOption = document.querySelector("#filter").value;
    const tableRows = document.querySelectorAll("#tables tr");

    tableRows.forEach((row, index)=> {
        if (index === 0 ) return;

        if(row.children[4].textContent.toLowerCase() === selectedOption.toLowerCase() || selectedOption === "All" ){

            row.style.display = "";
        }
        else{

            row.style.display = "none";

        }
    });

}

</script>
>>>>>>> 7ce7c29d426a7ac63529c781ad49d3c610c6fdfc


@endsection