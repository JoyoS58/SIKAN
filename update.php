<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';  

//  ambil data di URL
$id = $_GET["id"];

// query data siswa berdasarkan id
$notes = query("SELECT * FROM catatan WHERE id_catatan = $id")[0];

//  cek apakah tombol sudah dipencet atau belum
 if ( isset($_POST["submit"]) ) {

    // cek apakah data berhasil diubah atau tidak 
    if( update($_POST) > 0 ){
        echo "<script>
                alert ('Data Berhasil Diubah');
                document.location.href = 'catatan.php';
              </script>";
    } else {
        echo "<script>
                alert ('Data Gagal Diubah');
                document.location.href = 'catatan.php';
              </script>";
    }
 }

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
    <title>Isi Data</title>
    <link rel="stylesheet" href="components/css/header.css">
    <link rel="stylesheet" href="components/css/isi.css">
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
        <div class="image">
        <img src="assets/<?php echo $data_user["foto"] ?>" alt="image">
        </div>
        <div class="cover">
            <div class="tit">
            <div class="hero">
                <font class="hero">Peduli Diri</font>
            </div>

            <div class="sub">
                <font class="sub">Catatan Perjalanan </font>
            </div>

            <div class="bread-crumbs">
                <nav>
                    <a href="index.php">Dashboard |</a> 
                    <a href="catatan.php">Catatan Perjalanan |</a> 
                    <a href="isi.php">Isi Data</a>
                </nav>
            </div>
            </div>

            <div class="form">
                <form action="" method="POST">
                    <input type="hidden" name="id_user" value="<?php echo $data_user["id_user"];?>">
                    <input type="hidden" name="id_catatan" value="<?php echo $notes["id_catatan"];?>">
                    <div class="tanggal">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" value="<?php echo $notes["tanggal"] ?>" required>
                    </div>
                    <div class="waktu">
                        <label for="waktu">Waktu</label>
                        <input type="time" name="waktu" id="waktu" value="<?php echo $notes["waktu"] ?>" required>
                    </div>
                    <div class="lokasi">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi" value="<?php echo $notes["lokasi"] ?>" required>
                    </div>
                    <div class="suhu">
                        <label for="suhu">Suhu</label>
                        <input type="text" name="suhu" id="suhu" value="<?php echo $notes["suhu"] ?>" required>
                    </div>
                    <div class="simpan">
                        <button type="submit" name="submit">Save</button>
                    </div>
                </form>
            </div>
    </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="medsos">
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-telegram"></i></a>
        </div>
</body>
</html>