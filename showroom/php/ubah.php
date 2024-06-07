<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = intval($_GET['id']); // Sanitize ID to prevent SQL injection

// Fetch car data based on ID
$car = query("SELECT * FROM showroom WHERE id = $id")[0];

if (isset($_POST["ubah"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Car data has been updated successfully!');
                document.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to update car data!');
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
    <title>Ubah Data</title>
    <!-- Import Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Form Section -->
    <section id="ubah" class="form-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $car['id']; ?>">
                        <input type="hidden" name="oldImage" value="<?= $car['image']; ?>">
                        <div class="card form-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Ubah Data</h5>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Mobil</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required value="<?= $car['nama']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="merk" class="form-label">Merk Mesin</label>
                                    <input type="text" name="merk" id="merk" class="form-control" required value="<?= $car['merk']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="jenisBBM" class="form-label">Jenis BBM</label>
                                    <input type="text" name="jenisBBM" id="jenisBBM" class="form-control" required value="<?= $car['jenisBBM']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <img src="../asset/<?= $car['image']; ?>" width="100" alt="Existing Image">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" name="ubah" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
