<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;  
}

require 'function.php';  

if($_SESSION["login"]) {
    $userlogin = $_SESSION["login"];
} else {
    echo "salah";
}

$user = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $userlogin")
or die;
$data_user = mysqli_fetch_array($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <header class="head">
        <div class="logo">
            <span></span>
        </div>
        <div class="navbar">
                <a href="index.php">HOME</a> 
                <a href="catatan.php">CATATAN PERJALANAN</a> 
                <a href="user.php">USER</a> 
            </div>
        <div class="login">
            <a href="logout.php">keluar</a>
        </div>
    </header>
    <div class="cover-luar">
        <div class="cover">
            <div>
                <h2>PEDULI DIRI</h2>
            </div>
            <div>
                <p>Catatan Perjalanan</p>
            </div>

            <div class="textbox">
                <font>Selamat Datang <?php echo $data_user["username"] ?></font> 
            </div>
        </div>
    </div>
</body>
</html>