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

    #main {
        transition: margin-left .3s;
        padding: 0px;
    }
    h1{
        font-size:24px;
    }
    .btn-primary {
        background-color: #008080;
        border-color: #008080;
    }

    .btn-primary:hover {
        background-color: #006060;
        border-color: #006060;
    }
</style>




    <div class="header-container">
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open()">&#9776;</button>
        <div class="w3-container" style="margin-left: 15px;">
            <h1>Accounting Dashboard</h1>
        </div>
        
    </div>
    <div id="main" onclick="w3_close()">
    <p>To be designed...</p>
</div>

@include('templates.accountingfooter')