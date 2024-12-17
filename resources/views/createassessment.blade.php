@include('templates.accountingheader')

<style>
  body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
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
    .header{
        font-size:17px;
       
    }
    /* Enhance form styles */
    .form-select, .form-control {
        transition: border-color 0.2s;
    }

    .form-select:focus, .form-control:focus {
        border-color: #007bff; /* Change border color on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Soft shadow on focus */
    }

    /* Button styles */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .container {
            padding: 10px; /* Reduced padding for small screens */
        }
    }
    .headerbody{
        text-align:center;
        background-color:rgba(8, 16, 66, 1); 
        color:white;
        font-size:22px;
        padding:10px;
        font-family:'Arial',sans-serif;
        width:24%;
    }
</style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open()">&#9776;</button>
        <div class="w3-container" style="margin-left: 15px;">
            <h1 class="header">Create ASsessment</h1>
        </div>
    </div>
    <div id="main" onclick="w3_close()">
     


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <div class="container my-5">
       
    <h1 class="headerbody">Assessment Creator</h1>
        <form action="{{ route('assessment.post') }}" method="POST" id="assessment-form" class="shadow p-4 rounded bg-light">
            @csrf <!-- CSRF Token -->

            <div class="mb-3">
                <label for="school-year" class="form-label fw-bold">School Year:</label>
                <select id="school-year" name="school_year" class="form-select" required>
                    <option value="">Select School Year</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="grade-level" class="form-label fw-bold">Grade Level:</label>
                <select id="grade-level" name="grade_level" class="form-select" required>
                    <option value="">Select Grade Level</option>
                    <option value="kindergarten">Kindergarten</option>
                    <option value="grade1">Grade 1</option>
                    <option value="grade2">Grade 2</option>
                    <option value="grade3">Grade 3</option>
                    <option value="grade4">Grade 4</option>
                    <option value="grade5">Grade 5</option>
                    <option value="grade6">Grade 6</option>
                    <option value="grade7">Grade 7</option>
                    <option value="grade8">Grade 8</option>
                    <option value="grade9">Grade 9</option>
                    <option value="grade10">Grade 10</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="assessment-name" class="form-label fw-bold">Assessment Name:</label>
                <input type="text" id="assessment-name" name="assessment_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="assessment-description" class="form-label fw-bold">Assessment Description:</label>
                <textarea id="assessment-description" name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="assessment-date" class="form-label fw-bold">Assessment Date:</label>
                <input type="date" id="assessment-date" name="assessment_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="assessment-time" class="form-label fw-bold">Assessment Time:</label>
                <input type="time" id="assessment-time" name="assessment_time" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="assessment-fee" class="form-label fw-bold">Assessment Fee:</label>
                <input type="number" id="assessment-fee" name="assessment_fee" class="form-control" min="0" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Create Assessment</button>
        </form>
    </div>

    <script>
        const startYear = 2021; // Starting year
        const numberOfYears = 10; // Number of years to display
        const selectElement = document.getElementById('school-year');

        for (let i = 0; i < numberOfYears; i++) {
            const year = startYear + i;
            const nextYear = year + 1;
            const optionValue = `${year}-${nextYear}`;
            const option = document.createElement('option');
            option.value = optionValue;
            option.textContent = optionValue;
            selectElement.appendChild(option);
        }

        // Show success notification if session flash data is present
        @if (session('success'))
            toastr.success('{{ session('success') }}', 'Success');
        @endif
    </script>
</div>

@include('templates.accountingfooter')
