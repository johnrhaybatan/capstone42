@include('templates.principalheader')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: white; /* Consistent background */
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

    .w3-teal {
        background-color: #0c3b6d; /* Match header color */
    }

    h1 {
        margin: 0; 
        font-size: 17px;
    }
    .container{
        padding:50px;
        
    }

</style>

<div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open(event)">&#9776;</button>
        <h1>Sectioning</h1>
    </div>
    <div id="main" onclick="w3_close()">

    <div class="container">
        <form action="/sectioning" method="GET">
            @csrf
            <div class="fee-list">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex">
                        <div class="input-group mr-3">
                            <input type="text" class="form-control" placeholder="Search..." aria-label="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Refresh Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Grade Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                @php
                                    $payment = $payments->firstWhere('payment_id', $student->id);
                                    $status = $payment ? $payment->status : 'No payment';
                                @endphp
                                
                                @if ($status === 'approved')
                                    <tr>
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->firstname }}</td>
                                        <td>{{ $student->middlename }}</td>
                                        <td>
                                            {{ $payment->level ?? 'N/A' }}
                                        </td>
                                        <td>
                                            @if ($payment)
                                                <a href="/assigning/{{ $student->id }}" class="btn btn-info btn-sm view-studententry" title="View">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M7.998 2c-2.757 0-5.287 1.417-6.758 3.75a.748.748 0 0 0 0 .5c1.471 2.333 4.001 3.75 6.758 3.75s5.287-1.417 6.758-3.75a.748.748 0 0 0 0-.5c-1.471-2.333-4.001-3.75-6.758-3.75zm0 1.5a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5zm0 2a1.75 1.75 0 1 0 0 3.5 1.75 1.75 0 0 0 0-3.5z" />
                                                    </svg>
                                                </a>
                                            @else
                                                <span>No payment found</span>
                                            @endif
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

@include('templates.principalfooter')