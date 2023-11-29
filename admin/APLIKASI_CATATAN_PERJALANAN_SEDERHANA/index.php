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

$user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $userlogin")
or die;
$data_user = mysqli_fetch_array($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="components/css/header.css">
    <link rel="stylesheet" href="components/css/index.css">
    <link rel="stylesheet" href="components/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="head">
        <div class="logo">
             <span>APLIKASI CATATAN PERJALANAN</span>
        </div>

        <div class="login">
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <div class="container">
    <?php

        ?>
        <div class="image">
            <img src="assets/<?php echo $data_user["foto"] ?>" alt="image">
        </div>
        <div class="cover">
            <div class="tit">
            <div class="hero">
                <font class="hero">PEDULI DIRI</font>
            </div>

            <div class="sub">
                <font class="sub">Catatan Perjalanan </font>
            </div>

            <div class="bread-crumbs">
                <nav>
                    <a href="index.php">Dashboard |</a> 
                    <a href="catatan.php">Catatan Perjalanan |</a> 
                    <a href="isi.php ?>">Isi Data</a>
                </nav>
            </div>
            </div>
            
            <div class="tit-2">
            <div class="sambutan">
                Selamat Datang &nbsp; <strong class="nama"><?php echo $data_user["nama"]; ?></strong> &nbsp;di aplikasi peduli diri
            </div>

            <div class="cover-isi">
                <div class="isi">
                    <a href="isi.php">Isi catatan perjalanan</a>
                </div> 
            </div>
        </div>
    </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="medsos">
            <a href="https://www.instagram.com/iqballmhtrm_ "><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-telegram"></i></a>
        </div>

    </footer>
</body>
</html>