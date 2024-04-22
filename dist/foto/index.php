<?php
    // validasi tambah foto
    if(isset($_GET["add"])){
        if($_GET["add"] === "berhasil"){
            echo "<div class='alert alert-success'><b>Berhasil!</b> data foto berhasil di tambahkan!</div>";
        }else if($_GET["add"] === "gagal"){
            echo "<div class='alert alert-danger'><b>Error!</b> data foto gagal di tambahkan!</div>";
        }
    }
    // validasi edit foto
    if(isset($_GET["edit"])){
        if($_GET["edit"] === "berhasil"){
            echo "<div class='alert alert-success'><b>Berhasil!</b> data foto berhasil di update!</div>";
        }else if($_GET["edit"] === "gagal"){
            echo "<div class='alert alert-danger'><b>Error!</b> data foto gagal di update!</div>";
        }
    }
    // validasi hapus foto
    if(isset($_GET["hapus"])){
        if($_GET["hapus"] === "berhasil"){
            echo "<div class='alert alert-success'><b>Berhasil!</b> data foto berhasil di hapus!</div>";
        }else if($_GET["hapus"] === "gagal"){
            echo "<div class='alert alert-danger'><b>Error!</b> data foto gagal di hapus!</div>";
        }
    }
?>

<div class="container mb-5">
    <div class="col-6 mx-auto mt-3 mb-3">
        <a href="index.php?page=tambah_foto" style="text-decoration: none;">
            <input type="text" placeholder="tambah foto" class="form-control">
        </a>
    </div>
    <div class="row g-2">
            <?php
                $UserID = $_SESSION["UserID"];
                $sql = mysqli_query($conn, "select * from foto where UserID='$UserID'");
                while($data = mysqli_fetch_array($sql)):
            ?>
            <div class="col-3">
                <div class="card">
                    <img src="foto/gambar/<?= $data["UserID"];?>/<?= $data['AlbumID'];?>/<?= $data['LokasiFile'];?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title"><?= $data["JudulFoto"];?></h3>
                        <div class="card-text"><?= $data["DeskripsiFoto"];?></div>
                    </div>
                    <p class="mx-auto">
                        <a class="btn btn-md border" href="index.php?page=edit_foto&FotoID=<?= $data["FotoID"];?>" class="btn">Edit</a>
                        <a class="btn btn-md border" href="index.php?page=hapus_foto&FotoID=<?= $data["FotoID"];?>" class="btn">Hapus</a>
                    </p>
                    <div class="card-footer"><?= $data["TanggalUnggah"];?></div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

    </div>
</div>
