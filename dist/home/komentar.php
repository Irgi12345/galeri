<?php
    if(isset($_POST["tambah"])){
        $FotoID0 = $_POST["FotoID"];
        $UserID = $_SESSION["UserID"];
        $IsiKomentar = $_POST["IsiKomentar"];
        $TanggalKomentar = date("Y-m-d");

        $sql0 = mysqli_query($conn, "insert into komentarfoto values('','$FotoID0','$UserID','$IsiKomentar','$TanggalKomentar')")or die(mysqli_error($conn));

        if($sql0){
            header("location: index.php?page=komentar&FotoID=".$FotoID0);
        }else{
            mysqli_error($conn);
        }
    }
?>

<div class="container mt-3 mb-5">
    <div class="row g-2">
            <?php
                $FotoID = $_GET["FotoID"];
                $sql = mysqli_query($conn, "select * from foto where FotoID='$FotoID'");
                while($data = mysqli_fetch_array($sql)):
                    $FotoID = $data["FotoID"];
                    $AlbumID = $data["AlbumID"];
            ?>
            <div class="col-3">
                <div class="card">
                    <img src="foto/gambar/<?= $data["UserID"];?>/<?= $data['AlbumID'];?>/<?= $data['LokasiFile'];?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title"><?= $data["JudulFoto"];?></h3>
                        <div class="card-text"><?= $data["DeskripsiFoto"];?></div>
                    </div>
                    <div class="card-footer"><?= $data["TanggalUnggah"];?></div>
                </div>
            </div>
            <?php endwhile; ?>
            <div class="col-9">
                <?php
                    $sql1 = mysqli_query($conn, "select * from komentarfoto inner join user on komentarfoto.UserID = user.UserID where FotoID='$FotoID'");
                ?>
                <h2 class="text-center">
                    <?php $row = mysqli_num_rows($sql1); 
                    if($row>0){ echo $row." Komentar";   }else{ echo "Belum ada komentar";}  ?>
                </h2>
                <div style="max-height: 490px; overflow: auto;">
                    <?php while($data2 = mysqli_fetch_array($sql1)):
                        ?>
                        <div class="row bg-light border m-2 py-2" style="border-radius: 7px;">
                            <h5 class="col-11"><?= $data2["Username"];?></h5>
                            <div class="col-1" style=" font-size: 8px;"><?= $data2["TanggalKomentar"];?></div>
                            <div class="col-9"><?= $data2["IsiKomentar"];?></div>
                            <?php 
                            if($data2["UserID"] == $_SESSION["UserID"]):
                            ?>
                                <div class="col-1"><a href="index.php?page=edit_komentar&KomentarID=<?= $data2['KomentarID'];?>" class="btn btn-primary">edit</a></div>
                                <div class="col-1"><a href="index.php?page=hapus_komentar&KomentarID=<?= $data2['KomentarID'];?>" class="btn btn-danger">hapus</a></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile;?>
                </div>
                <div class="mt-3 container">
                    <form action="" method="post">
                        <div class="row">
                            <input type="hidden" name="FotoID" value="<?= $FotoID;?>">
                            <div class="col-9"><input class="form-control" type="text" placeholder="Tambahkan Komentar" name="IsiKomentar" id=""></div>
                            <div class="col-2"><input class="btn btn-primary" type="submit" value="Tambah" name="tambah"></div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <h1 class="text-center mb-3">Foto Lainnya</h1>
    <div class="row g-2">
            <?php
                $sql = mysqli_query($conn, "select * from foto where AlbumID='$AlbumID'");
                while($data = mysqli_fetch_array($sql)):
            ?>
            <div class="col-3">
                <div class="card">
                    <img src="foto/gambar/<?= $data["UserID"];?>/<?= $data['AlbumID'];?>/<?= $data['LokasiFile'];?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title"><?= $data["JudulFoto"];?></h3>
                        <div class="card-text"><?= $data["DeskripsiFoto"];?></div>
                    </div>
                    <div class="card-footer"><?= $data["TanggalUnggah"];?></div>
                </div>
            </div>
            <?php endwhile; ?>
    </div>
</div>