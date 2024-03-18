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
            top: 50%;
            left: 50%;
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
<?php
include 'Connect.php';

if (isset($_POST["submit"])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $nomor = $_POST['nomor'];
    $kelas = $_POST['kelas'];

    $file_name = $_FILES["profiles"]["name"];
    $file_tmp = $_FILES["profiles"]["tmp_name"];
    $file_path = "uploads/" . $file_name;

    $allowed_extensions = ['gif', 'png', 'jpeg', 'jpg', 'pdf', 'GIF', 'JPG', 'JPEG', 'PNG', '.PDF'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($file_extension, $allowed_extensions)) {

        if (move_uploaded_file($file_tmp, $file_path)) {
            $sql = "INSERT INTO crud (nama, nik, nomor, kelas, profiles) VALUES ('$nama', '$nik', '$nomor', '$kelas', '$file_path')";
            $result = $testconnection->query($sql);

            if ($result === FALSE) {
                die("Error: " . $sql . "<br>" . $testconnection->error);
            } else {
                echo '<span style="color: white;">Data berhasil terkirim</span>';
            }
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "<span style='color: white;'>File format not allowed. Please upload a GIF, PNG, JPEG, or PDF.</span>";
    }
}



$testconnection->close();
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


        </style>
    <body>
        <div class="image-container">
            <img src="voc.gif" alt="Your Image" width="500">
        </div>
        <div class="container my-5">
        <form method="post" action="CRUD.php">
            <input type="hidden" name="action" value="back_to_crud">
            <button type="submit" class="btn btn-danger">Buat lagi</button>
        </form>

        <div style="margin-top: 20px;"></div>

        <form method="post" action="View.php">
                <input type="hidden" name="action" value="go_to_view">
                <button type="submit" class="btn btn-danger">Lihat Table</button>
        </form>   
        </div>
    </body>
    </html>