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
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom, rgba(255, 5, 5, 1) 25%, black 95%);
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: 1; 
        }
        td.edit-header{
            background-color: transparent;
            color: white;
        }
        th.edit-main{
            background: red;
            color: white;
        }
        tr.edit-headeragain{
            background-color: red;
            color:white;
        }        
        .image-container {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
        }        
        .song {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

    </style>    
<body>
    <div class="image-container">
        <img src="dESAIN GTW.png" alt="Your Image" width="280">
    </div>
    <div class="song">
    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/7CeUpXCzMOuqdvNXw2k3lY?utm_source=generator&theme=0" width="100%" height="82" frameBorder="0" alowfulllscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    </div>
    <div class="container">
        <button class="btn btn-primary"><a href="CRUD.php" class="text-light">Tambah Data</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col" class="edit-main">No</th>
      <th scope="col" class="edit-main">Profile</th>
      <th scope="col" class="edit-main">Nama</th>
      <th scope="col" class="edit-main">NIK</th>
      <th scope="col" class="edit-main">Nomor</th>
      <th scope="col" class="edit-main">Kelas</th>
      <td scope="col" class="edit-header">Edit</td>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * from crud";
    $result = $testconnection->query($sql);
    $i = 1;

    
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['ID'];
            $profile=$row['profiles'];
            $nama=$row['nama']; 
            $nik=$row['nik'];
            $nomor=$row['nomor'];
            $kelas=$row['kelas'];
            $allowedExtensions = array('gif', 'png', 'jpeg', 'jpg', 'pdf', 'GIF', 'JPG', 'JPEG', 'PNG', '.PDF');
            $fileExtension = pathinfo($profile, PATHINFO_EXTENSION);
            $imagePath = $profile;
            if (!file_exists($imagePath)) {
              $imagePath = 'file_not_found.jpg'; // Path to the "File Not Found" image
            }
            
            if (in_array($fileExtension, $allowedExtensions)) {
                echo'<tr>
                <th scope="row">'.$i++.'</th>
                <td><img src="'.$profile.'" alt="Profile Image" width="100"></td>
                <td>'.$nama.'</td>
                <td>'.$nik.'</td>
                <td>'.$nomor.'</td>
                <td>'.$kelas.'</td>
                //<td class="edit-header">
                <button class="btn btn-warning"><a href="Update.php?updateid='.$id.'" class="text-black">Update</a></button>
                <button class="btn btn-danger" onclick="confirmDelete(' . $id . ')">Delete</button>
                </td>
        
                </tr>';
            }
        }
    }
    
    ?>
    <script>
    function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = "Delete.php?deleteid=" + id;
    }
}
</script>

</body>
</html>
