<?php
    $FotoID = $_GET["FotoID"];

    $sqll = mysqli_query($conn, "select * from foto where FotoID='$FotoID'");

    $sql = mysqli_query($conn, "delete from foto where FotoID='$FotoID'");

    $data = mysqli_fetch_array($sqll);

    if($sql){
        unlink("foto/gambar/".$data["UserID"]."/".$data["AlbumID"]."/".$data["LokasiFile"]);
        header("location: index.php?page=foto&hapus=berhasil");
    }else{
        header("location: index.php?page=foto&hapus=gagal");
    }
?>