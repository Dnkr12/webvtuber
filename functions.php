<?php
$conn = mysqli_connect("localhost", "root", "", "webvtuber");

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword)
{
    $query = "SELECT * FROM vtuber 
                WHERE 
                nama LIKE '%$keyword%' OR
                nickname LIKE '%$keyword%' 
                
                ";
    return query($query);
}
function tambah($data)
{
    global $conn;
    $originalName = htmlspecialchars($data["originalname"]);
    $nama = htmlspecialchars($data["nama"]);
    $nickName = htmlspecialchars($data["nickname"]);
    $debut_date = htmlspecialchars($data["debut_date"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO vtuber VALUES (null , '$originalName' , '$nama', '$nickName' , '$debut_date', '$deskripsi', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $originalName = htmlspecialchars($data["originalname"]);
    $nama = htmlspecialchars($data["nama"]);
    $nickName = htmlspecialchars($data["nickname"]);
    $debut_date = htmlspecialchars($data["debut_date"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE vtuber SET 
                originalname = '$originalName',
                nama = '$nama',
                nickname = '$nickName',
                debut_date = '$debut_date',
                deskripsi = '$deskripsi',
                gambar = '$gambar'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM vtuber WHERE id = $id");

    mysqli_affected_rows($conn);
}
