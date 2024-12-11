@include('templates.studentheader')
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

    .nav-button {
        margin-right: 15px; 
       
    }

    h1 {
            margin: 0; 
            font-family: 'Arial', sans-serif;
            font-size: 17px;
            
        }

    .content {
        text-align: center; 
        margin: 20px;
    }

    label {
        display: block;
        font-size: 18px;
        color: #333;
        margin: 20px 0;
    }

    h2 {
        font-weight: bold;
        margin: 20px 0 10px 0;
        color: #333;
    }

    p {
        color: #555;
        line-height: 1.6;
    }

    img {
        max-width: 200px;
        margin-bottom: 20px;
    }

    ul, ol {
        text-align: left;
        margin: 0 auto;
        padding: 0;
        list-style-position: inside;
        max-width: 600px; /* Centering the list */
    }

    li {
        margin: 5px 0;
    }
   
        /* Responsive styles */
        @media (max-width: 768px) {
            .header-container {
                justify-content: flex-start; /* Align items to the start */
            }

            h1 {
                font-size: 18px; /* Adjust heading size */
            }

            .nav-button {
                margin-right: 10px; /* Adjust margin for mobile */
            }

            .content {
                margin: 10px; /* Reduce margin on smaller screens */
            }

            ul, ol {
                text-align: left; /* Align lists to the left on mobile */
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 16px; /* Further reduce heading size */
            }

            h2 {
                font-size: 18px; /* Adjust h2 size */
            }

            p {
                font-size: 14px; /* Adjust paragraph size */
            }
        }
   
     
</style>

    <div class="header-container"> 
        <button id="openNav" class="w3-button w3-xlarge nav-button" onclick="w3_open(event)">&#9776;</button>
        <h1>Student Dashboard</h1> 
    </div>
   
    <div id="main" onclick="w3_close()">
    <div class="content" style="text-align: center; margin: 20px;">
    <div class="content">
        <img src="image/uclogo.png" alt="University Logo">

        <h2>VISION</h2>
        <p>Democratize quality education.<br>
        Be the visionary and industry leader.<br>
        Give hope and transform lives.</p>

        <h2>MISSION</h2>
        <p>University of Cebu offers affordable and quality education responsive to the demands of local and international communities. University of Cebu commits to:</p>
        <ul>
            <li>- Serve as an active catalyst in providing efficient and effective delivery of educational services;</li>
            <li>- Pursue excellence in instruction, research and community service towards social and economic development;</li>
            <li>- Acquire, disseminate and utilize appropriate technology to enhance the university's educational services;</li>
            <li>- Foster an organizational culture that nurtures employee productivity and innovation.</li>
        </ul>

        <h2>INSTITUTIONAL GOALS</h2>
        <ol>
            <li>To offer programs that are relevant, holistic and compliant with the standards of higher education.</li>
            <li>To develop effective learning environments that will develop life-long learners.</li>
            <li>To develop social awareness, responsibility and accountability among students.</li>
            <li>To complement the academic programs with holistic and integrated student personnel services.</li>
            <li>To provide a pool of qualified, professional and motivated faculty in the areas of instruction, research and community extension.</li>
        </ol>

  
    </div>
</div>



@include('templates.studentfooter')