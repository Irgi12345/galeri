<?php
    if(isset($_POST["tambah"])){
        $NamaAlbum = $_POST["NamaAlbum"];
        $Deskripsi = $_POST["Deskripsi"];
        $TanggalDibuat = date("Y-m-d");
        $UserID = $_SESSION["UserID"];

        $sql = mysqli_query($conn, "insert into album values('','$NamaAlbum','$Deskripsi','$TanggalDibuat','$UserID')");

        if($sql){
            $sql2 = mysqli_query($conn, "select * from album where NamaAlbum='$NamaAlbum'");
            $data = mysqli_fetch_array($sql2);
            mkdir("foto/gambar/".$UserID."/".$data["AlbumID"]);
            header("location: index.php?page=album&add=berhasil");
        }else{
            header("location: index.php?page=album&add=gagal");
        }

    }
?>

<div class="card col-4 mt-3 mx-auto">
        <div class="card-body">
            <form action="" method="post">
                <h2 class="text-center">Tambah Album</h2>
                <div class="mb-3">
                    <label for="" class="form-label">Nama Album : </label>
                    <input type="text" name="NamaAlbum" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi : </label>
                    <input type="text" name="Deskripsi" class="form-control" id="" required>
                </div>
                <input class="btn btn-md btn-primary" type="submit" value="Tambah" name="tambah">
            </form>
        </div>
    </div>