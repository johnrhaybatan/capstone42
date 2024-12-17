@include('templates.studentheader')
<!-- 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->


<style>
      .header-container {
        display: flex; 
        align-items: center; 
        background-color: rgba(8, 16, 66, 1); 
        color:white;
        padding: 10px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5); 
    }

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

    h1 {
            margin: 0; 
            font-family: 'Arial', sans-serif;
            font-size: 17px;
            
        }
        .backbtn{
            font-size:18px;
            font-family:'Arial',sans-serif;
            

        }
        .btnback{
            background-color:rgba(8, 16, 66, 1);
            color:white;
            border:none;
            border-radius:5px;
            margin:20px 50px;
            box-shadow:0 2px 10px rgba(0, 0, 0, 0.5); 
            padding:5px;
            
        }
        .btnback:hover{
            background-color:rgba(9, 23, 128);
            text-decoration:none;
        }
        .btnback a{
            color:white;
            padding:15px;
            text-decoration:none;
        }

</style>


<div class="header-container"> 
            <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open(event)">&#9776;</button>
            <h1>Student Profile</h1> 
        </div>
        
        <div id="main" onclick="w3_close()">
            
        <div class="backbtn">
        <button type="button" class="btnback"><a href="/studentdashboard">Back to Dashboard</a></button>
    </div>
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
                                <h5 class="mb-1 uppercase" id="firstnameDisplay">{{ $profile->firstname }} {{ $profile->middlename }} {{ $profile->lastname }} {{ $profile->suffix }}</h5>
                                <p class="mb-2 pb-1">Student ID: 232023</p>
                                <div class="d-flex justify-content-between bg-light rounded-3 p-2 mb-2">
                                    <div>
                                        <p class="small text-muted mb-1">Grade Level</p>
                                        <p class="mb-0">{{ $level->level }}</p>
                                    </div>
                                    <div>
                                        <p class="small text-muted mb-1">Email</p>
                                        <p class="mb-0">{{ $profile->email }}</p>
                                    </div>
                                    <div class="d-flex justify-content-end pt-1">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $profile->firstname }}">
                        </div>
                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $profile->middlename }}">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $profile->lastname }}">
                        </div>
                        <div class="form-group">
                            <label for="suffix">Suffix</label>
                            <input type="text" class="form-control" id="suffix" name="suffix" value="{{ $profile->suffix }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  

    document.getElementById('saveChanges').addEventListener('click', function() {
        const formData = {
            firstname: document.getElementById('firstname').value,
            middlename: document.getElementById('middlename').value,
            lastname: document.getElementById('lastname').value,
            suffix: document.getElementById('suffix').value,
        };

        $.ajax({
            url: '{{ route('update.profile') }}',
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#editProfileModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success,
                    confirmButtonText: 'OK'
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
                    confirmButtonText: 'OK'
                });
            }
        });
    });
</script>

@include('templates.studentfooter')