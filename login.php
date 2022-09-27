<?php
session_start();

// session_start();
// if (!isset($_COOKIE['name']) && !isset($_SESSION['login'])) {
//     header("location:login.php");
//     exit();
// }

// if (isset($_COOKIE['name'])) {
//     header("location:index.php");
//     exit();
// }
// cek cookie
// if (isset($_COOKIE['login'])) {
//     if ($_COOKIE['login'] == 'true') {
//         $_SESSION['login'] = true;
//     }
// }


if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
$conn = mysqli_connect('localhost', 'root', '', 'webvtuber');

$error = '';
$validate = '';

if (isset($_SESSION["name"])) header('location: index.php');
if (isset($_POST['submit'])) {
    $name =  stripslashes($_POST['name']);
    $name = mysqli_real_escape_string($conn, $name);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    if (!empty(trim($name)) && !empty(trim($password))) {
        // select data berdasarkan name dari database 
        $query = "SELECT * FROM users WHERE name = '$name'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows != 0) {
            $hash   = mysqli_fetch_assoc($result)['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['name'] = $name;


                $_SESSION['login'] = true;
                header('Location: index.php');
            }

            //jika gagal maka akan menampilkan pesan error
        } else {
            $error =  'Login User Gagal !!';
        }
    } else {
        $error =  'Data tidak boleh kosong !!';
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign In</p>

                                    <form class="mx-1 mx-md-4" action="" method="POST">
                                        <?php if ($error != '') : ?>
                                            <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                                        <?php endif; ?>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="name" type="text" id="form3Example1c" class="form-control" />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>



                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="password" type="password" id="form3Example4c" class="form-control" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <?php if ($validate != '') { ?>
                                                    <p class="text-danger"><?= $validate; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>



                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" name="remember" />
                                            <label class="form-check-label" for="form2Example3">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-5 mb-lg-4">
                                            <button name="submit" type="submit" class="btn btn-primary btn-lg">Login</button>


                                        </div>
                                        <h5 class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">Daftar disini</h5>
                                        <a href="register.php" class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">Register</a>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img width="120%" src="img/3.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>