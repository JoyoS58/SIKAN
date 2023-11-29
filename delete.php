<?php 
require 'function.php';
$id = $_GET["id"];

if (delete($id) > 0 ){
    echo "<script>
            alert ('Data Berhasil Hapus');
            document.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert ('Data Gagal Hapus');
            document.location.href = 'index.php';
          </script>";
}
?>