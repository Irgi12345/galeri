<?php
    include "../config/koneksi.php";

    if(!$_SESSION["UserID"]){
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evolt</title>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <script src="../src/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar navbar-expand sticky-top border-bottom bg-light">
        <div class="collapse navbar-collapse">
            <b class="mx-1">Selamat datang <?= $_SESSION["Username"];?></b class="">
            <ul class="mx-auto navbar-nav">
                <li class="nav-item mx-3">
                    <a href="index.php?page=home" class="nav-link">home</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="index.php?page=album" class="nav-link">album</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="index.php?page=foto" class="nav-link">foto</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="index.php?page=profil" class="nav-link">profil</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="logout.php" class="nav-link">logout</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <?php
            if(isset($_GET["page"])){
                $page = $_GET["page"];

                switch($page){
                    case "home":
                        include "home/index.php";
                        break;
                    case "like":
                        include "home/like.php";
                        break;
                    case "komentar":
                        include "home/komentar.php";
                        break;
                    case "edit_komentar":
                        include "home/edit.php";
                        break;
                    case "hapus_komentar":
                        include "home/hapus.php";
                        break;
                    case "album":
                        include "album/index.php";
                        break;
                    case "tambah_album":
                        include "album/tambah.php";
                        break;
                    case "edit_album":
                        include "album/edit.php";
                        break;
                    case "hapus_album":
                        include "album/hapus.php";
                        break;
                    case "foto":
                        include "foto/index.php";
                        break;
                    case "tambah_foto":
                        include "foto/tambah.php";
                        break;
                    case "edit_foto":
                        include "foto/edit.php";
                        break;
                    case "hapus_foto":
                        include "foto/hapus.php";
                        break;
                    case "profil":
                        include "profil.php";
                        break;
                    default;
                        echo "Halaman Tidak Ada";
                        break;
                }
            }
        
        ?>
    </div>
    <footer class="py-2 fixed-bottom border-top bg-light">
        <div class="text-muted">
            Copyright &copy; Evolt <?php echo date("Y-m-d");?>
        </div>
    </footer>
</body>
</html>