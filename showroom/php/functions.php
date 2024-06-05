<?php
// fungsi untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "pw2024_tubes_203040004") or die("Database salah!");

    return $conn;
}

// function untuk melakukan query dan memasukannya kedalam array
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function untuk menambah data produk
function tambah($data)
{

    $conn = koneksi();

    $namaMobil = htmlspecialchars($data['namaMobil']);
    $merkMobil = htmlspecialchars($data['merkMobil']);
    $jenisBBM = htmlspecialchars($data['jenisBBM']);
    $image = uploadImage();
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO showroom
                 VALUES
                (null, 
                '$namaMobil', 
                '$merkMobil', 
                '$jenisBBM',
                '$image')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function uploadImage()
{
    if (!isset($_FILES['image'])) {
        echo "<script>
                alert('Image is not set!');
              </script>";
        return false;
    }

    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileTmpName = $_FILES['image']['tmp_name'];

    // Check if there's no error
    if ($fileError !== 0) {
        echo "<script>
                alert('Error uploading the image!');
              </script>";
        return false;
    }

    // Check if the uploaded file is an image
    $validImageExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));

    if (!in_array($fileExtension, $validImageExtensions)) {
        echo "<script>
                alert('Invalid image file type!');
              </script>";
        return false;
    }


    // Check if the file size is too large
    if ($fileSize > 2000000) { // 2MB
        echo "<script>
                alert('Image file size is too large!');
              </script>";
        return false;
    }

    // Generate new file name and move uploaded file
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $fileExtension;

    move_uploaded_file($fileTmpName, '../asset/' . $newFileName);

    return $newFileName;
}

// function untuk menghapus data produk
function hapus($id)
{
    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM showroom WHERE id = $id") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

// function untuk mengubah data produk
function ubah($data)
{
    $conn = Koneksi();

    $id = $data['id'];
    $namaMobil = htmlspecialchars($data['nama mobil']);
    $merkMesin = htmlspecialchars($data['merk mesin']);
    $jenisBBM = htmlspecialchars($data['jenis BBM']);


    $query = "UPDATE showroom
                SET 
                nama mobil = '$namaMobil',
                merk mesin = '$merkMesin',
                jenis BBM = '$jenisBBM',
                WHERE id = $id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}
// functions untuk mencari produk
function cari($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM showroom
              WHERE 
              `nama mobil` LIKE '%$keyword%' OR
              `merk mesin` LIKE '%$keyword%' OR
              `jenis BBM` LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}



// function untuk registrasi
function registrasi($data)
{
    $conn = koneksi();
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah digunakan');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru 
    $query_tambah = "INSERT INTO user VALUES('', '$username', '$password')";

    mysqli_query($conn, $query_tambah);

    return mysqli_affected_rows($conn);
}
