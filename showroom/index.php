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


if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];

    $sql = "SELECT * FROM showroom WHERE 
                    `nama` LIKE '%$keyword%' OR
                    `merk` LIKE '%$keyword%'";
} else {
    $sql = "SELECT * FROM showroom";
}

// Mengambil data dari tabel showroom
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARJUNA SHOWROOM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white">ARJUNA SHOWROOM</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="search" name="search">Search</button>
            </form>

            <a href="php/login.php" class="btn btn-success">Login</a>
        </div>
    </nav>

    <!--slideshow-->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="asset/logo-toyota1.jpg" class="d-block w-100" width="200" height="400" alt="...">
            </div>
            <div class="carousel-item">
                <img src="asset/Logo-Daihatsu.jpg" class="d-block w-100" width="200" height="400" alt="...">
            </div>
            <div class="carousel-item">
                <img src="asset/logo-honda.jpg" class="d-block w-100 " width="200" height="400" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- penjelasan -->
    <div class="container my-5">
        <h2>ARJUNA SHOWROOM</h2>
        <p>Arjuna Showroom merupakan tempat jual beli mobil bekas terpercaya, Arjuna showroom juga melayani pembelian cash atau kredit.</p>
            
    </div>

    <!-- Cards -->
    <div class="container my-5">
        <div class="row">
            <?php if (empty($showroom)) : ?>
                <tr>
                    <td colspan="9" class="text-center">
                        <h1>Produk Tidak Ditemukan</h1>
                    </td>
                </tr>
            <?php else : ?>
                <?php $i = 1; ?>
                <?php foreach ($showroom as $sr) : ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="asset/<?= $sr['image']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $sr["nama"]; ?></h5>
                                <p class="card-text"><?= $sr["nama"]; ?></p>
                                <a href="php/detail.php?id=<?= $sr["id"]; ?>" class="btn btn-primary">Detail Kendaraan</a>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    </div>
</body>

</html>