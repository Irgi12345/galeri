<?php
    if(isset($_POST["tambah"])){
        $JudulFoto = $_POST["JudulFoto"];
        $DeskripsiFoto = $_POST["DeskripsiFoto"];
        $TanggalUnggah = date("Y-m-d");
        $UserID = $_SESSION["UserID"];
        $AlbumID = $_POST["AlbumID"];

        $ekstensi = array('png','jpg','jpeg');
        $LokasiFile = $_FILES["LokasiFile"]["name"];
        $tempat = $_FILES["LokasiFile"]["tmp_name"];
        $eks = pathinfo($LokasiFile, PATHINFO_EXTENSION);

        if(in_array($eks,$ekstensi) === true){
            move_uploaded_file($tempat, "foto/gambar/".$UserID."/".$AlbumID."/".$LokasiFile);

            mysqli_query($conn, "insert into foto values('','$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$LokasiFile','$AlbumID','$UserID')");
            header("location: index.php?page=foto&add=berhasil");
        }else{
            header("location: index.php?page=foto&add=gagal");
        }

    }
?>

<div class="card col-4 mt-3 mx-auto">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <h2 class="text-center">Tambah Foto</h2>
                <div class="mb-3">
                    <label for="" class="form-label">Judul Foto : </label>
                    <input type="text" name="JudulFoto" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi Foto : </label>
                    <input type="text" name="DeskripsiFoto" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Foto : </label>
                    <input type="file" name="LokasiFile" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">nama Album: </label>
                    <select name="AlbumID" id="" class="form-select">
                        <option value=""></option>
                        <?php
                        $UserID = $_SESSION["UserID"];
                        $sql2 = mysqli_query($conn, "select * from album where UserID='$UserID'");
                        while($data = mysqli_fetch_array($sql2)):
                        ?>
                        <option value="<?= $data['AlbumID'];?>"><?= $data['NamaAlbum'];?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <input class="btn btn-md btn-primary" type="submit" value="Tambah" name="tambah">
            </form>
        </div>
    </div>