<?php
include 'Connect.php';

function deleteFile($file_path) {
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "SELECT profiles FROM crud WHERE id = $id";
    $result = mysqli_query($testconnection, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $file_path = $row['profiles'];
        deleteFile($file_path);
    }

    $deleteSql = "DELETE FROM crud WHERE id = $id";
    $deleteResult = mysqli_query($testconnection, $deleteSql);

    if ($deleteResult) {
        echo "Data and file have been deleted";
        header('location:View.php');
    } else {
        die(mysqli_error($testconnection));
    }
}
?>
