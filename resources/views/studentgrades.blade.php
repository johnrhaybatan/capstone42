@include('templates.studentheader')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4; /* Match old design background */
        margin: 0;
        padding: 0;
    }

    #main {
        max-width: 100%;
        margin: 0 auto;
        padding: 0px;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    .header-container {
        display: flex; 
        align-items: center; 
        background-color: rgba(8, 16, 66, 1); 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5); 
        color: white;
        padding: 10px; 
    }

    h1 {
        margin: 0; 
        font-family: 'Arial', sans-serif;
        font-size: 17px;
    }

    .table-primary {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        border-radius: 0.5rem;
        overflow: hidden; /* Rounded borders */
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1);
    }

    .table-primary th,
    .table-primary td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table-primary th {
        background-color: #4CAF50; /* Match dashboard header color */
        color: white;
        text-transform: uppercase; /* Uppercase headers */
    }

    .table-primary tr:hover {
        background-color: #f1f1f1; /* Highlight on hover */
    }

    .alert {
        padding: 15px;
        background-color: #f9edbe;
        color: #856404;
        border: 1px solid #ffeeba;
        border-radius: 5px;
        margin-top: 20px; /* Spacing for alert */
        text-align: center; /* Centered alert message */
    }

    /* Responsive design */
    @media (max-width: 600px) {
        .table-primary th,
        .table-primary td {
            display: block;
            text-align: right;
        }

        .table-primary th {
            text-align: left;
            position: relative;
        }

        .table-primary th::after {
            content: ":";
            position: absolute;
            right: 0;
        }
    }
</style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open(event)">&#9776;</button>
        <h1>Grades S.Y 2024-2025</h1>
    </div>

    <div id="main" onclick="w3_close()">

    @if ($gradesApproved)
        <table class="table-primary">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>EDP Code</th>
                    <th>Section</th>
                    <th>1st Quarter</th>
                    <th>2nd Quarter</th>
                    <th>3rd Quarter</th>
                    <th>4th Quarter</th>
                    <th>Final Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $grade->subject }}</td>
                        <td>{{ $grade->edp_code }}</td>
                        <td>{{ $grade->section }}</td>
                        <td>{{ $grade->{'1st_quarter'} ?? '-' }}</td>
                        <td>{{ $grade->{'2nd_quarter'} ?? '-' }}</td>
                        <td>{{ $grade->{'3rd_quarter'} ?? '-' }}</td>
                        <td>{{ $grade->{'4th_quarter'} ?? '-' }}</td>
                        <td>{{ $grade->overall_grade ?? '-' }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td><strong>General Average</strong></td>
                    <td colspan="6"></td>
                    <td><strong>{{ number_format($grades->avg('overall_grade'), 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Button to generate report card -->
        <form action="" method="POST">
            @csrf
            <button type="submit" class="btn-report">Generate Report Card</button>
        </form>
        
    @else
        <div class="alert">
            <strong>Notice:</strong> Your grades are currently under evaluation by the principal. Please check back later.
        </div>
    @endif
</div>

@include('templates.studentfooter')
