<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
}

require 'function.php';


if (isset($_POST["login"])) {
    $nik = $_POST["nik"];
    $password = $_POST["password"];

    $sel = "SELECT * FROM user WHERE nik = '$nik'";
    $result = mysqli_query($conn, $sel);

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek session 
        // cek password/
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = $row["id_user"];
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN APLIKASI </title>
    <link rel="stylesheet" href="components/css/header.css">
    <link rel="stylesheet" href="components/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="head">
        <!--<div class="logo">
            SMKN 1 <span>Sumenep</span>
        </div>

        <div class="login">
            <a href="#">Masuk</a>
        </div> -->
    </header>

    <div class="container">
        <div     class="cover">
            <div class="peduli">
                <font class="title">LOGIN </font>
            </div>
        <form action="" method="post">
            <div class="nik">
                <label for="nik" class="nik"><i class="fas fa-user"></i></label>
                <input type="text" name="nik" id="nik" placeholder="NIK">
            </div>
            <br>
            <div class="nama-lengkap">
                <label for="password" class="password"><i class="fas fa-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
        
            <div class="but">
                <div class="reg">
                    <a href="register.php" class="pen">Daftar</a>
                </div> 
                <button type="submit" name="login">Masuk</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>     