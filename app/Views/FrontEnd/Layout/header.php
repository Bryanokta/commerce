<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fontawesome/css/brands.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fontawesome/css/solid.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/frontEnd.css">
</head>

<body class="bg-body-secondary">
    <nav class="navbar fixed-top navbar-expand-lg" style="background-color: #190482; height: 100px;">
        <div class="container">
            <!-- logo -->
            <a class="navbar-brand text-light mt-3 z-1 position-absolute ms-3 fs-4" href="#">Shapiie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- nav item -->
            <div class="collapse navbar-collapse pb-5 ms-2" id="navbarNavDropdown" style="font-size: 12px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- icon search -->
            <div id="searchContainer" class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="searchbar">
                        <input class="search_input" type="text" name="" placeholder="Search...">
                        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </div>
            <!-- icon cart -->
            <div class="d-flex justify-content-between align-items-center">
                <a href="/keranjang" class="btn position-relative" style="background-color: #ffffff;">
                    <i class="fa-solid fa-cart-shopping" style="color: #190482;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </div>
        </div>
    </nav>


    <div class="container-fluid" style="height: 20vh; background-color: #190482;">
    </div>