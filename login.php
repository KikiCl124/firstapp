<?php
$pesan = '';
$error = '';
$username = '';

if (isset($_GET["pesan"])) {
    $pesan = $_GET["pesan"];
}
if (isset($_POST["submit"])) {
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));
    $error = "";

    if (empty($username)) {
        $error = "Jenengmu sopo ?";
    } elseif (empty($password)) {
        $error = "Password endi banh?";
    } else {
        include("Connect.php");
        $username = mysqli_real_escape_string($testconnection, $username);
        $password = mysqli_real_escape_string($testconnection, $password);

        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($testconnection, $query);

        if (!$result || mysqli_num_rows($result) === 0) {
            $error = "Username palsu salah!";
        } else {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['password'];

            if ($password === $stored_password) {
                session_start();
                $_SESSION['nama'] = $username;
                header("Location:View.php");
                exit();
            } else {
                $error = "Password e jeneng alias pacarmu mas.";
            }
        }

        mysqli_free_result($result);
        mysqli_close($testconnection);
    }
}
?>

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
            background: linear-gradient(to bottom, rgba(255, 5, 5, 1) 25%, black 95%);
            background-size: cover;
            background-attachment: fixed;
            flex-direction: column;
        }*{
            box-sizing: border-box;
        }form{
            width: 600px;
            border: 2px red;
            padding: 30px;
            border-radius: 15px;
            background-color: rgba(115, 5, 5, 1);
            font-family: sans-serif;
        }h2{
            text-align: center;
            margin-bottom:  40px;
        }input{
            display: block;
            border: 2px solid hsl(18, 84%, 55%);
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }
        label{
            color: hsl(18, 84%, 55%);
            font-size: 18px;
            padding: 10px;
            font-family: sans-serif;
        } button[type="submit"] {
            background-color: hsl(18, 84%, 55%);
            font-size: 15px;
            padding: 15px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
            transition: background-color 0.3s ease;
            margin: 10px auto;
            display: block;
            width: 50%;
        }

        button[type="submit"]:hover {
            background-color: hsl(9, 53%, 22%);
        }.error{
            background: #f2dede;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
            font-family: sans-serif;
        }h1{
            text-align: center;
            color: hsl(39, 84%, 65%);;
            font-size: 60px;
            font-family: sans-serif;
            
        }a{
            float: right;
            background: #555;
            padding: 10px 15px;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
            text-decoration: none;
            font-family: sans-serif;
        }a:hover{
            opacity: .7;
        }legend{
            color: hsl(18, 84%, 55%);
            font-family: sans-serif;
        }.image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }   
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</script>    
</head>
<body>
    <div class="container">
    <div class="image-container">
        <img src="oi.png" alt="Your Image" width="100">
        <h1><b>LOG IN</b></h1>
    </div>
    <form action = "login.php" method="post">
    <fieldset>
        <legend>Log In</legend>
            <p>
                <label for="username">Username =</label>
                <input type="text" name="username" id="username" value="<?php echo $username?>">
            </p>
            <p>
                <label for="password">Password =</label>
                <input type="password" name="password" id="password" value="">
            </p>
            <p>
                <button type="submit" name="submit">LOG IN</button>
            </p>
        </fieldset>
    </form>
    <?php 
    if (isset($pesan)){
       echo "<div class=\"pesan\">$pesan</div>";
    }
    if ($error !==""){
      echo "<div class=\"error\">$error</div>";
    }
    ?>
    </div>


</body>
</html>