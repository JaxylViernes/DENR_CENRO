@extends('layouts.navbar')
@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<body>
<div class="table-container">
    <div class="table-title">
        <h2>RESIDENTIAL FREE PATENT APPLICATION (RFPA)</h2>
        <div class="search-box">
            <i class="material-icons">&#xE8B6;</i>
            <input type="text" placeholder="Search&hellip;">
        </div>
    </div>
    <table>
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



@endsection