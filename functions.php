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
