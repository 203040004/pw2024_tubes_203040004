<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('New car has been added successfully!');
                document.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to add new car!');
                document.location.href = 'admin.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>

    <!-- Import Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Form Section -->
    <section id="tambah" class="form-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card form-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Tambah Data</h5>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Mobil</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required value="<?= isset($tp['nama']) ? htmlspecialchars($tp['nama'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="merk" class="form-label">Merk Mobil</label>
                                    <input type="text" name="merk" id="merk" class="form-control" required value="<?= isset($tp['merk']) ? htmlspecialchars($tp['merk'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="jenisBBM" class="form-label">Jenis BBM</label>
                                    <input type="text" name="jenisBBM" id="jenisBBM" class="form-control" required value="<?= isset($tp['jenisBBM']) ? htmlspecialchars($tp['jenisBBM'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" required value="<?= isset($tp['deskripsi']) ? htmlspecialchars($tp['jenisBBM'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">image</label>
                                    <input type="file" name="image" id="image" class="form-control" required value="<?= isset($tp['image']) ? htmlspecialchars($tp['image'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                                </div>

                                <button type="submit" name="tambah" class="btn btn-primary w-100">Tambah Data!</button>
                                <button type="button" class="btn btn-secondary w-100 mt-2" onclick="location.href='admin.php'">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script>
</body>

</html>