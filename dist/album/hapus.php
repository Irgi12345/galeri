<?php
    $AlbumID = $_GET["AlbumID"];
    $UserID = $_SESSION["UserID"];

    $sql = mysqli_query($conn, "delete from album where AlbumID='$AlbumID'");

    if($sql){
        rmdir("foto/gambar/".$UserID."/".$AlbumID);
        header("location: index.php?page=album&hapus=berhasil");
    }else{
        header("location: index.php?page=album&hapus=gagal");
    }
?>