<?php
    include "../config/koneksi.php";

    if(isset($_POST["register"])){
        $Username = $_POST["Username"];
        $Password = md5($_POST["Password"]);
        $Email = $_POST["Email"];
        $NamaLengkap = $_POST["NamaLengkap"];
        $Alamat = $_POST["Alamat"];

        $sql = mysqli_query($conn, "insert into user values('', '$Username', '$Password', '$Email', '$NamaLengkap', '$Alamat')");

        if($sql){
            $sql2 = mysqli_query($conn, "select * from user where Username='$Username'");
            $data = mysqli_fetch_array($sql2);
            mkdir("foto/gambar/".$data["UserID"]);
            header("location: login.php");
        }else{
            header("location: register.php");
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
                <h2 class="text-center">Register</h2>
                <div class="mb-3">
                    <label for="" class="form-label">Username : </label>
                    <input type="text" name="Username" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password : </label>
                    <input type="password" name="Password" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email : </label>
                    <input type="email" name="Email" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nama Lengkap : </label>
                    <input type="text" name="NamaLengkap" class="form-control" id="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Alamat : </label>
                    <input type="text" name="Alamat" class="form-control" id="" required>
                </div>
                <input class="btn btn-md btn-primary" type="submit" value="Register" name="register">
            </form>
        </div>
        <div class="card-footer">
            Anda sudah memiliki akun? login <a href="login.php">Disini</a>
        </div>
    </div>
</body>
</html>