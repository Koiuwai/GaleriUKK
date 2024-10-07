<?php include 'koneksi.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar</h4>
                        <p class="card-title">Daftar account</p>
                        <?php
                        $submit=@$_POST['submit'];
                        if($submit=='Daftar'){
                            $username=@$_POST['username'];
                            $password=md5(@$_POST['password']);
                            $email=@$_POST['email'];
                            $nama_lengkap=@$_POST['nama_lengkap'];
                            $alamat=@$_POST['alamat'];
                            $cek=mysqli_num_rows(mysqli_query($conn, "select * from user where username='$username' or email='$email'"));
                            if($cek==0){
                                mysqli_query($conn, "insert into user values('','$username','$password','$email','$nama_lengkap','$alamat')");
                                $alert='Pendaftaran telah berhail';
                                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                            }
                            else{
                                echo 'Maaf account sudah terdaftar';
                                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                            }
                        }
                        ?>
                    <form action="daftar.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <br>
                    <input type="submit" value="Daftar" class="btn btn-primary" name="submit">
                    <p>Sudah punya account? <a href="login.php" class="link-danger">Login</a></p>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>