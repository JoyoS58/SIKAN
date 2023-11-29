<?php 
$conn = mysqli_connect("localhost", "root", "", "ukk");

function query($query) {
    global $conn; 
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row ;
    }
    return $rows;
}

function create ($data) { 
    global $conn;

    $id = htmlspecialchars($data["id_user"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $suhu = htmlspecialchars($data["suhu"]);

    // query insert data 
    $insert = "INSERT INTO catatan VALUES 
    ('', $id, '$tanggal', '$waktu', '$lokasi', $suhu)";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function delete($id) {
    global $conn;
    $hapus = "DELETE FROM catatan WHERE id_catatan = $id";
    mysqli_query($conn, $hapus);
    return mysqli_affected_rows($conn); 
}


function delete_user($id) {
    global $conn;
    $hapus = "DELETE FROM user WHERE id_user = $id";
    mysqli_query($conn, $hapus);
    return mysqli_affected_rows($conn); 
}

function update ($data) { 
    global $conn;

    $id_catatan = htmlspecialchars($data["id_catatan"]);
    $id = htmlspecialchars($data["id_user"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $suhu = htmlspecialchars($data["suhu"]);

    // query insert data 
    $insert = "UPDATE catatan SET tanggal = '$tanggal',
                                  waktu = '$waktu',
                                  lokasi = '$lokasi',
                                  suhu = '$suhu' 
                              WHERE id_catatan = $id_catatan";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}


function registrasi($data) {
    global $conn;

    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    
    //    // upload foto  
    //    $foto = upload();
    //    if(!$foto){
    //        return false ;
    //    }

    // // cek konfirmasi password
    // if ($password !== $password2) {
    //     echo "<script>
    //             alert ('Konfirmasi password tidak sesuai');
    //         </script>";
    //         return false;
    // }

    // cek apakah username sudah ada atau belum
    $select = "SELECT username FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $select);

    if ( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('nik sudah terdaftar');
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    $insert = "INSERT INTO admin VALUES ('','$username', '$password' )";
    mysqli_query($conn, $insert);
    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES["foto"]["name"];
    $ukuranFile = $_FILES["foto"]["size"];
    $error = $_FILES["foto"]["error"];
    $tmpName = $_FILES["foto"]["tmp_name"];


    // cek apakah ada gambar yang diupload 
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar Terlebih Dahulu');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang anda upload bukan gambar');
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 2000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama foto baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'assets/' . $namaFile);

    return $namaFile;
}

function urut_catatan($sort){
    $query = "SELECT * FROM catatan ORDER BY $sort";
    return query($query);
}

function search_catatan($search){
    $query = "SELECT * FROM catatan WHERE lokasi LIKE '%$search%' OR tanggal LIKE '%$search%' OR  waktu LIKE '%$search%' OR suhu LIKE '%$search%' ";
    return query($query);
}

function urut_user($sort){
    $qu = "SELECT * FROM user ORDER BY $sort";
    return query($qu);
}

function search_user($search){
    $query = "SELECT * FROM user WHERE nik LIKE '%$search%' OR nama LIKE '%$search%' OR  email LIKE '%$search%' ";
    return query($query);
}
?>  