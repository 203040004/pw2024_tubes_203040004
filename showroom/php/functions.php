<?php 
// fungsi untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "pw2024_tubes_203040004") or die("Database salah!");

    return $conn;
}

?>