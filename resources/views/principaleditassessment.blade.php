@include('templates.principalheader')

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()">&#9776;</button>
        <h1>Assessments Overview</h1>
    </div>
    <div id="main" onclick="w3_close()">


    <div class="container my-4" >
        <h1 class="mb-2 text-center" style="font-size:24px;">Assessment Information</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('assessment.edit', $assessment->id) }}" method="POST" class="shadow p-4 rounded bg-light">
            @csrf 
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{ $assessment->id }}">

            <div class="mb-3">
                <label for="school-year" class="form-label fw-bold">School Year:</label>
                <input type="text" id="school-year" name="school_year" class="form-control" 
                    value="{{ $assessment->school_year }}" placeholder="Enter the school year">
            </div>

            <div class="mb-3">
                <label for="grade-level" class="form-label fw-bold">Grade Level:</label>
                <input type="text" id="grade-level" name="grade_level" class="form-control" 
                    value="{{ $assessment->grade_level }}" placeholder="Enter the grade level">
            </div>

            <div class="mb-3">
                <label for="assessment-name" class="form-label fw-bold">Assessment Name:</label>
                <input type="text" id="assessment-name" name="assessment_name" class="form-control" 
                    value="{{ $assessment->assessment_name }}" placeholder="Enter assessment name">
            </div>

            <div class="mb-3">
                <label for="assessment-description" class="form-label fw-bold">Assessment Description:</label>
                <textarea id="assessment-description" name="description" class="form-control" rows="3" placeholder="Enter a brief description">{{ $assessment->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="assessment-date" class="form-label fw-bold">Assessment Date:</label>
                <input type="date" id="assessment-date" name="assessment_date" class="form-control" 
                    value="{{ $assessment->assessment_date }}">
            </div>

            <div class="mb-3">
                <label for="assessment-time" class="form-label fw-bold">Assessment Time:</label>
                <input type="time" id="assessment-time" name="assessment_time" class="form-control" 
                    value="{{ $assessment->assessment_time }}">
            </div>

            <div class="mb-3">
                <label for="assessment-fee" class="form-label fw-bold">Assessment Fee:</label>
                <input type="number" id="assessment-fee" name="assessment_fee" class="form-control" 
                    value="{{ $assessment->assessment_fee }}" min="0" step="0.01" placeholder="Enter the assessment fee">
            </div>

            <button type="submit" class="btn btn-success w-100">Update Assessment</button>
        </form>
    </div>
</div>

@include('templates.principalfooter')

<style>
   

#main {
 padding:0;
}

.header-container {
display: flex;
align-items: center;
background-color: rgba(8, 16, 66, 1);
color: white;
padding: 10px;
box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}
.header-container h1 {
    margin: 0;
    font-size: 17px; /* Increased font size for visibility */
    flex-grow: 1; /* Allow header to take available space */
    text-align: left; /* Center the header text */
}

    /* Enhance form styles */
    .form-select, .form-control {
        transition: border-color 0.2s;
    }

    /* Button styles */
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .container {
            padding: 10px; /* Reduced padding for small screens */
        }
    }
</style>