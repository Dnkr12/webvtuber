<?php
require_once "functions.php";

$vtuber = query("SELECT * FROM vtuber");
if (isset($_POST["cari"])) {
    $vtuber = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing=0">
        <tr>
            <td>ID</td>
            <td>Ubah dan hapus data</td>
            <td>OriginalName</td>
            <td>Nama</td>
            <td>NickName</td>
            <td>Debut Date</td>
            <td>Deskripsi</td>
            <td>Gambar</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($vtuber as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>

                </td>
                <td><?= $row['originalname']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nickname']; ?></td>
                <td><?= $row['debut_date']; ?></td>
                <td><?= $row['deskripsi']; ?></td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="55"></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

    </table>

</body>

</html>