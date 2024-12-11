@include('templates.studentheader')
<style>
    body {
        background-color: white; /* Change to match dashboard */
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    #main {
        padding: 20px; /* Added padding for spacing */
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
        font-size: 17px; /* Adjusted to match dashboard */
        margin: 0;
        color: white;
        text-align: left; /* Align text to the left */
        flex-grow: 1; /* Allow header to take available space */
    }

    h2{
            text-align: left; 
            padding:15px;
            margin: 20px 0; 
            font-size:20px;
            color:white;
            background: rgba(8, 16, 66, 1);
        }

    .list-group {
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
    }

    .list-group-item {
        padding: 1.5rem;
        background-color: #ffffff;
        border: none;
        border-bottom: 1px solid #e9ecef;
        transition: box-shadow 0.3s ease-in-out, background-color 0.3s ease-in-out;
    }

    .list-group-item:last-child {
        border-bottom: none; /* Remove border for the last item */
    }

    .list-group-item:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        background-color: #f8f9fa;
    }

    .fw-bold {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: #343a40; /* Consistent with dashboard */
    }

    .list-group-item p {
        font-size: 0.95rem;
        color: #6c757d; /* Consistent with dashboard */
    }

    .badge {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
    }

    .btn-secondary {
        font-size: 0.9rem;
        padding: 0.4rem 1rem;
    }

    /* Button styling */
    .btn-primary {
        background-color: #0c3b6d; /* Change to match primary color */
        border-color: #0c3b6d;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        h2 {
            font-size: 1.5rem;
        }

        .list-group-item {
            padding: 1rem;
        }

        .fw-bold {
            font-size: 1rem;
        }
    }
</style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open(event)">&#9776;</button>
        <h1>Student Enrollment</h1> 
    </div>
    <div id="main" onclick="w3_close()">
    <!-- <section class="container my-5"> -->
 
        <div class="row">
            <div class="col-12">
                <h2>Enrollment Steps</h2>
                <form action="/enrollmentsteps" method="GET">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Admission and Parent Consent Form</div>
                                <p>Completed the admission and parent consent form.</p>
                            </div>
                            <span class="badge bg-success rounded-pill">Completed</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Records Approval</div>
                                <p>Approval of student records by the school Records.</p>
                            </div>
                            <span class="badge bg-success rounded-pill">Completed</span>
                        </li>

                        @if (auth()->check() && auth()->user()->role == 'NewStudent')
                        @php
                            $studentDetail = \App\Models\studentdetails::where('details_id', $registerForm->id)->first();
                        @endphp

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Student Details</div>
                                <p>Provided detailed student information.</p>
                            </div>
                            <div>
                                @if ($studentDetail)
                                    @if ($studentDetail->status === 'approved')
                                        <span class="badge bg-success rounded-pill">Completed</span>
                                    @else
                                        <a href="{{ route('updatedetails.id', ['id' => $studentDetail->details_id]) }}" 
                                        class="btn btn-primary mt-3 rounded-pill updateInfoBtn">
                                        Confirm Information
                                        </a>
                                    @endif
                                @else
                                    <span>No student details found.</span>
                                @endif
                            </div>
                        </li>

                        @php
                            $address = \App\Models\address::where('address_id', $registerForm->id)->first();
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Address and Contact Details</div>
                                <p>Provided student's address and contact information.</p>
                            </div>
                            <div>
                                @if ($address && $address->status === 'approved')
                                    <span class="badge bg-success rounded-pill">Completed</span>
                                @else
                                    <a href="{{ route('updateaddress.id', ['id' => $address_id]) }}"
                                        class="btn btn-primary mt-3 rounded-pill updateInfoBtn">
                                        Confirm Information
                                    </a>
                                @endif
                            </div>
                        </li>

                        @php
                            $previousSchool = \App\Models\previous_school::where('school_id', $registerForm->id)->first();
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Previous School Details</div>
                                <p>Provided information about the student's previous school.</p>
                            </div>
                            <div>
                                @if ($previousSchool && $previousSchool->status === 'approved')
                                    <span class="badge bg-success rounded-pill">Completed</span>
                                @else
                                    <a href="{{ route('updateschool.id', ['id' => $school_id]) }}" 
    class="btn btn-primary mt-3 rounded-pill updateInfoBtn">
                                        Confirm Information
                                    </a>
                                @endif
                            </div>
                        </li>

                        @php
                            $existingDocs = \App\Models\required_docs::where('required_id', $registerForm->id)->first();
                        @endphp
                        
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Required Documents Upload</div>
                                <p>Uploaded all the required documents for enrollment.</p>
                            </div>
                            <div>
                                @if ($existingDocs && $existingDocs->status === 'approved')
                                    <span class="badge bg-success rounded-pill">Completed</span>
                                @else
                                    <a href="{{ route('updatedocuments.id', ['id' => $required_id]) }}"
                                        class="btn btn-primary mt-3 rounded-pill updateInfoBtn">
                                        Confirm Information
                                    </a>
                                @endif
                            </div>
                        </li>
                        @endif

                        @php
                            $paymentForm = App\Models\payment_form::where('payment_id', $registerForm->id)->first();
                            $paymentStatus = $paymentForm ? $paymentForm->status : null;
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Cashier</div>
                                <p>Waiting for the Cashier approval. Refresh to check approval.</p>
                                @if ($paymentStatus === 'pending')
                                    <small class="text-muted">You will be notified once the payment is approved.</small>
                                @endif
                            </div>
                            <div>
                                @if ($paymentStatus === 'approved')
                                    <span class="badge bg-success rounded-pill">Completed</span>
                                @elseif ($paymentStatus === 'pending')
                                    <span class="badge bg-warning rounded-pill">Pending</span>
                                @else
                                    <span class="badge bg-danger rounded-pill">Not Found</span>
                                @endif
                            </div>
                        </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Sectioning</div>
                            <p>Assign the student to a specific section or class.</p>
                        </div>
                        <div>
                            @if ($assignStatus === 'assigned')
                                <span class="badge bg-success rounded-pill">Completed</span>
                            @else
                                <span class="badge bg-warning rounded-pill">Pending</span>
                            @endif
                        </div>
                    </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Officially Enrolled</div>
                                <p>Officially enrolled in the school.</p>
                            </div>
                            <div>
                                @if ($allCompleted)
                                    <span class="badge bg-success rounded-pill">Completed</span>
                                    <script>
                                        launchConfetti();
                                    </script>
                                @else
                                    <span class="badge bg-warning rounded-pill">Pending</span>
                                @endif
                            </div>
                        </li>
                    </ol>
                </form>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti/dist/confetti.browser.min.js"></script>

<script>
    let confettiLaunched = false; 

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.updateInfoBtn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const url = this.getAttribute('href'); 

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be redirected to update your information. PS: You can't update your information again once submitted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        setTimeout(() => {
                            window.location.href = url; 
                        }, 1000);
                    }
                });
            });
        });

        const allCompleted = @json($allCompleted);
        if (allCompleted && !confettiLaunched) {
            launchConfetti();
            confettiLaunched = true; 
        }
    });

    function launchConfetti() {
        const duration = 1 * 1000; 
        const animationEnd = Date.now() + duration;

        (function frame() {
            if (Date.now() > animationEnd) return;

            confetti({
                particleCount: 40,
                angle: 90,
                spread: 70,
                origin: {
                    x: Math.random(),
                    y: Math.random() - 0.2
                },
                scalar: 1.2
            });

            requestAnimationFrame(frame);
        })();
    }
</script>

@include('templates.studentfooter')