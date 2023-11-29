<?php 
require 'function.php';
if ( isset($_POST["register"]) ) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('data berhassil di inputkan');
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
    <link rel="stylesheet" href="components/css/header.css">
    <link rel="stylesheet" href="components/css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="head">
        <div class="logo">
         <span></span>
        </div>
<!-- 
        <div class="login">
            <a href="#">Masuk</a>
        </div> -->
    </header>

    <div class="container">
        <div class="cover">
            <div class="peduli">
                <font class="title"></font>
            </div>
            <br><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="nik">
                <input type="text" name="nik" id="nik" placeholder="NIK">
            </div>
            <br>
            <div class="nama-lengkap div">
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap">
            </div>
            <br>
            <div class="password div">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <br>
            <div class="nama-lengkap div">
                <input type="text" name="email" id="email" placeholder="Email">
            </div>
            <br>
            <div class="nama-lengkap div">
                <input type="file" name="foto" id="foto" placeholder="Foto">
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