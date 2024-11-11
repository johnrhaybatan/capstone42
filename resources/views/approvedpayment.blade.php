    @include('templates.cashierheader')

<div id="main">
    <div class="w3-teal">
        <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
            <h1>APPROVED PAYMENTS</h1>
        </div>
    </div>

    <div class="container" style="width: 80%; height: auto; border: 1px solid #ccc; padding: 20px;">
        <form action="/approvedpayment" method="GET">
            @csrf
            <div class="fee-list">
                <div class="d-flex justify-content-between align-items-center mb-3">
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
                                <th>Status</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Year Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            @php
                                // Fetch all payment records for the current student
                                $payments = App\Models\payment_form::where('payment_id', $student->id)->where('status', 'approved')->get(); // Get only approved payments
                            @endphp
                        
                            @if ($payments->isNotEmpty())
                                <tr>
                                    <td>{{ $payments->first()->status }}</td> <!-- Show the status of the first approved payment -->
                                    <td>{{ $student->lastname }}</td>
                                    <td>{{ $student->firstname }}</td>
                                    <td>{{ $student->middlename }}</td>
                                    <td>
                                        {{ $payments->first()->level ?? 'N/A' }} <!-- Show level of the first approved payment -->
                                    </td>
                                    <td>
                                        <a href="/proofofpayment/{{ $payments->first()->id }}"
                                           class="btn btn-info btn-sm view-studententry" title="View">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                 height="16" fill="currentColor" class="bi bi-eye"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M7.998 2c-2.757 0-5.287 1.417-6.758 3.75a.748.748 0 0 0 0 .5c1.471 2.333 4.001 3.75 6.758 3.75s5.287-1.417 6.758-3.75a.748.748 0 0 0 0-.5c-1.471-2.333-4.001-3.75-6.758-3.75zm0 1.5a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5zm0 2a1.75 1.75 0 1 0 0 3.5 1.75 1.75 0 0 0 0-3.5z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
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
</script>

@include('templates.cashierfooter')
