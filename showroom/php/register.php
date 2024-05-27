<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arjuna Showroom</title>
    <!-- Import Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url();
            background-size: cover;
        }
        .registration-container {
            margin-top: 100px;
        }
        .registration-card {
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Registration Section -->
    <section id="registrasi" class="registration-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="" method="POST">
                        <div class="card registration-card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Registrasi</h5>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>

                                <button type="submit" name="registrasi" class="btn btn-primary w-100">Registrasi</button>

                                <button type="button" class="btn btn-secondary w-100 mt-2" onclick="location.href='login.php'">
                                    Kembali
                                </button>
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
