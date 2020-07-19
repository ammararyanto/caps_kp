<!DOCTYPE html>
<html class="no-js">

<head>
    <!-- Basic Page Needs
        ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="<?= base_url() ?>image/assets/caps_logo_white.svg">
    <title><?= $tittle ?></title>
    <meta name="description" content="Jasa service produk Apple di purwokerto. Dari segala jenis iPhone,iPad,iMac,Macbook, siap untuk melayani bagi anda yang membutuhkan jasa service terpercaya.">
    <meta name="keywords" content="candra apple solution,service apple, service mac, service iphone, service ipad, apple repair, mac repair, iphone repair, ipad repair, macbook service, service macbook, service macbook pro, service imac, service ipod, servis apple, servis mac, servis iphone, servis ipad, macbook servis, servis macbook, servis macbook pro, servis imac, servis ipod, apple purwokerto, jasa service apple purwokerto, service apple purwokerto, service apple purwokerto, service apple banyumas, service apple cilacap, service apple purbalingga, servis apple purwokerto, servis apple banyumas, servis apple cilacap, servis apple purbalingga, apple store purwokerto, toko apple purwokerto, purwokerto, purbalingga, cilacap, banyumas, service apple terbaik, service apple tercepat, service hp terbaik, service hp di purwokerto, indonesia, service apple jaringan, unlock icloud, service apple terbaik di semarang, semarang, service apple jakarta, service apple jombang, service apple jawa tengah, service apple jogjakarta, service apple surabaya, service apple medan, service apple pekalongan, service apple pemalang, service apple cirebon, service apple tegal, service apple bali, service apple solo, service apple bandung, service apple jakarta barat, service apple malang, konter terbaik purwokerto, konter apple terbaik">
    <meta name="author" content="Blackshides">
    <link rel="canonical" href="https://candra-apple-solution.com/" />
    <!-- Mobile Specific Metas
        ================================================== -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Candra Apple Solution" />
    <meta property="og:description" content="Tempat jasa service produk apple di purwokerto Indonesia. Dari segala jenis iphone, ipad, iMac, macbook, siap untuk melayani bagi anda yang membutuhkan jasa service terpercaya." />
    <meta property="og:url" content="https://candra-apple-solution.com/" />
    <meta property="og:site_name" content="Candra Apple Solution" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="jasa service produk apple di purwokerto. Dari segala jenis iphone, ipad, iMac, macbook, siap untuk melayani bagi anda yang membutuhkan jasa service terpercaya." />
    <meta name="twitter:title" content="Candra Apple Solution | Service Apple Purwokerto, iPhone, iPad, iPod, Macbook, iMac" />

    <!-- Template CSS Files
        ================================================== -->
    <!-- Twitter Bootstrs CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist_main/bootstrap/bootstrap.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist_main/ionicons/ionicons.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist_main/animate-css/animate.css">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist_main/slider/slider.css">
    <!-- owl craousel css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist_main/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist_main/owl-carousel/owl.theme.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist_main/facncybox/jquery.fancybox.css">
    <!-- template main css file -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css_main/style.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114456834-1"></script>
    <!-- font awesome -->
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-114456834-1');
    </script>


</head>

<body>


    <!--
        ==================================================
        Header Section Start
        ================================================== -->
    <header id="top-bar" class="navbar-fixed-top animated-header">
        <div class="container">
            <div class="navbar-header">
                <!-- responsive nav button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- /responsive nav button -->

                <!-- logo -->
                <div class="navbar-brand">
                    <a href="<?= base_url() ?>home">
                        <img class="img-responsive" src="<?= base_url() ?>image/assets/logo.png" alt="candra apple solution" title="candra apple solution">
                    </a>
                </div>
                <!-- /logo -->
            </div>
            <!-- main menu -->
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?= base_url() ?>home">Home</a>
                        </li>
                        <li><a href="<?= base_url() ?>about">About</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Service
                                <span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a href="<?= base_url() ?>software">Software</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Unlock iCloud</a></li>
                                    <li><a href="#">Unlock Jaringan</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?= base_url() ?>blog">Blog</a></li>
                        <li><a href="<?= base_url() ?>contact">Contact</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Acount
                                <span class="caret"></span></a>
                            <div class="dropdown-menu">
                                <ul>
                                    <?php if ($user == true) : ?>
                                        <li><a href="<?= base_url() ?>auth/logout">Log-Out</a></li>
                                    <?php else : ?>
                                        <li><a href="<?= base_url() ?>auth/login">Log-in</a></li>
                                        <li><a href="<?= base_url() ?>auth/register">Register</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /main nav -->
        </div>
    </header>