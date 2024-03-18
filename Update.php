<?php
session_start();
if (!isset($_SESSION["nama"])){
    header("Location:wrong.php");
}

include 'Connect.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM `crud` WHERE id='$id'";
$result = $testconnection->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $nik = $row['nik'];
    $nomor = $row['nomor'];
    $kelas = $row['kelas'];
}

if (isset($_POST["edit"])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $nomor = $_POST['nomor'];
    $kelas = $_POST['kelas'];
    
    if ($_FILES["new_profiles"]["name"]) {
        $file_name = $_FILES["new_profiles"]["name"];
        $file_tmp = $_FILES["new_profiles"]["tmp_name"];
        $file_path = "uploads/" . $file_name;

        $allowed_extensions = ['gif', 'png', 'jpeg', 'jpg', 'pdf'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            if (move_uploaded_file($file_tmp, $file_path)) {
                if ($row['profiles'] !== 'uploads/default.jpg') {
                    unlink($row['profiles']);
                

                    $sql = "UPDATE `crud` SET nama='$nama', nik='$nik', nomor='$nomor', kelas='$kelas',  profiles='$file_path' WHERE id='$id'";
                    $result = $testconnection->query($sql);

                    if ($result === FALSE) {
                        die("Error: " . $sql . "<br>" . $testconnection->error);
                    } else {
                        header('location:View.php');
                    }
                }
            } else {
                echo "File upload failed.";
            }
        } else {
            echo "Invalid file format. Allowed formats: gif, png, jpeg, jpg, pdf.";
        }
    } else {
        $file_path = $row['profiles'];
    }
}

// NO IMAGE EDIT VER
if (isset($_POST["edit"])) {
    // Retrieve form data
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $nomor = $_POST['nomor'];
    $kelas = $_POST['kelas'];

    // Update the other fields except the image
    $sql = "UPDATE `crud` SET nama='$nama', nik='$nik', nomor='$nomor', kelas='$kelas' WHERE id='$id'";
    $result = $testconnection->query($sql);

    if ($result === FALSE) {
        die("Error: " . $sql . "<br>" . $testconnection->error);
    } else {
        // Redirect to the view page after updating
        header('location: View.php');
    }
}

if (isset($_POST["cancel"])) {
    header('location:View.php');
}

$testconnection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
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
        .text-container {
            position: absolute;
            top: 17%;
            left: 50%;
            transform: translate(-50%, -50%);
            color:Yellow;
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
        var fileInput = document.getElementById('new_profiles');
        var preview = document.getElementById('preview-image');
        
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            preview.src = '<?php echo $row['profiles']; ?>';
        }
}
</script>
<body>
<div class="image-container">
    <img src="oi.png" alt="Your Image" width="100">
    </div>
    <div class="text-container">
        <h3>Pengeditan Data :</h3>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <div style="profil-container">
    <img id="preview-image" alt="Choosed Image" class="profil-container img" src="<?php echo isset($row['profiles']) ? $row['profiles'] : $profile ; ?>">
    <form method="post" enctype="multipart/form-data">
    <input type="file" class="form-control" id="new_profiles" name="new_profiles" accept=".png, .jpeg, .jpg, .gif" onchange="previewImage()">
    </div>
    <div class="card-body">
    <form method="post">
        <div class="mb-3">
            <h3 class="text-danger">Nama</h3>
            <input type="text" class="form-control" aria-describedby="NamalHelp" name="nama"
                   autocomplete="off" value="<?php echo $nama; ?>">
            <div id="NamaHelp" class="text-light">Nama lengkap member siswa.</div>
        </div>
        <div class="mb-3">
            <h3 class="text-danger">NIK Siswa</h3>
            <input type="text" class="form-control" id="InputNIK" aria-describedby="NIKlHelp" name="nik"
                   autocomplete="off" value="<?php echo $nik; ?>">
            <div id="NIKHelp" class="text-light">NIK hanya berupa nomor</div>
        </div>
        <div class="mb-3">
            <h3 class="text-danger">Nomor Handphone</h3>
            <input type="text" class="form-control" id="InputHP" aria-describedby="HPlHelp" name="nomor"
                   autocomplete="off" value="<?php echo $nomor; ?>">
            <div id="HPHelp" class="text-light">Nomor Handphone hanya berupa nomor</div>
        </div>
        <div class="mb-3">
            <h3 class="text-danger">Kelas</h3>
            <input type="text" class="form-control" id="InputKelas" aria-describedby="KelaslHelp" name="kelas"
                   autocomplete="off" value="<?php echo $kelas; ?>">
            <div id="KelasHelp" class="text-light">Contoh : ( XI TKJ 5 )</div>
        </div>
        <button type="edit" class="btn btn-primary" name="edit">Ubah Data</button>
        <button type="cancel" class="btn btn-danger" name="cancel">Batal</button>
    </form>
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