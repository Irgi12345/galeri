<?php
    include "../config/koneksi.php";
    $pesan = "";
    if(isset($_POST["login"])){
        $Username = $_POST["Username"];
        $Password = md5($_POST["Password"]);

        $sql = mysqli_query($conn, "select * from user where Username='$Username' and Password='$Password'");
        $row = mysqli_num_rows($sql);

        if($row>0){
            $data = mysqli_fetch_array($sql);

            $_SESSION["UserID"] = $data["UserID"];
            $_SESSION["Username"] = $data["Username"];

            header("location: index.php?page=home");
        }else{
            $pesan = "<div class='alert alert-danger'><b>Error!</b> Username atau Password yang anda masukkan salah!</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evolt</title>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <script src="../src/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="card col-4 mt-3 mx-auto">
        <div class="card-body">
            <form action="" method="post">
                <h2 class="text-center">Login</h2>
                <?php
                    if($pesan){
                        echo $pesan."<br>";
                    }
                    // validasi edit akun
                    if(isset($_GET["edit"])){
                        if($_GET["edit"] === "berhasil"){
                            echo "<div class='alert alert-success'><b>Berhasil!</b> Akun kamu berhasil di update!</div>";
                        }else if($_GET["edit"] === "gagal"){
                            echo "<div class='alert alert-danger'><b>Error!</b> Akun kamu gagal di update!</div>";
                        }
                    }
                ?>
                <div class="mb-3">
                    <label for="" class="form-label">Username : </label>
                    <input type="text" name="Username" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password : </label>
                    <input type="password" name="Password" class="form-control" id="" required>
                </div>
                <input class="btn btn-md btn-primary" type="submit" value="Login" name="login">
            </form>
        </div>
        <div class="card-footer">
            Anda belum memiliki akun? daftar <a href="register.php">Disini</a>
        </div>
    </div>
</body>
</html>