<?php
session_start();
if (!isset($_SESSION["nama"])){
    header("Location:wrong.php");
}

include 'Connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Tekaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom, rgba(155, 0, 0, 1) 2%, black 75%);
        }
        .image-container {
            display: flex;
            position: absolute;
            top: 10%;
            left: 5%;
            transform: translate(-50%, -50%);
            z-index: 1; 
        }        
        .song {
            position: absolute;
            top: 10%;
            left: 62%;
            transform: translate(-50%, -50%);
        }        
        .song2 {
            position: absolute;
            top: 10%;
            left: 38%;
            transform: translate(-50%, -50%);
        }
        .file-input {
            display: none;
        }

        .preview-container {
            margin-top:20px;
            max-width: 200px;
            overflow: hidden;
        }

        .preview-image {
            max-width: 100%;
            height: auto;
        }    
        .button-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }        
        .card-body{
            -ms-flex:1 1 auto;
            flex:1 1 auto;
            padding:1.25rem;
            max-width: 90%;
        }
        .profil-container {
            max-width: 300px; 
            max-height: 200px; 
        }

        .profil-container img {
            width: 100%; 
            height: auto;
        }
    </style>
    <script>
        function previewImage() {
            var fileInput = document.getElementById('file-upload');
            var preview = document.getElementById('preview-image');
            
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                preview.src = 'placeholder.png';
            }
        }
    </script>
<body> 
    <div class="image-container">
        <img src="oi.png" alt="Your Image" width="100">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div style="profil-container">
        <img id="preview-image" alt="Choosed Image" class="profil-container img" src="placeholder.png">
    </div>
        <div class="card-body">
        <form method="post" action="Process.php" enctype="multipart/form-data">
            <div class="mb-3">
                <h3 class="text-danger">Nama</h3>
                <input type="text" class="form-control" aria-describedby="NamalHelp" name="nama" autocomplete="off" required>
                <div id="NamaHelp" class="text-light">Nama lengkap member siswa.</div>
            </div>
            <div class="mb-3">
                <h3 class="text-danger">NIK Siswa</h3>
                <input type="text" class="form-control" id="InputNIK" aria-describedby="NIKlHelp" name="nik" autocomplete="off" required>
                <div id="NIKHelp" class="text-light">NIK hanya berupa nomor</div>
            </div>
            <div class="mb-3">
                <h3 class="text-danger">Nomor Handphone</h3>
                <input type="text" class="form-control" id="InputHP" aria-describedby="HPlHelp" name="nomor" autocomplete="off" required>
                <div id="HPHelp" class="text-light">Nomor Handphone hanya berupa nomor</div>
            </div>
            <div class="mb-3">
                <h3 class="text-danger">Kelas</h3>
                <input type="text" class="form-control" id="InputKelas" aria-describedby="KelaslHelp" name="kelas" autocomplete="off" required>
                <div id="kelas" class="text-light">Contoh : XI TKJ 5</div>
            </div>
            <div class="mb-3">
                <h3 class="text-danger">Profile Akun</h3>
                <input type="file" class="form-control" id="file-upload" accept=".png, .jpeg, .pdf, .jpg, .gif" name="profiles" autocomplete="off" required onchange="previewImage()">
                <div id="file-upload" class="text-light preview-container"> PNG, JPG, GIF, JPEG, PDF</div>  
            <button type="submit" class="btn btn-primary" name="submit">Buat</button>
            </div> 
        </form>
        <a href="View.php"><button type="back" class="btn btn-danger" name="back">Kembali</button></a>
    </div>
    <script>
        document.querySelector("form").addEventListener("submit", function (event) {
            const nikInput = document.querySelector("#InputNIK");
            if (nikInput.value.length !== 10) {
                alert("NIK harus terdiri dari 10 angka.");
                event.preventDefault();
            }
        });
        document.querySelector("form").addEventListener("submit", function (event) {
         const nikInput = document.querySelector("#InputHP");
         if (nikInput.value.length !<= 18) {
             alert("Nomor Handphone harus terdiri dari 18 angka.");
              event.preventDefault();
            }
        });
    </script>

</body>
</html>