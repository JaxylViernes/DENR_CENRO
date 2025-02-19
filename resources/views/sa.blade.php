@extends('layouts.navbar')
@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>
<div class="table-container">
    <div class="table-title">
<<<<<<< HEAD
        <h2>SURVEY AUTHORITY (SA)</h2><br>
        
        <div class="search-box">
=======
        <div class="title-left">
        <h2>SURVEY AUTHORITY</h2>
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

                <option selected disabled hidden style = "color: #a0a5b1;" >Status</option>
                <option value="On Process">On Process</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
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
    <table id = "saTable">
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
                <th>Status</th>
                <th>Location</th>
                <th>Survey No.</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sadata as $sa)
            <tr>
            <td>{{ $sa->id_sa}}</td>
            <td>{{ $sa->applicant_name }}</td>
            <td>{{ $sa->applicant_number }}</td>
            <td>{{ $sa->on_process_rejected_approve}}</td>
            <td>{{ $sa->location }}</td>
            <td>{{ $sa->survey_no }}</td>
            <td>{{ $sa->remarks }}</td>
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
        
                @if (Session::has("message"))
                    swal("Error logging in", "{{ Session::get('message') }}", "error");
                @elseif(Session::has('success'))
                    swal("Success", "{{ Session::get('success') }}", "success");
                @endif
            });
        </script>
=======
   
    <script>
>>>>>>> 7ce7c29d426a7ac63529c781ad49d3c610c6fdfc

document.querySelector("#filter").addEventListener("change", filterTable);

function filterTable(){
    
    const selectedOption = document.querySelector("#filter").value;
    const tableRows = document.querySelectorAll("#tables tr");

    tableRows.forEach((row, index)=> {
        if (index === 0 ) return;

        if(row.children[3].textContent.toLowerCase() === selectedOption.toLowerCase() || selectedOption === "All" ){

            row.style.display = "";
        }
        else{

            row.style.display = "none";

        }
    });

}

</script>


@endsection