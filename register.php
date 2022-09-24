<?php
$conn = mysqli_connect('localhost', 'root', '', 'webvtuber');
session_start();

$error = '';
$validate = '';

// mengecek apakah form registrasi di submit atau tidak 
if (isset($_POST["submit"])) {
    function cek_nama($name, $conn)
    {
        $name = mysqli_real_escape_string($conn, $name);
        $query = "SELECT * FROM users WHERE name = '$name' ";
        if ($result = mysqli_query($conn, $query));
        return mysqli_num_rows($result);
    }
    // menghilangkan backshlases
    $name =  stripslashes($_POST['name']);
    // cara sederhana mengamankan dari sql injection
    $name =  stripslashes($_POST['name']);
    $name = mysqli_real_escape_string($conn, $name);
    $email = stripslashes($_POST['email']);
    $email =  mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $repass = stripslashes($_POST['repassword']);
    $repass =  mysqli_real_escape_string($conn, $repass);

    // cek apakah nilai yang di inputkan pada from ada yg kosong atau tidak 
    if (!empty(trim($name)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($email))) {
        //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
        if ($password == $repass) {
            //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
            if (cek_nama($name, $conn) == 0) {
                // hashing password sebelum di simpan ke database 
                $pass = password_hash($password, PASSWORD_DEFAULT);
                // Insert data ke database 
                $query = "INSERT INTO users (name , email , password) VALUES ('$name' , '$email' ,'$pass' )";
                $result = mysqli_query($conn, $query);

                // Jika insert data berhasil maka akan di di redirect ke halaman index.php serta menyimpan data name ke session

                if ($result) {
                    $_SESSION['name'] = $name;


                    header('Location: login/colorlib.com/etc/lf/Login_v3/index.html');
                    // jika gagal maka akan manampilkan pesan eror
                } else {
                    $error =  'Register User Gagal !!';
                }
            } else {
                $error =  'Name sudah terdaftar !!';
            }
        } else {
            $validate = 'Password tidak sama !!';
        }
    } else {
        $error =  'Data tidak boleh kosong !!';
    }
    // fungsi untuk mengecek username apakah sudah terdaftar atau belum 

}






?>

















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">


        </form>
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" action="" method="POST">
                                        <?php if ($error != '') : ?>
                                            <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                                        <?php endif; ?>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                                <input name="name" type="text" id="form3Example1c" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                                <input type="email" name="email" id="form3Example3c" class="form-control" />

                                            </div>

                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <input name="password" type="password" id="form3Example4c" class="form-control" />
                                                <br>
                                                <input class="form-check-input" type="checkbox" onclick="myFunction()"> Show password
                                                <?php if ($validate != '') { ?>
                                                    <p class="text-danger"><?= $validate; ?></p>
                                                <?php } ?>

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                                <input name="repassword" type="password" id="form3Example4cd" class="form-control" />

                                            </div>
                                            <?php if ($validate != '') { ?>
                                                <p class="text-danger"><?= $validate; ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button name="submit" type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img width="120%" src="img/1.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="scripts.js"></script>
</body>

</html>