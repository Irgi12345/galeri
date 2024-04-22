<?php
    if(isset($_POST["edit"])){
        $UserID = $_POST["UserID"];
        $Username = $_POST["Username"];
        $Password = md5($_POST["Password"]);
        $Email = $_POST["Email"];
        $NamaLengkap = $_POST["NamaLengkap"];
        $Alamat = $_POST["Alamat"];

        $sql = mysqli_query($conn, "update user set Username='$Username',Password='$Password',Email='$Email',NamaLengkap='$NamaLengkap',Alamat='$Alamat' where UserID='$UserID'");

        if($sql){
            header("location: login.php?edit=berhasil");
        }else{
            mysqli_error($conn);
        }

    }
?>

<div class="card col-4 mt-3 mx-auto mb-5">
        <div class="card-body">
            <?php
                $UserID1 = $_SESSION["UserID"];
                $sql2 = mysqli_query($conn, "select * from user where UserID='$UserID1'");
                while($data = mysqli_fetch_array($sql2)):
            ?>
            <form action="" method="post">
                <h2 class="text-center">Edit Akun</h2>
                <input type="hidden" name="UserID" value="<?= $data['UserID'];?>">
                <div class="mb-3">
                    <label for="" class="form-label">Username : </label>
                    <input type="text" name="Username" class="form-control" id="" value="<?= $data['Username'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password : </label>
                    <input type="password" name="Password" class="form-control" id="" placeholder="Anda tidak ingin ubah password? tulis ulang password" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email : </label>
                    <input type="email" name="Email" class="form-control" id="" value="<?= $data['Email'];?>"  required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nama Lengkap : </label>
                    <input type="text" name="NamaLengkap" class="form-control" id="" value="<?= $data['NamaLengkap'];?>"  required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Alamat : </label>
                    <input type="text" name="Alamat" class="form-control" id="" value="<?= $data['Alamat'];?>"  required>
                </div>
                <input class="btn btn-md btn-primary" type="submit" value="Edit" name="edit">
            </form>
            <?php endwhile;?>
        </div>
    </div>