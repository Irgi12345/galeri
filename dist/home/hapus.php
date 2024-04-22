<?php
    $KomentarID = $_GET["KomentarID"];

    $sql1 = mysqli_query($conn, "select * from komentarfoto where KomentarID='$KomentarID'");

    $sql = mysqli_query($conn, "delete from komentarfoto where KomentarID='$KomentarID'");

    $data = mysqli_fetch_array($sql1);

    if($sql){
        header("location: index.php?page=komentar&FotoID=".$data["FotoID"]);
    }else{
        mysqli_error($conn);
    }
?>