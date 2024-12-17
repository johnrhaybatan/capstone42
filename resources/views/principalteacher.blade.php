@include('templates.principalheader')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa; /* Light background */
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

    h1 {
        margin: 0; 
        font-size: 20px;
    }

    .form-container {
        width: 80%;
        margin: auto; /* Centering the container */
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 0.5rem;
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px; /* Spacing between sections */
    }

    .form-group {
        margin-bottom: 1.5rem; /* Increase space between form groups */
    }

    label {
        font-weight: bold; /* Make labels bold */
    }

    .subjects {
        margin-top: 10px;
        border: 1px solid #ddd; /* Add a border around subject lists */
        padding: 10px;
        border-radius: 5px;
        display: none; /* Initially hidden */
    }

    .checkbox-group div {
        margin-left: 1.5rem; /* Indent checkboxes for clarity */
    }

    .text-center {
        margin-top: 1.5rem; /* Space above the button */
    }

    .btn-primary {
        background-color: rgba(8, 16, 66, 1);
        border: none;
        color: white;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s;
        width: 100%; /* Make the button full width */
    }

    .btn-primary:hover {
        background-color: rgba(8, 16, 99, 1);
    }
    .headerh1{
        font-size:17px;
      
    }
    
</style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open(event)">&#9776;</button>
        <h1 class="headerh1">Teachers and Subjects</h1>
    </div>
    <div id="main" onclick="w3_close()">
    
    <div class="container d-flex justify-content-center align-items-start" style="min-height: 60vh;">
        <div class="form-container">
            <h1 class="text-center">Assign Teacher to Subject</h1>

            <form action="/principalteacher" method="POST" id="myForm">
                @csrf
                <div class="form-group">
                    <label for="teacher">Teacher</label>
                    <select class="form-control" id="teacher" name="name" required>
                        <option value="">Select a Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher['id'] }}">
                                {{ $teacher['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="grade">Select Grade Level</label>
                    <select class="form-control" id="grade" name="grade" onchange="showSubjects(this.value)">
                        <option value="">Select Grade</option>
                        @foreach (range(1, 10) as $grade)
                            <option value="Grade {{ $grade }}">Grade {{ $grade }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div id="subjects" class="checkbox-group">
                    @foreach ([
                        'Grade 1' => ["Mother tongue", "Filipino", "Reading", "Language", "Mathematics", "Science", "AP", "ESP", "Computer", "MAPEH"],
                        'Grade 2' => ["Mother tongue", "Filipino", "Reading", "Language", "Mathematics", "Science", "AP", "ESP", "Computer", "MAPEH"],
                        'Grade 3' => ["Mother tongue", "Filipino", "Reading & Phonics", "Language & Spelling", "Mathematics", "Science", "AP", "ESP", "Computer", "MAPEH"],
                        'Grade 4' => ["Mother tongue", "Filipino", "Reading", "Language", "Mathematics", "Science", "AP", "ESP", "Computer", "MAPEH"],
                        'Grade 5' => ["Mother tongue", "Filipino", "Reading", "Language", "Mathematics", "Science", "AP", "ESP", "Computer", "MAPEH"],
                        'Grade 6' => ["Filipino", "Reading", "Language", "Mathematics", "Science", "AP", "ESP", "Computer", "HELE (EPP)", "MAPEH"],
                        'Grade 7' => ["Filipino", "English", "Mathematics", "Science", "AP", "ESP", "TLE/Computer", "MAPEH"],
                        'Grade 8' => ["Filipino", "English", "Mathematics", "Science", "AP", "ESP", "TLE/Computer", "MAPEH"],
                        'Grade 9' => ["Filipino", "English", "Mathematics", "Science", "AP", "ESP", "TLE", "MAPEH"],
                        'Grade 10' => ["Filipino", "English", "Mathematics", "Science", "AP", "ESP", "TLE", "MAPEH"]
                    ] as $grade => $subjects)
                        <div class="subjects" id="{{ strtolower(str_replace(' ', '-', $grade)) }}">
                            <h4>{{ $grade }} Subjects:</h4>
                            @foreach ($subjects as $subject)
                                <div>
                                    <input type="checkbox" id="{{ strtolower(str_replace(' ', '-', $subject)) }}" name="subject[]" value="{{ $subject }}">
                                    <label for="{{ strtolower(str_replace(' ', '-', $subject)) }}">{{ $subject }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            
                <!-- Hidden input to hold the concatenated subjects -->
                <input type="hidden" name="concatenated_subjects" id="concatenated_subjects">
            
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            
            <script>
                document.getElementById('myForm').onsubmit = function() {
                    const checkboxes = document.querySelectorAll('input[name="subject[]"]:checked');
                    const selectedSubjects = Array.from(checkboxes).map(cb => cb.value);
                    const concatenatedSubjects = selectedSubjects.join(', ');
                    document.getElementById('concatenated_subjects').value = concatenatedSubjects;

                    // Log the value for debugging purposes
                    console.log('Concatenated Subjects:', concatenatedSubjects);
                    
                    toastr.success('Teacher assigned successfully.');
                };
            
                // Function to show subjects based on the selected grade
                function showSubjects(grade) {
                    // Hide all subject lists
                    document.querySelectorAll('.subjects').forEach(subjectList => {
                        subjectList.style.display = 'none';
                    });
                    // Show the selected grade's subjects
                    if (grade) {
                        document.getElementById(grade.toLowerCase().replace(' ', '-')).style.display = 'block';
                    }
                }
            </script>

@include('templates.principalfooter')