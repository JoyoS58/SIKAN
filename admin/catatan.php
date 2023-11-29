<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
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

$catatan = query("SELECT * FROM catatan");

if (isset($_POST["urutkan"])) {
    $sort = $_POST["sort"];
    $catatan = urut_catatan($sort);
}

if (isset($_POST["cari"])) {
    $search = $_POST["search"];
    $catatan = search_catatan($search);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/catatan.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cnloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="head">
        <div class="logo">
            <span>APLIKASI CATATAN PERJALANAN</span>
        </div>
        <div class="navbar">
                <a href="index.php">HOME</a> 
                <a href="catatan.php">CATATAN PERJALANAN </a> 
                <a href="user.php">USER</a> 
            </div>
        <div class="login">
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <div class="container">
        <div class="cover">
            <div class="tit">
            <div class="hero">
                <font class="hero"></font>
            </div>

            <div class="sub">
                <font class="sub"></font>
            </div>

            </div>

            <div class="cover-2">
            <div class="section">
                <div class="section-1">
                    <font class="urut">Urutkan Berdasarkan</font>
                    <form action="" method="post">
                    <select name="sort" id="">
                        <div class="sort">
                        <option value="tanggal">Tanggal</option>
                        <option value="lokasi">Lokasi</option>
                        <option value="suhu">Suhu</option>
                        <option value="waktu">Waktu</option>
                    </select>
                    <button class="urutkan" type="submit" name="urutkan">Urutkan</button>    
                        </div>

                        <div class="search">
                            <input type="search" name="search" id="">
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
            <a href="http://instagram.com/ivandi_ydwn"><i class="fab fa-instagram"></i></a>
            <a href="http://facebook.com/Ivandi Ydwn"><i class="fa-brands fa-facebook"></i></a>
        </div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>