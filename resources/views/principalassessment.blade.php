@include('templates.principalheader')

<style>
    body {
        background-color: #f4f4f4; /* Consistent background color */
        font-family: Arial, sans-serif; /* Consistent font */
    }

    #main {
     padding:10px;
    }

    .header-container {
    display: flex;
    align-items: center;
    background-color: rgba(8, 16, 66, 1);
    color: white;
    padding: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

    h2 {
        color: #00796b; /* Teal color for section heading */
        margin-top: 20px; /* Margin above section heading */
        margin-bottom: 15px; /* Margin below section heading */
    }

    .table {
        width: 100%; /* Full width for table */
        margin: 20px 0; /* Margin above and below table */
        border-radius: 8px; /* Rounded corners for table */
        overflow: hidden; /* Hide overflow for rounded corners */
    }

    .table th {
        background-color: rgba(8, 16, 66, 1); /* Header background color */
        color: white; /* Header text color */
        text-align: center; /* Center header text */
    }

    .table td {
        text-align: center; /* Center table data */
    }

    .btn {
        padding: 10px 15px; /* Increased button padding */
        border-radius: 5px; /* Rounded corners for buttons */
        transition: background-color 0.3s; /* Smooth transition for hover effect */
    }

    .btn-primary {
        background-color: rgba(43, 145, 19); /* Primary button color */
        color: white; /* Primary button text color */
    }

    .btn-primary:hover {
        background-color: rgba(32, 110, 14); /* Darker shade on hover */
    }

    .btn-secondary {
        background-color: rgba(94, 14, 8); /* Secondary button color */
        color: white; /* Secondary button text color */
    }

    .btn-secondary:hover {
        background-color: rgba(140, 31, 22); /* Darker shade on hover */
    }

    @media (max-width: 768px) {
        .header-container h1 {
            font-size: 20px; /* Adjust font size for mobile */
        }
    }
    .header-container h1{
        margin: 0; 
        font-size: 20px;
        text-align:left;
        font-family: 'Arial', sans-serif;
    }
    .list{
        background-color:rgba(8, 16, 66, 1);
        margin-top:40px;
        width:20%;
       
       
    }
    .list h2{
        color:white;
        font-family: 'Arial', sans-serif;
        padding:10px;
        font-size:16px;
        text-align:center;
    }
    .headhead{
        font-size:24px;
        color:black;
    }
    </style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()">&#9776;</button>
        <h1>Assessments Overview</h1>
    </div>
    <div id="main" onclick="w3_close()">

    <div class="row mb-3">
        <div class="col">
            <h2 class="headhead">List of Created Assessments</h2>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>School Year</th>
                <th>Grade Level</th>
                <th>Assessment Name</th>
                <th>Description</th>
                <th>Assessment Date</th>
                <th>Assessment Time</th>
                <th>Assessment Fee</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($assessments as $assessment)
                <tr>
                    <td>{{ $assessment->school_year }}</td>
                    <td>{{ $assessment->grade_level }}</td>
                    <td>{{ $assessment->assessment_name }}</td>
                    <td>{{ $assessment->description }}</td>
                    <td>{{ $assessment->assessment_date }}</td>
                    <td>{{ $assessment->assessment_time }}</td>
                    <td>{{ $assessment->assessment_fee }}</td>
                    <td>{{ $assessment->status }}</td> <!-- Add status column if applicable -->
                    <td>
                        <form action="{{ route('assessment.publish', $assessment->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                        <form action="{{ route('assessment.edit', $assessment->id) }}" method="GET" class="d-inline">
                            <button type="submit" class="btn btn-secondary">Edit</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No assessments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@include('templates.principalfooter')