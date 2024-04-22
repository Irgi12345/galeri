<?php
    if(isset($_POST["edit"])){
        $FotoID0 = $_POST["FotoID"];
        $JudulFoto = $_POST["JudulFoto"];
        $DeskripsiFoto = $_POST["DeskripsiFoto"];
        $TanggalUnggah = date("Y-m-d");
        $UserID = $_SESSION["UserID"];
        $AlbumID = $_POST["AlbumID"];

        $ekstensi = array('png','jpg','jpeg');
        $foto_lama = $_POST["foto_lama"];
        $foto_baru = $_FILES["foto_baru"]["name"];
        $tempat = $_FILES["foto_baru"]["tmp_name"];
        $eks = pathinfo($foto_baru, PATHINFO_EXTENSION);

        if(!empty($foto_baru)){
            if(in_array($eks,$ekstensi) === true){
                move_uploaded_file($tempat, "foto/gambar/".$UserID."/".$AlbumID."/".$foto_baru);
                
                if($foto_lama){
                    $sql0 = mysqli_query($conn, "select * from foto where FotoID='$FotoID0'");
                    $data0 = mysqli_fetch_array($sql0);
                    unlink("foto/gambar/".$UserID."/".$data0["AlbumID"]."/".$foto_lama);
                }

                mysqli_query($conn, "update foto set JudulFoto='$JudulFoto',DeskripsiFoto='$DeskripsiFoto',TanggalUnggah='$TanggalUnggah',LokasiFile='$foto_baru',AlbumID='$AlbumID' where FotoID='$FotoID0'") or die(mysqli_error($conn));
                header("location: index.php?page=foto&add=berhasil");
            }else{
                header("location: index.php?page=foto&add=gagal");
            }
        }else{
            mysqli_query($conn, "update foto set JudulFoto='$JudulFoto',DeskripsiFoto='$DeskripsiFoto',TanggalUnggah='$TanggalUnggah' where FotoID='$FotoID0'") or die(mysqli_error($conn));
            header("location: index.php?page=foto&add=berhasil");
        }

    }
?>

<div class="card col-4 mt-3 mx-auto">
        <div class="card-body">
            <?php
                $FotoID = $_GET["FotoID"];
                $sql = mysqli_query($conn, "select * from foto where FotoID='$FotoID'");
                while($data = mysqli_fetch_array($sql)):
                $AlbumID2 = $data["AlbumID"];
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h2 class="text-center">Edit Foto</h2>
                <input type="hidden" name="FotoID" value="<?= $data['FotoID'];?>">
                <div class="mb-3">
                    <label for="" class="form-label">Judul Foto : </label>
                    <input type="text" name="JudulFoto" class="form-control" value="<?= $data['JudulFoto'];?>" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi Foto : </label>
                    <input type="text" name="DeskripsiFoto" class="form-control" value="<?= $data['DeskripsiFoto'];?>" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Foto : </label>
                    <input type="hidden" name="foto_lama" value="<?= $data['LokasiFile'];?>">
                    <input type="file" name="foto_baru" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">nama Album: </label>
                    <select name="AlbumID" id="" class="form-select">
                        <option value=""></option>
                        <?php
                        $UserID = $_SESSION["UserID"];
                        $sql2 = mysqli_query($conn, "select * from album where UserID='$UserID'");
                        while($data2 = mysqli_fetch_array($sql2)):
                        ?>
                        <option <?php if($AlbumID2 == $data2["AlbumID"]){ echo "selected";}?> value="<?= $data2['AlbumID'];?>"><?= $data2['NamaAlbum'];?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <input class="btn btn-md btn-primary" type="submit" value="edit" name="edit">
            </form>
            <?php endwhile;?>
        </div>
    </div>