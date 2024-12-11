@include('templates.oldstudentheader')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .header-container {
        display: flex; 
        align-items: center; 
        background-color: rgba(8, 16, 66, 1); 
        color: white;
        padding: 10px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);  
    }


    .header-container {
        display: flex; 
        align-items: center; 
        background-color: rgba(8, 16, 66, 1); 
        color: white;
        padding: 10px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);  
    }


    .nav-button {
        margin-right: 15px; 
    }

    h1 {
        margin: 0; 
        font-size: 17px;
    }

    .content {
        text-align: center;
        margin: 20px 0;
    }

    .form-group {
        margin-bottom: 1.5rem; 
    }

    .table th, .table td {
        vertical-align: middle; 
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1; 
    }

    @media print {
        .btn {
            display: none; 
        }
    }
</style>


<div class="header-container"> 
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open(event)">&#9776;</button>
        <h1>Student Class Load</h1> 
    </div>
    <div id="main" onclick="w3_close()">

    <div class="content">
        <a href="{{ route('student.classload.pdf', ['student_id' => $student->id]) }}" class="btn btn-primary mb-3" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
            </svg>
        </a>

        <div class="form-group">
            <label for="studyLoadName">Student Name:</label>
            <input style="text-align:center;" type="text" class="form-control" id="studyLoadName" value="{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}" readonly>
        </div>
        <div class="form-group">
            <label for="yearLevel">Year Level:</label>
            <input style="text-align:center;" type="text" class="form-control" id="yearLevel" value="{{ $proof->level ?? 'N/A' }}" readonly>
        </div>
        <div class="form-group">
            <label for="section">Section:</label>
            <input style="text-align:center;" type="text" class="form-control" id="section" value="{{ $assignedClasses->isNotEmpty() ? $assignedClasses->first()->section : 'N/A' }}" readonly>
        </div>

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Room</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Days</th>
                </tr>
            </thead>
            <tbody id="studyLoadTable">
                @if ($assignedClasses->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">No assigned classes for this student.</td>
                    </tr>
                @else
                    @foreach ($assignedClasses as $class)
                        <tr>
                            <td class="text-center">{{ $class->room }}</td>
                            <td class="text-center">{{ $class->subject }}</td>
                            <td class="text-center">{{ $class->description }}</td>
                            <td class="text-center">{{ $class->type }}</td>
                            <td class="text-center">{{ $class->unit }}</td>
                            <td class="text-center">{{ date('h:i A', strtotime($class->startTime)) }} - {{ date('h:i A', strtotime($class->endTime)) }}</td>
                            <td class="text-center">{{ $class->days }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@include('templates.oldstudentfooter')
