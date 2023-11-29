<?php 
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
}
require 'function.php';
if ( isset($_POST["register"]) ) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User Baru Berhasil Ditambahkan');
                document.location.href = 'index.php';
              </script>";
    }else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="cover">
            <div class="peduli">
                <font class="title">Peduli Diri</font>
            </div>
            <br><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="nik">
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <br>
            <div class="password div">
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <br>
            <div class="but">
                <div class="reg">
                    <a href="login.php" class="pen">Sudah Punya Akun ? Login</a>
                </div> 
                <br>
                <button type="submit" name="register">Register</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>