<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","gallery");

    if(!$conn){
        echo "gagal";
    }
?>