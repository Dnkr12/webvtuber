<?php
require_once 'functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        // cek apakah data berhasil diubah atau tidak
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                        alert('data berhasil ditambahkan');
                        document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Data</title>
</head>

<body>
    <form action="" method="POST">

        <div class="input-group">
            <label>
                Original Name:
                <input name="originalname" class=" form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="nama ">
                <label>
        </div>

        <div class="input-group">
            <label>
                Name:
                <input class=" form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="nama">
                <label>
        </div>

        <div class="input-group  input-group-sm">
            <label>
                Nickname:
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="nickname">
                <label>
        </div>
        <div class="input-group  input-group-sm">
            <label>
                Debut Date:
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="debut_date">
                <label>
        </div>
        <div class="input-group">
            <label>
                Deskripsi:
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="deskripsi">
                <label>
        </div>
        <div class="input-group">
            <label>
                Gambar:
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="gambar">
                <label>
        </div>
        <button type="submit" class="btn btn-outline-dark" name="submit">Tambah Data</button>

    </form>
</body>

</html>