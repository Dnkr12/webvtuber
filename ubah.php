<?php
require_once "functions.php";
$id = $_GET["id"];
$vtuber = query("SELECT * FROM vtuber WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {

        echo "<script>
                        alert('data berhasil diubah');
                        document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
        alert('data gagal diubah');
        document.location.href = 'index.php';
        </script>";
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
    <title>Ubah Data</title>
</head>

<body>
    <h1>Ubah data</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $vtuber["id"]; ?>">

        <div class="input-group">
            <label>
                Original Name:
                <input name="originalname" class=" form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" required value="<?= $vtuber["originalname"]; ?>">
                <label>
        </div>

        <div class="input-group">
            <label>
                Name:
                <input class=" form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="nama" required value="<?= $vtuber["nama"]; ?>">
                <label>
        </div>

        <div class="input-group  input-group-sm">
            <label>
                Nickname:
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="nickname" required value="<?= $vtuber["nickname"]; ?>">
                <label>
        </div>
        <div class="input-group  input-group-sm">
            <label>
                Debut Date:
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="debut_date" required value="<?= $vtuber["debut_date"]; ?>">
                <label>
        </div>
        <div class="input-group">
            <label>
                Deskripsi:
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="deskripsi" required value="<?= $vtuber["deskripsi"]; ?>">
                <label>
        </div>
        <div class="input-group">
            <label>
                Gambar:
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" type="text" name="gambar" required value="<?= $vtuber["gambar"]; ?>">
                <label>
        </div>
        <button type="submit" class="btn btn-outline-dark" name="submit">Ubah Data</button>

    </form>
</body>

</html>