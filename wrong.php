
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
         body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to left, rgba(255, 5, 5, 1) 15%, black 95%);
            background-size: cover;
            background-attachment: fixed;
            flex-direction: column;
        }*{
            box-sizing: border-box;
        } button[type="submit"] {
            background-color: hsl(18, 84%, 55%);
            font-size: 30px;
            padding: 15px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
            transition: background-color 0.3s ease;
            margin: 10px auto;
            display: block;
            width: 75%;
        }

        button[type="submit"]:hover {
            background-color: hsl(9, 53%, 22%);
        }h1{
            text-align: center;
            color: hsl(39, 84%, 65%);;
            font-size: 60px;
            font-family: sans-serif;
        }legend{
            color: hsl(18, 84%, 55%);
            font-family: sans-serif;
        }.image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }.loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        .loading video {
            width: 300px;
            height: auto;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wrong</title>
</head>
<body>
<div class="container">
    <div class="image-container">
        <img src="kys.gif" alt="Your Image" width="200">
    </div>
        <h1><b>You're not logged in</b></h1>
        <p>
            <button type="submit" onclick="displayLoading()">LOG IN</button>
        </p>
    </div>

    <div class="loading" id="loading" href="login.php">>
        <button type="button" onclick="skipLoading()">SKIP</button>
        <video id="loadingVideo">
            <source src="listen.mp4" type="video/mp4" >
            Your browser does not support the video tag.
        </video>
    </div>

    <script>
        function displayLoading() {
            var loadingVideo = document.getElementById("loadingVideo");
            var loading = document.getElementById("loading");
            loadingVideo.play();
            loading.style.display = "flex";
            setTimeout(function() {
                window.location.href = "login.php";
            }, 5000);
        }function skipLoading() {
        window.location.href = "login.php";
     }
    </script>
</body>
</html>
</html>