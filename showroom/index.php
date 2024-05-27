<?php
    // menghubungkan dengan file lainya
require 'php/functions.php';


// melakukan query
//$showroom = query("SELECT * FROM showroom")

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
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="login"><a href="php/login.php"></a>Login</button>
            </form>
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
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
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
            <div class="col-md-4">
                <div class="card">
                    <img src="service1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Service 1</h5>
                        <p class="card-text">Description of service 1.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="service2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Service 2</h5>
                        <p class="card-text">Description of service 2.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="service3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Service 3</h5>
                        <p class="card-text">Description of service 3.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>