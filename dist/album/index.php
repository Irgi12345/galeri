<?php
    // validasi tambah album
    if(isset($_GET["add"])){
        if($_GET["add"] === "berhasil"){
            echo "<div class='alert alert-success'><b>Berhasil!</b> data album berhasil di tambahkan!</div>";
        }else if($_GET["add"] === "gagal"){
            echo "<div class='alert alert-danger'><b>Error!</b> data album gagal di tambahkan!</div>";
        }
    }
    // validasi edit album
    if(isset($_GET["edit"])){
        if($_GET["edit"] === "berhasil"){
            echo "<div class='alert alert-success'><b>Berhasil!</b> data album berhasil di update!</div>";
        }else if($_GET["edit"] === "gagal"){
            echo "<div class='alert alert-danger'><b>Error!</b> data album gagal di update!</div>";
        }
    }
    // validasi hapus album
    if(isset($_GET["hapus"])){
        if($_GET["hapus"] === "berhasil"){
            echo "<div class='alert alert-success'><b>Berhasil!</b> data album berhasil di hapus!</div>";
        }else if($_GET["hapus"] === "gagal"){
            echo "<div class='alert alert-danger'><b>Error!</b> data album gagal di hapus!</div>";
        }
    }
?>

<div class="container">
    <div class="col-6 mx-auto mt-3 mb-3">
        <a href="index.php?page=tambah_album" style="text-decoration: none;">
            <input type="text" placeholder="tambah album" class="form-control">
        </a>
    </div>
    <div class="row">
            <?php
                $UserID = $_SESSION["UserID"];
                $sql = mysqli_query($conn, "select * from album where UserID='$UserID'");
                while($data = mysqli_fetch_array($sql)):
            ?>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?= $data["NamaAlbum"];?></h3>
                        <div class="card-text"><?= $data["Deskripsi"];?></div>
                    </div>
                    <p class="mx-auto">
                        <a class="btn btn-md border" href="index.php?page=edit_album&AlbumID=<?= $data["AlbumID"];?>" class="btn">Edit</a>
                        <a class="btn btn-md border" href="index.php?page=hapus_album&AlbumID=<?= $data["AlbumID"];?>" class="btn">Hapus</a>
                    </p>
                    <div class="card-footer"><?= $data["TanggalDibuat"];?></div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
