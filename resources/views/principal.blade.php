@include('templates.principalheader')
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: white;
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

.header-container h1 {
    margin: 0;
    font-size: 17px;
    flex-grow: 1;
    text-align: left;
}

.dashboard-card {
    z-index: 1;
    background: rgba(8, 16, 66, 1);
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 10px;
    position: relative;
}

/* Increased the scale factor on hover to 1.1 for a more subtle effect */
.dashboard-card:hover {
    transform: scale(1.1);
}

h3 {
    margin: 10px 0;
    color: #00796b;
}

/* Adjusted the margin-top for paragraphs to 8px to provide better spacing */
p {
    color: white;
    margin-top: 8px;
    text-decoration:none;
}
.w3-dashyboard{
    text-decoration:none;
    color:white;
}
.w3-dashyboard h3{
    text-decoration:none;
    font-family:'Arial', sans-serif;
    color:white;
    font-size:24px;
}
.w3-dashyboard svg{
    max-width:400%;
}

@media (max-width: 768px) {
    .dashboard-card {
        margin-bottom: 20px;
    }
}

h1 {
    font-size: 20px;
}


</style>


    <div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open(event)">&#9776;</button>
        <h1>Principal Dashboard</h1>

    </div>
    <div id="main" onclick="w3_close()">
    <div class="w3-container">
        <div class="w3-row">
            <div class="w3-col s6 m4 l3">
                <div class="dashboard-card">
                    <a href="/principalstudent" class="w3-dashyboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm11-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm-2 3a.5.5 0 0 1 0 1h2a.5.5 0 0 1 0-1zm0 3a.5.5 0 0 1 0 1h2a.5.5 0 0 1 0-1zM24 4a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 24 4z" />
                        </svg>
                        <h3>Students Applicant</h3>
                        <p>View and manage student applications.</p>
                    </a>
                </div>
            </div>
            <div class="w3-col s6 m4 l3">
                <div class="dashboard-card">
                    <a href="/principalclassload" class="w3-dashyboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4" />
                        </svg>
                        <h3>Subjects</h3>
                        <p>Manage and view available subjects.</p>
                    </a>
                </div>
            </div>
            <div class="w3-col s6 m4 l3">
                <div class="dashboard-card">
                    <a href="principalteacher" class="w3-dashyboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1z" />
                        </svg>
                        <h3>Faculty</h3>
                        <p>Manage and view faculty information.</p>
                    </a>
                </div>
            </div>
            <div class="w3-col s6 m4 l3">
                <div class="dashboard-card">
                    <a href="#" class="w3-dashyboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                            <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1z" />
                        </svg>
                        <h3>Department</h3>
                        <p>View and manage department information.</p>
                    </a>
                </div>
            </div>
            <div class="w3-col s6 m4 l3">
                <div class="dashboard-card">
                    <a href="#" class="w3-dashyboard">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-align-center" viewBox="0 0 16 16">
                            <path d="M8 1a.5.5 0 0 1 .5.5V6h-1V1.5A.5.5 0 0 1 8 1m0 14a.5.5 0 0 1-.5-.5V10h1v4.5a.5.5 0 0 1-.5.5m-4-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1z" />
                        </svg>
                        <h3>Class</h3>
                        <p>Manage and view class information.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>




    @include('templates.principalfooter')