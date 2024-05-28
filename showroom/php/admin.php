<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "pw2024_tubes_203040004.sql";

// Membuat koneksi
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Mengambil data dari tabel showroom
$sql = "SELECT * FROM showroom";
$result = $mysqli->query($sql);

$showroom = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $showroom[] = $row;
    }
}

// Menutup koneksi
$mysqli->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arjuna Showroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body style="background-image: url('../assets/slider/admin.jpg'); background-size: cover;">
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <button type="button" class="btn btn-info">
                <a href="tambah.php" style="color: white; text-decoration: none;">Tambah Data</a>
            </button>
            <form action="" method="get" class="d-flex">
                <input type="text" name="keyword" class="form-control me-2" placeholder="Search" autofocus>
                <button type="submit" name="cari" class="btn btn-primary">Cari!</button>
            </form>
            <button type="button" class="btn btn-danger">
                <a href="login.php" style="color: white; text-decoration: none;">Logout</a>
            </button>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Merk Mesin</th>
                    <th>Jenis BBM</th>
                    <th>Gambar</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php if (empty($showroom)) : ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            <h1>Produk Tidak Ditemukan</h1>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($showroom as $tp) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $tp["nama Mobil"]; ?></td>
                            <td><?= $tp["merk Mesin"]; ?></td>
                            <td><?= $tp["jenis BBM"]; ?></td>
                            <td><?= $tp["gambar"]; ?></td>
                           
                            <td>
                                <div class="d-flex flex-column">
                                    <a href="ubah.php?id=<?= $tp['id']; ?>" class="btn btn-warning mb-1">Ubah</a>
                                    <a href="hapus.php?id=<?= $tp['id']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script>
</body>

</html>
