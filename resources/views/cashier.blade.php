@include('templates.cashierheader')

<style>
  

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
        padding: 0px;
    }

    .card {
        border-radius: 8px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .list-group-item {
        transition: background-color 0.3s;
    }

    .list-group-item:hover {
        background-color: #e9ecef;
    }

    h1, h5 {
        margin: 0;
    }



    .btn {
      
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
    h1{
        font-size:17px;
        font-family: 'Arial', sans-serif;
        
    }
    .card-header{
        background-color: rgba(8, 16, 66, 1); 
    }
  
 
</style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open()">&#9776;</button>
        <div class="w3-container" style="margin-left: 5px;">
            <h1>Cashier Dashboard</h1>
        </div>
    </div>
    
    <div id="main" onclick="w3_close()">

    <div class="container mt-4 mb-5">
        <div class="row">
            <!-- Account Summary Card -->
            <div class="col-md-12 mb-4">
                <div class="card border-primary shadow-sm">
                    <div class="card-header text-white">
                        <h5>Payment Summary</h5>
                    </div>
                    <div class="card-body text-center">
                        <p class="h4" style="font-family: 'Arial', sans-serif;" >Pending Payment: <span class="text-warning">{{ $pendingCount }}</span></p>
                        <p class="h4" style="font-family: 'Arial', sans-serif;">Approved Payment: <span class="text-success">{{ $approvedCount }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Student Information Card -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Student Information</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($students as $student)
                                <li class="list-group-item">{{ $student->firstname }} {{ $student->lastname }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('templates.cashierfooter')
