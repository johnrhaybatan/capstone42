@include('templates.teacherheader')

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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container" style="width: 80%; height: auto; border: 1px solid #ccc; padding: 20px;">
        <form action="/teachercorevalue" method="POST"> 
            @csrf
            @foreach ($students as $index => $studentDetail)
                <input type="hidden" name="grade_level[]" value="{{ old('grade_level.' . $index, $studentDetail['grade_level']) }}">
                <input type="hidden" name="fullname[]" value="{{ old('fullname.' . $index, "{$studentDetail['student']->firstname} {$studentDetail['student']->middlename} {$studentDetail['student']->lastname}") }}">
                <input type="hidden" name="section[]" value="{{ old('section.' . $index, $studentDetail['section']) }}">
                <input type="hidden" name="core_id[]" value="{{ old('core_id.' . $index, $studentClassIds[$studentDetail['student']->id] ?? 'N/A') }}">
            @endforeach

            <div class="fee-list">
                <h4>STUDENT CORE VALUES</h4>
                <div class="table-responsive">
                    <table class="table table-striped" id="core-values-table">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Section</th>
                                <th>Grade Level</th>
                                <th>Respect</th>
                                <th>Excellence</th>
                                <th>Teamwork</th>
                                <th>Innovation</th>
                                <th>Sustainability</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $studentDetail)
                                <tr>
                                    <td>{{ $studentDetail['student']->firstname }} {{ $studentDetail['student']->middlename }} {{ $studentDetail['student']->lastname }}</td>
                                    <td>{{ $studentDetail['section'] }}</td> 
                                    <td>{{ $studentDetail['grade_level'] ?? 'N/A' }}</td>
                                    @foreach (['respect', 'excellence', 'teamwork', 'innovation', 'sustainability'] as $coreValue)
                                        <td>
                                            <input type="text" class="form-control" name="core_values[{{ $studentDetail['student']->id }}][{{ $coreValue }}]" 
                                                   value="{{ old('core_values.' . $studentDetail['student']->id . '.' . $coreValue, '') }}" 
                                                   required {{ $errors->any() ? 'readonly' : '' }}>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="hidden-center">
                <button type="submit" name="submit" class="btn btn-danger btn-lg">Submit Core Values</button>
            </div>
        </form>
    </div>
</div>

@include('templates.teacherfooter')