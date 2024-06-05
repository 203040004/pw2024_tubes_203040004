<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "pw2024_tubes_203040004";

// Membuat koneksi
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

$id = intval($_GET['id']); // Sanitize the ID to prevent SQL injection

// Mengambil data dari tabel showroom
$sql = "SELECT * FROM showroom WHERE id = $id";
$result = $mysqli->query($sql);
$showroom = $result->fetch_assoc(); // Fetch a single row

// Menutup koneksi
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom</title>
    <!-- Import Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <!-- Card content -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="keterangan">
                        <table class="table">
                            <?php if (!empty($showroom)) : ?>
                                <tr>
                                    <td><b>Nama Mobil</b></td>
                                    <td><b>:</b></td>
                                    <td><?= htmlspecialchars($showroom['nama Mobil'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                                <tr>
                                    <td><b>Merk Mobil</b></td>
                                    <td><b>:</b></td>
                                    <td><?= htmlspecialchars($showroom['merk Mesin'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                                <tr>
                                    <td><b>Jenis BBM</b></td>
                                    <td><b>:</b></td>
                                    <td><?= htmlspecialchars($showroom['jenis BBM'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                                <tr>
                                    <td><b>Gambar</b></td>
                                    <td><b>:</b></td>
                                    <td><img height="50px" src="../asset/<?= $showroom['image'] ?>"></td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <td colspan="3">Data tidak ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="penjelasan">
                        <h4 class="text-center">Detail</h4>
                        <p class="text-center">
                            <?= !empty($showroom) && isset($showroom['deskripsi']) ? htmlspecialchars($showroom['deskripsi'], ENT_QUOTES, 'UTF-8') : 'Deskripsi tidak tersedia.' ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary kembali-btn">
                <a href="../index.php" class="text-white">Kembali</a>
            </button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script>
</body>

</html>