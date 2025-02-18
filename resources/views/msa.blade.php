@extends('layouts.navbar')
@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<body>
<div class="table-container">
    <div class="table-title">
        <div class="title-left">
        <h2>MISCELLANEOUS SALES APPLICATION</h2>
        <button class="addApplicant" onclick="openForm()">ADD APPLICANT</button>
        </div>
        <div class="search-filter">
            <p class="p-filter">Filter: </p>
            <div class="filter">
            <select name="filter" id="filter">
                <option selected disabled hidden style = "color: #a0a5b1;" >Patented/Subsisting</option>
                <option value="Subsisting">Subsisting</option>
                <option value="Patented">Patented</option>
                <option value="All">All</option>
            </select>
            </div>
            <div class="search-box">
            <i class="material-icons">&#xE8B6;</i>
            <input type="text" placeholder="Search&hellip;">
        </div>
        </div>
       
    </div>
   
    <table class = "table" id = "tables">
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
    <i class="material-icons">&#xe149;</i>
</a>

                <!-- <button class="delete" onclick="deleteConfirmation()"><i class="material-icons">&#xE872;</i></button> -->
                </div>
                    </td>
            </tr>
           @endforeach
        </tbody>
    </table>


   


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


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function deleteConfirmation(){
    swal({
  title: "Are you sure?",
  text: "But you will still be able to retrieve this file.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, archive it!",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    swal("Deleted!", "Your imaginary file has been archived.", "success");
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-confirm").forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            let deleteUrl = this.getAttribute("data-url");

            swal({
                title: "Are you sure?",
                text: "Record will be moved to archves",
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
</script>




@if(Session::has('message'))
<script>
    swal("Error logging in", "{{ Session::get('message') }}", "error",
    {
    
    });
</script>

@elseif(Session::has('success'))
<script>
    swal("Application Added", "{{ Session::get('success') }}", "success",
    {
    
    });
</script>
            @endif

     
</body>

@endsection