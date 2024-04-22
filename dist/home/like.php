<?php
    $FotoID = $_GET["FotoID"];
    $UserID = $_SESSION['UserID'];
    $TanggalLike = date("y-m-d");

    $sql = mysqli_query($conn, "select * from likefoto where UserID='$UserID' and FotoID='$FotoID'");
    $row = mysqli_num_rows($sql);

    if($row === 1){
        mysqli_query($conn, "delete from likefoto where UserID='$UserID'");
        header("location: index.php?page=home");
    }else{
        mysqli_query($conn, "insert into likefoto values('','$FotoID','$UserID','$TanggalLike')");
        header("location: index.php?page=home");
    }
?>