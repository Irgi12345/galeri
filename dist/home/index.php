<div class="container mt-3 mb-5">
    <div class="row g-2">
            <?php
                $sql = mysqli_query($conn, "select * from foto where FotoID");
                while($data = mysqli_fetch_array($sql)):
            ?>
            <div class="col-3">
                <div class="card">
                    <img src="foto/gambar/<?= $data["UserID"];?>/<?= $data['AlbumID'];?>/<?= $data['LokasiFile'];?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title"><?= $data["JudulFoto"];?></h3>
                        <div class="card-text"><?= $data["DeskripsiFoto"];?></div>
                    </div>
                    <?php
                        $FotoID = $data["FotoID"];
                        $sql2 = mysqli_query($conn, "select * from likefoto where FotoID='$FotoID'");
                        $row = mysqli_num_rows($sql2);
                        
                    ?>
                    <p class="mx-auto">
                        <a class="btn btn-md border" href="index.php?page=like&FotoID=<?= $data["FotoID"];?>" class="btn">Like <?php if($row>0){ echo $row;}?></a>
                        <a class="btn btn-md border" href="index.php?page=komentar&FotoID=<?= $data["FotoID"];?>" class="btn">Komentar</a>
                    </p>
                    <div class="card-footer"><?= $data["TanggalUnggah"];?></div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>