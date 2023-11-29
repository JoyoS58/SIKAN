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

$catatan = query("SELECT * FROM catatan WHERE id_user = $data_user[id_user]");

if (isset($_POST["urutkan"])) {
    $data = $data_user["id_user"];
    $sort = $_POST["sort"];
    $catatan = urut($sort,$data);
}
if(isset($_POST["cari"])) {
    $data = $data_user["id_user"];
    $search = $_POST["search"];
    $catatan = search($search, $data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan</title>
    <link rel="stylesheet" href="components/css/header.css">
    <link rel="stylesheet" href="components/css/catatan.css">
    <link rel="stylesheet" href="components/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="head">
        <div class="logo">
             <span></span>
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
                <font class="hero">APLIKASI CATATAN PERJALANAN</font>
            </div>

            <div class="sub">
                <font class="sub"></font>
            </div>

            <div class="bread-crumbs">
                <nav>
                    <a href="index.php">Dashboard |</a> 
                    <a href="catatan.php">Catatan Perjalanan |</a> 
                    <a href="isi.php">Isi Data</a>
                </nav>
            </div>
            </div>

            <div class="cover-2">
            <div class="section">
                <div class="section-1">
                    <font class="urut">Urutkan Berdasarkan</font>
                    <form action="" method="post">
                        <div class="sort">
                    <select name="sort" id="">
                        <option value="tanggal">tanggal</option>
                        <option value="lokasi">lokasi</option>
                        <option value="suhu">Suhu Tubuh</option>
                        <option value="Waktu">Jam</option>
                    </select>
                    <button class="urutkan" type="submit" name="urutkan">Urutkan</button>
                    </div>
                    <br>
                    <div class="search">
                        <input type="search" name="search">
                        <button type="submit" name="cari">Cari</button>
                    </div>
                    </form>
                </div>
            </div>
            

            <div class="table">
                <table>
                   
                <tr class="head">
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                        <th>Aksi</th>
                        
                    </tr>
                <?php foreach($catatan as $note) : ?>
                    <tr class="isi">
                        <td><?php echo $note["tanggal"]; ?></td>
                        <td><?php echo $note["waktu"]; ?></td>
                        <td><?php echo $note["lokasi"]; ?></td>
                        <td><?php echo $note["suhu"]; ?></td>
                        <td class="aksi">
                            <button class="update">
                                <a href="update.php?id=<?php echo $note["id_catatan"];?>">Update</a>
                            </button>
                            <button class="delete">
                                <a href="delete.php?id=<?php echo $note["id_catatan"];?>" class="hapus">Delete</a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
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

    </footer>
</body>
</html>