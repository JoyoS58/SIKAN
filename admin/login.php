<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
}

require 'function.php';


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sel = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sel);

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek session 
        // cek password/
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = $row["id_admin"];
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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="head">
        <div class="logo">
            <h1></h1>
        </div>
    </header>

    <?php if(isset($error)) :?>
        <div class="yy">
        <div class="alert alert-danger alert-dismissible fade show text-center col-md-5" role="alert">
  <strong>NIK/Password Salah</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        </div>
    <?php endif;?>

    <div class="container">
        <div class="cover">
            <div class="cover-2">
                <div class="item-1">
                    <h2>ORDER BARANG DI TOKO KAMI</h2>
                </div>
                <form action="" method="post">
            <div class="item-2">
                <input type="text" placeholder="Username" name="username">
            </div>
            <br>
        <div class="item-3">
        <input type="password" placeholder="Password" name="password">
        </div>
        <br>
        <div class="button-1">
            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
        </div>
        <div class="button-2">
            <button type="button" class="btn btn-success"><a href="register.php">Pengguna baru</a></button>
        </div>
        </form>
         </div>

    </div>     
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> 