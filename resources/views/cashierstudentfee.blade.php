@include('templates.cashierheader')

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

    h1, h4 {
        margin: 0;
    }

    .text-center {
        text-align: center;
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
    h1{
        font-size:17px;
    }
</style>

 <div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open()">&#9776;</button>
        <div class="w3-container" style="margin-left: 15px;">
            <h1>Pending Payments</h1>
        </div>
    </div>
    <div id="main" onclick="w3_close()">

    <div class="container" style="width: 80%; border: 1px solid #ccc; padding: 20px;">
        <form action="/cashierstudentfee" method="POST">
            @csrf
            <div class="fee-list">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Pending Student Fees</h4>
                    <div class="d-flex">
                        <div class="input-group mr-3">
                            <input type="text" class="form-control" placeholder="Search..." aria-label="Search"
                                   name="search" id="searchInput" onkeyup="filterTable()">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Refresh Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)">
                                    <label for="selectAll" style="margin-left: 5px;">Select All</label>
                                </th>
                                <th>Status</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Year Level</th>
                                <th>Fee Type</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                            @php
                                $payment = $payments->firstWhere('payment_id', $student->id); 
                                $status = $payment ? $payment->status : 'No payment';
                            @endphp
                            @if ($payment && $status === 'pending') 
                                <tr>
                                    <td>
                                        <input type="checkbox" name="payments[]" value="{{ $payment->id }}" class="paymentCheckbox">
                                    </td>
                                    <td>{{ $status }}</td>
                                    <td>{{ $student->lastname }}</td>
                                    <td>{{ $student->firstname }}</td>
                                    <td>{{ $student->middlename }}</td>
                                    <td>{{ $payment->level ?? 'N/A' }}</td>
                                    <td>{{ $payment->fee_type ?? 'N/A' }}</td>
                                    <td>{{ $payment->amount ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ url('proofofpayment/' . $payment->id) }}"
                                        class="btn btn-info btn-sm" title="View">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M7.998 2c-2.757 0-5.287 1.417-6.758 3.75a.748.748 0 0 0 0 .5c1.471 2.333 4.001 3.75 6.758 3.75s5.287-1.417 6.758-3.75a.748.748 0 0 0 0-.5c-1.471-2.333-4.001-3.75-6.758-3.75zm0 1.5a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5zm0 2a1.75 1.75 0 1 0 0 3.5 1.75 1.75 0 0 0 0-3.5z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Approve Selected Payments</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function filterTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('studentTable');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
            const td = tr[i].getElementsByTagName('td');
            let rowVisible = false;

            // Check each cell in the row for a match
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    const cellValue = td[j].textContent || td[j].innerText;
                    if (cellValue.toLowerCase().indexOf(filter) > -1) {
                        rowVisible = true; // Row matches search criteria
                        break;
                    }
                }
            }

            // Show or hide the row based on whether it matches the search
            tr[i].style.display = rowVisible ? '' : 'none';
        }
    }

    function toggleSelectAll(selectAllCheckbox) {
        const checkboxes = document.querySelectorAll('.paymentCheckbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }
</script>

@include('templates.cashierfooter')