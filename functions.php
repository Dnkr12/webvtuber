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
