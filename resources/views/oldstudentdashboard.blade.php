@include('templates.oldstudentheader')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: white;
        margin: 0;
        padding: 0;
    }

    /* #main {
        max-width: 100%;
        margin: 0 auto;
        padding: 0px;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        position: relative; 
    } */

    .header-container {
        display: flex; 
        align-items: center; 
        background-color: rgba(8, 16, 66, 1); 
        color:white;
        padding: 10px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5); 
            }
    .nav-button {
        margin-right: 15px; 
        margin-bottom: 4px;
    }


    h1 {
            margin: 0; 
            font-family: 'Arial', sans-serif;
            font-size: 17px;
        }
    h2 {
        font-weight: bold;
        margin: 20px 0 10px 0;
        color: black;
    }

    p {
        color: black;
        line-height: 1.6;
    }

    img {
            max-width: 100%; /* Make image responsive */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 20px;
        }

        ul, ol {
            text-align: center;
            margin: 0 auto;
            padding: 0;
            list-style-position: inside;
        }

        li {
            margin: 5px 0;
        }

    
      
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column; /* Stack items on smaller screens */
                align-items: flex-start; /* Align items to the start */
            }

            h1 {
                font-size: 18px; /* Adjust heading size */
            }

            .nav-button {
                margin-bottom: 10px; /* Adjust button margin */
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
        <img src="{{ asset('image/uclogo.png') }}" alt="University Logo" style="max-width: 200px; margin-bottom: 20px;">

        <h2>VISION</h2>
        <p>Democratize quality education.<br>
        Be the visionary and industry leader.<br>
        Give hope and transform lives.</p>

        <h2>MISSION</h2>
        <p>University of Cebu offers affordable and quality education responsive to the demands of local and<br> international communities. University of Cebu commits to:</p>
        <ul style="list-style-type: none; padding: 0; text-align: left; display: inline-block; margin-right:-12%;">
            <li>- Serve as an active catalyst in providing efficient and effective delivery of educational services;</li>
            <li>- Pursue excellence in instruction, research and community service towards social and economic development;</li>
            <li>- Acquire, disseminate and utilize appropriate technology to enhance the university's educational services;</li>
            <li>- Foster an organizational culture that nurtures employee productivity and innovation.</li>
        </ul>

        <h2>INSTITUTIONAL GOALS</h2>
        <ol style="text-align: justify; display: inline-block; margin-right:-8%;">
            <li>To offer programs that are relevant, holistic and compliant with the standards of higher education.</li>
            <li>To develop effective learning environments that will develop life-long learners.</li>
            <li>To develop social awareness, responsibility and accountability among students.</li>
            <li>To complement the academic programs with holistic and integrated student personnel services.</li>
            <li>To provide a pool of qualified, professional and motivated faculty in the areas of instruction, research <br>and community extension.</li>
        </ol>
    </div>
</div>

@include('templates.oldstudentfooter')


