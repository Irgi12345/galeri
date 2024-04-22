<?php
    if(isset($_POST["edit"])){
        $NamaAlbum = $_POST["NamaAlbum"];
        $Deskripsi = $_POST["Deskripsi"];
        $TanggalDibuat = date("Y-m-d");
        $AlbumID = $_POST["AlbumID"];

        $sql = mysqli_query($conn, "update album set NamaAlbum='$NamaAlbum',Deskripsi='$Deskripsi',TanggalDibuat='$TanggalDibuat' where AlbumID='$AlbumID'");

        if($sql){
            header("location: index.php?page=album&edit=berhasil");
        }else{
            header("location: index.php?page=album&edit=gagal");
        }

    }
?>

<div class="card col-4 mt-3 mx-auto">
        <div class="card-body">
            <?php
                $AlbumID = $_GET["AlbumID"];
                $sql2 = mysqli_query($conn, "select * from album where AlbumID='$AlbumID'");
                while($data = mysqli_fetch_array($sql2)):
            ?>
            <form action="" method="post">
                <h2 class="text-center">Edit Album</h2>
                <input type="hidden" name="AlbumID" class="form-control" value="<?= $data['AlbumID'];?>">
                <div class="mb-3">
                    <label for="" class="form-label">Nama Album : </label>
                    <input type="text" name="NamaAlbum" class="form-control" value="<?= $data['NamaAlbum'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi : </label>
                    <input type="text" name="Deskripsi" class="form-control" value="<?= $data['Deskripsi'];?>" required>
                </div>
                <input class="btn btn-md btn-primary" type="submit" value="Edit" name="edit">
            </form>
            <?php endwhile;?>
        </div>
    </div>