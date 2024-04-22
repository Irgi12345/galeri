<?php
    if(isset($_POST["edit"])){
        $FotoID = $_POST["FotoID"];
        $KomentarID = $_POST["KomentarID"];
        $IsiKomentar = $_POST["IsiKomentar"];
        $TanggalKomentar = date("Y-m-d");

        $sql = mysqli_query($conn, "update komentarfoto set IsiKomentar='$IsiKomentar',TanggalKomentar='$TanggalKomentar' where KomentarID='$KomentarID'")or die(mysqli_error($conn));

        if($sql){
            header("location: index.php?page=komentar&FotoID=".$FotoID);
        }else{
            mysqli_error($conn);
        }

    }
?>

<div class="card col-4 mt-3 mx-auto">
        <div class="card-body">
            <?php
                $KomentarID = $_GET["KomentarID"];
                $sql2 = mysqli_query($conn, "select * from komentarfoto where KomentarID='$KomentarID'");
                while($data = mysqli_fetch_array($sql2)):
            ?>
            <form action="" method="post">
                <h2 class="text-center">Edit Komentar</h2>
                <input type="hidden" name="FotoID" class="form-control" value="<?= $data['FotoID'];?>">
                <input type="hidden" name="KomentarID" class="form-control" value="<?= $data['KomentarID'];?>">
                <div class="mb-3">
                    <label for="" class="form-label">Isi Komentar : </label>
                    <input type="text" name="IsiKomentar" class="form-control" value="<?= $data['IsiKomentar'];?>" required>
                </div>
                <input class="btn btn-md btn-primary" type="submit" value="Edit" name="edit">
                <a class="btn btn-md btn-danger" href="index.php?page=komentar&FotoID=<?= $data['FotoID'];?>">cancel</a>
            </form>
            <?php endwhile;?>
        </div>
    </div>