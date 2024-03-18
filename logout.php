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
    <title>Document</title>
    <style>
     .menengah {
        margin: 0 auto; /* This will center the element horizontally */
        text-align: center; /* This will center the text inside the element */
        background-color: darkred;
     }
</style>  
</head>
<body class="menengah">
    <?php
    session_destroy();
    echo'<meta http-equiv="refresh" content="2;url=index.html"> ';
    echo'<div><img src="voc.gif" width="250px"></div>';
    echo'<progress max=100><strong>Progress: 60%
        done.</strong></progress><br>';
    echo'<span style="color:white; font-size: 50px;">logging out...</span>';   
    ?>
</body>
</html>
