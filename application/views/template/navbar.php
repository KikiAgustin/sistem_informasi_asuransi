<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="<?= base_url('Home'); ?>">ASURANSIKU</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <!-- <li><a class="nav-link scrollto" href="#">Produk</a></li> -->
                <li><a class="nav-link scrollto" href="<?= base_url('Home/pendidikan'); ?>">Pendidikan</a></li>
                <li><a href="<?= base_url('Home/klaim'); ?>" class="nav-link scrollto ">Klaim</a></li>
                <li><a href="<?= base_url('Home/pendaftaran'); ?>" class="getstarted scrollto">Pendaftaran</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->