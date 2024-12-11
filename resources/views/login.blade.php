<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" sizes="32x32" href="image/uclogo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UCLM Basic-ED LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  
   </script>
    <style>
        body {
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, rgba(0, 0, 0, 0.3) 70%, #001f3f 100%);
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            background-color: #0c76e0;
            position: relative;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 45%;
            transform: translate(-50%, -50%);
            z-index: 1;
            width: 100%;
            max-width: 450px; /* Maximum width for larger screens */
            padding: 0 20px; /* Padding for small screens */
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem; /* Adjusted padding for better fit */
            width: 200%; /* Full width of the container */
            height: auto; /* Set to auto for dynamic height based on content */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .logo img {
            width: 120px;
      
        }

        .education-text {
            color: grey; /* Set the text color to grey */
            margin-top: 0.5rem; /* Add some space above the text */
            font-weight: bold; /* Optional: Make the text bold */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .line {
            flex-grow: 1;
            height: 1px; /* Thickness of the line */
            background-color: #001f3f; /* Color of the line */
            margin: 0 10px; /* Space around the line */
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .form-check-label {
            margin-left: 0.5rem;
        }

        .btn-primary {
            background-color: #1A5794;
            border: none;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #004080;
        }

        a {
            color: #001F3F;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .hat {
            position: absolute;
            top: -80px;
            right: -22%;
            width: 240px;
            transform: rotate(14deg);
        }

        .santa-gif {
            position: absolute;
            bottom: -38%;
            left: -660px;
            width: 500px;
            overflow: hidden;
            animation: santa-ride 20s linear infinite;
        }

        .santa-gif img {
            width: 100%;
            height: auto;
        }

        @keyframes santa-ride {
            0% {
                transform: translateX(0) scaleX(1);
            }
            50% {
                transform: translateX(100vw) scaleX(1);
            }
            75% {
                transform: translateX(100vw) scaleX(-1);
            }
            100% {
                transform: translateX(0vw) scaleX(-1);
            }
        }

        #popoutImage {
            position: absolute;
            bottom: -4%; 
            left: 0%;
            width: 150px; 
            opacity: 0;
            transition: opacity 0.5s ease;
            
        }

        
        #popoutText {
            position: absolute;
            bottom: 22%; 
            left: 8.5%; 
            background-color: white;
            border: 2px solid #1A5794;
            border-radius: 5px;
            padding: 10px;
            font-size: 20px;
            color: #1A5794; 
            opacity: 0;
            transition: opacity 0.5s ease;
            box-shadow:0 4px 6px rgba(0, 0, 0, 0.5)
        }

        #musicControls {
            position: absolute;
            top: 20px; 
            right: 20px; 
            z-index: 2; 
        }

        .form-outline input {
            width: 100%; 
        }

        .btn-block {
            width: 100%; 
        }

        @media (max-width: 768px) {
            .container {
                width: 90%; 
                padding: 0; 
            }

            .card {
                padding: 1rem; 
            }

            .logo img {
                width: 100px; 
            }

            
            #musicControls,
            #popoutImage,
            #popoutText {
                display: none; 
            }
        }

        @media (max-width: 480px) {
            .hat {
                width: 150px; 
            }

            .santa-gif {
                width: 300px; 
            }

            #popoutImage {
                width: 100px; 
            }

            #popoutText {
                font-size: 16px; 
            }
        }

        #beat-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .beat {
        position: absolute;
        top: -50px;
        width: 30px;
        height: 30px;
        color: white;
        font-size: 1rem;
        opacity: 1;
        animation: fall linear infinite;
    }

    @keyframes fall {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
        100% {
            transform: translateY(110vh) rotate(360deg);
            opacity: 0;
        }
    }

    .beat:nth-child(odd) {
        animation-duration: 5s;
    }

    .beat:nth-child(even) {
        animation-duration: 7s;
    }
    .btn.btn-secondary
    {
        background-color:rgba(186, 30, 24);
        color:white;
        border-radius:10px;
        border:none;
        font-size:15px;
        box-shadow:0 4px 6px rgba(0, 0, 0, 0.2)
    }
    .btn.btn-secondary:hover
    {
        background-color:rgba(110, 15, 15);
        color:white;
      
    }
    .button-prim{
        background-color:rgba(8, 16, 66, 1);
        color:white;
        border-radius:10px;
        border:none;
        box-shadow:0 4px 6px rgba(0, 0, 0, 0.2)
    }
    .button-prim:hover{
        background-color:rgba(33, 15, 115);
        color:white;
    }
    </style>
