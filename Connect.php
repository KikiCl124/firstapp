<?php
$dbhost ="localhost";
$dbname ="crudoperation";
$dbpw   ="";
$dbuser ="root";
$testconnection= mysqli_connect($dbhost,$dbuser,$dbpw,$dbname);

if (!$testconnection) { 
  die("Koneksi ke database gagal... alasan = " .mysqli_connect_errno(). "-".mysqli_connect_error());
} else {
  echo '<p style="color:red;"><b>Database are in fact connected. Database: <a style="color:blue;">' . $dbname . '</a> </b></p>';
}
?>