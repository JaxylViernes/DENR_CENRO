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

    <button class="addApplicant" onclick="openForm()">ADD APPLICATION</button>
    <table>

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

                <!-- <a href="{{ route('deletemsa', $ms->id_msa) }}" class="delete-confirm" data-url="{{ route('deletemsa',$ms->id_msa) }}">
    <i class="material-icons">&#xE872;</i> 
</a> -->
<form action="{{ route('deletemsa', ['id_msa' => $ms->id_msa]) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-confirm">
                    <i class="material-icons">&#xE872;</i>
                </button>
            </form>


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
    <div class = "titleCloseButton">
    <h1 style="margin-bottom: 10px;">ADD APPLICATION</h1><button type="button" class = "close-button" onclick="closeForm()"><i class="material-icons">close</i></button>
    </div>
    <hr>
<div class = "row" style="margin-top: 10px;">
    <div class = "column">
    <label for="applicantname">Applicant Name</label>
    <input type="text" placeholder="Enter Applicant name (Surname first)" name="applicantname" required><br>

    <label for="location">Location</label>
    <input type="text" placeholder='Enter location' name="location" required><br>

   </div>
    <div class = "column">

  
    <label for="applicantnumber">Applicant Number</label>
    <input type="text" placeholder="Enter Applicant number" name="applicantnumber" required><br>
    <div class = "row">
    <div class = "column">
    <label for="surveynumber">Survey Number</label>
    <input type="text" placeholder="Enter Survey number" name="surveynumber" required><br>
    </div>
    <div class = "column">
        <div style = "margin-left: 20px;">
    <label for="status" >Status</label><br>
 
 <select name="status">
 <option>Select</option>
 <option value="subsisting">Subsisting</option>
 <option value="patented">Patented</option>
 </select>
 </div><br>
    
 </div>
 </div>
    </div>
    </div>
    <label for="remarks">Remarks</label><br>
    <!-- <input type="textarea" placeholder="Remarks" name="remarks" required><br>
      -->
      <textarea id="comments" name="remarks" rows="4" cols="50" placeholder="Remarks"></textarea><br><br>
    <input type="submit" class="btn" style="border-radius: 10px;">
    
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


function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-confirm").forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            
            let form = this.closest('form');  

            swal({
                title: "Are you sure?",
                text: "Record will be moved to archives",
                icon: "{{ asset('assets/images/deleteConfirmation.svg') }}",  // Custom image for the icon
                buttons: {
                    cancel: "No, Cancel",
                    confirm: "Yes, Proceed"
                },
                dangerMode: true,
            }).then((result) => {
                if(result){
                console.log('deleting item');
                    console.log('deleting item')
                    form.submit();
                }
                
            });
        });
    });
});
</script>





@if(Session::has('message'))

@if(Session::has('error'))

<script>
    swal(,
    {
        title: "An error ocurred",
        text: "{{ Session::get('error') }}",
                icon: "{{ asset('assets/images/error.svg') }}",
          button: "close"
    });
</script>

@elseif(Session::has('success'))
<script>
    swal(
    {
    
        title: "Success",
        text: "{{ Session::get('success') }}",
                icon: "{{ asset('assets/images/success.svg') }}",
          button: "Proceed"
    });
</script>
            @endif

     
</body>

@endsection