</head>

<body>
    
    <audio id="backgroundMusic" autoplay loop muted>
        <source src="image/remix.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <div id="musicControls">
        <button id="playMusic" class="btn button-prim">Play Music</button>
        <button id="pauseMusic" class="btn btn-secondary">Pause Music</button>
    </div>

    <div id="beat-container"></div>

    <img id="popoutImage" src="image/jose1.png" alt="Pop-out Image">
    <div id="popoutText">Merry Christmas!</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img src="image/christmashat.png" alt="Santa Hat" class="hat">
                    <div class="santa-gif">
                        <img src="image/santaclaire.gif" alt="Santa Claus with Reindeer">
                    </div>
                    <div class="logo">
                        <img src="image/UCLOGO.png" alt="logo">
                    </div>
                    <div class="education-text" style="margin-top: 5px; margin-bottom:20px; font-size:13px; color:#001f3f;">
                        <div class="line"></div>
                        Basic Education
                        <div class="line"></div>
                    </div>

                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-outline mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-outline mb-3">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="showPassword">
                            <label class="form-check-label" for="showPassword">Show Password</label>
                        </div>
                        <button class="btn btn-primary btn-block mb-3" id="button">Login</button>
                        <a href="#" class="text-muted">Forgot Password?</a>
                    </form>

                    <div class="mt-4">
                        <p>Don't have an account? <a href="/register_consent" class="text-primary">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const snowContainer = document.getElementById('snow-container');

      

        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', () => {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });

        const audio = document.getElementById('backgroundMusic');
        let toggleInterval;

        document.getElementById('playMusic').addEventListener('click', () => {
            audio.muted = false; 
            audio.play(); 
            toggleImageAndText(); 
        });

        document.getElementById('pauseMusic').addEventListener('click', () => {
            audio.pause(); 
            stopImageAndText();
        });

        const popoutImage = document.getElementById('popoutImage');
        const popoutText = document.getElementById('popoutText');

        function toggleImageAndText() {
            popoutImage.style.opacity = 1; // Show image
            popoutText.style.opacity = 1; // Show text
            setTimeout(() => {
                popoutImage.style.opacity = 0; // Hide image
                popoutText.style.opacity = 0; // Hide text
            }, 3000); // Both shown for 3 seconds
            
            if (!toggleInterval) {
                toggleInterval = setInterval(() => {
                    popoutImage.style.opacity = 1;
                    popoutText.style.opacity = 1;
                    setTimeout(() => {
                        popoutImage.style.opacity = 0; 
                        popoutText.style.opacity = 0; 
                    }, 3000);
                }, 6000); // Repeat every 6 seconds
            }
        }

        function stopImageAndText() {
            clearInterval(toggleInterval); // Stop the interval
            toggleInterval = null; // Reset the interval variable
            popoutImage.style.opacity = 0; // Hide image
            popoutText.style.opacity = 0; // Hide text
        }



        const beatContainer = document.getElementById('beat-container');

        function createBeat() {
            const beat = document.createElement('div');
            beat.classList.add('beat');
            beat.style.left = Math.random() * 100 + 'vw';
            beat.style.animationDuration = Math.random() * 2 + 3 + 's';
            beat.innerHTML = '&#9835;'; 

            beatContainer.appendChild(beat);

            setTimeout(() => {
                beat.remove();
            }, 10000);
        }

        setInterval(createBeat, 200); 
    </script>
</body>

</html>