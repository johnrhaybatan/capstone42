@include('templates.teacherheader')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>


    .profile-image {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #007bff;
    }

    .nav-button {
        margin-right: 15px; 
        background: transparent;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }



    .header-container {
        display: flex; 
        align-items: center; 
        background-color: rgba(8, 16, 66, 1); 
        color:white;
        padding: 10px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5); 
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
        margin: 0;
        margin-left:-15%;
       
    }
</style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open(event)">&#9776;</button>
        <div class="w3-container" style="margin-left: 15px;">
            <h1>Teacher Submit Attendance</h1>
        </div>
    </div>
    <div id="main" onclick="w3_close()">
<section class="container-fluid py-5 bg-custom">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7 col-xl-6">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                 alt="Profile Image" class="profile-image">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1 uppercase" id="firstnameDisplay">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }} {{ $user->suffix }}</h5>
                            <div class="d-flex justify-content-between bg-light rounded-3 p-2 mb-2">
                                <div>
                                    <p class="small text-muted mb-1">Email</p>
                                    <p class="mb-0">{{ $user->email }}</p>
                                </div>
                                <div class="d-flex justify-content-end pt-1">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                        Edit Profile
                                    </button>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProfileForm">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middlename">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="suffix" class="form-label">Suffix</label>
                        <input type="text" class="form-control" id="suffix" name="suffix">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>



<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    const modal = new bootstrap.Modal(document.getElementById('editProfileModal'));

        document.querySelector('[data-bs-toggle="modal"]').addEventListener('click', () => {
            // Populate the modal with the existing profile data
            document.getElementById('firstname').value = "{{ $user->firstname }}";
            document.getElementById('middlename').value = "{{ $user->middlename }}";
            document.getElementById('lastname').value = "{{ $user->lastname }}";
            document.getElementById('suffix').value = "{{ $user->suffix }}";
            document.getElementById('email').value = "{{ $user->email }}"; // Read-only
            modal.show();
        });

        document.getElementById('saveChanges').addEventListener('click', function() {
            const formData = {
                firstname: document.getElementById('firstname').value,
                middlename: document.getElementById('middlename').value,
                lastname: document.getElementById('lastname').value,
                suffix: document.getElementById('suffix').value,
            };

            // AJAX request to save changes
            $.ajax({
                url: '{{ route('update.profile') }}',
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    modal.hide();
                    Swal.fire({
                        icon: 'success',
                        title: 'Profile Updated',
                        text: response.success,
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    const errorMessage = xhr.responseJSON && xhr.responseJSON.error ?
                        xhr.responseJSON.error :
                        'There was an error saving your changes. Please try again.';

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage,
                    });
                }
            });
        });
</script>

@include('templates.teacherfooter')