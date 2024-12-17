@include('templates.teacherheader')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: white;
        margin: 0;
        padding: 0;
    }

   
    .header-container {
        display: flex; 
        align-items: center; 
        background-color: rgba(8, 16, 66, 1); 
        color:white;
        padding: 10px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5); 
            }
    #mySidebar {
        display: none;
        position: fixed;
        z-index: 1;
        height: 100%;
        width: 250px;
        top: 0;
        left: 0;
        background-color: #0c3b6d;
        color: white;
        padding-top: 20px;
        padding-left: 15px;
        transition: 0.3s;
        overflow-y: auto;
    }

    #main {
        transition: margin-left .3s;
        padding: 20px;
    }

    .btn {
        background-color: #0c3b6d;
        color: white;
        border: none;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #093d5e;
    }

    .table-responsive {
        margin-top: 20px;
    }
    h1{
        font-size:17px;
        font-family:'Arial',sans-serif;
       
    }
</style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open(event)">&#9776;</button>
        <div class="w3-container" style="margin-left: 15px;">
            <h1 style="margin: 0;">Teacher Submit Attendance</h1>
        </div>
    </div>
    <div id="main" onclick="w3_close()">

    <div class="container" style="width: 80%; height: auto; border: 1px solid #ccc; padding: 20px;">
        <form action="/teacherattendance" method="GET">
            @csrf
            
            <div class="fee-list">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex">
                        <div class="input-group mr-3">
                            <input type="text" class="form-control" placeholder="Search..." aria-label="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Refresh Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Section</th>
                                    <th>Edp Code</th>
                                    <th>Subject</th>
                                    <th>Year Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $class) 
                                    <tr>
                                        <td>{{ $class->section }}</td>
                                        <td>{{ $class->edpcode }}</td>
                                        <td>{{ $class->subject }}</td>
                                        <td>{{ $class->grade ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('teacherattendance', ['teacher_id' => $class->teacher_id, 'edp_code' => $class->edpcode]) }}" 
                                               class="btn btn-info btn-sm view-studententry" 
                                               title="View Student Entry for {{ $class->section }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M7.998 2c-2.757 0-5.287 1.417-6.758 3.75a.748.748 0 0 0 0 .5c1.471 2.333 4.001 3.75 6.758 3.75s5.287-1.417 6.758-3.75a.748.748 0 0 0 0-.5c-1.471-2.333-4.001-3.75-6.758-3.75zm0 1.5a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5zm0 2a1.75 1.75 0 1 0 0 3.5 1.75 1.75 0 0 0 0-3.5z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </form>
    </div>
</div>

@include('templates.teacherfooter')