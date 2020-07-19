<?php
defined('BASEPATH') or exit('No direct script access allowed');
$ci = new CI_Controller();
$ci = &get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs
        ================================================== -->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" href="<?= base_url() ?>image/assets/logo_head.png">
	<title>404 Page Not Found</title>
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
</head>

<body>


	<!--=================================
=            404 Section            =
==================================-->
	<section class="moduler wrapper_404">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">404</h1>
						<h2 class="wow fadeInUp animated" data-wow-delay=".6s"><?= $heading ?></h2>
						<p class="wow fadeInUp animated" data-wow-delay=".6s"><?= $message ?></p>
						<a href="<?= base_url() ?>" class="btn btn-dafault btn-home wow fadeInUp animated" data-wow-delay="1.1s">Go Home</a>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Template Javascript Files
	================================================== -->
	<!-- jquery -->
	<script src="<?= base_url() ?>assets/dist_main/jQurey/jquery.min.js"></script>
	<!-- Form Validation -->
	<script src="<?= base_url() ?>assets/dist_main/form-validation/jquery.form.js"></script>
	<script src="<?= base_url() ?>assets/dist_main/form-validation/jquery.validate.min.js"></script>
	<!-- owl carouserl js -->
	<script src="<?= base_url() ?>assets/dist_main/owl-carousel/owl.carousel.min.js"></script>
	<!-- bootstrap js -->
	<script src="<?= base_url() ?>assets/dist_main/bootstrap/bootstrap.min.js"></script>
	<!-- wow js -->
	<script src="<?= base_url() ?>assets/dist_main/wow-js/wow.min.js"></script>
	<!-- slider js -->
	<script src="<?= base_url() ?>assets/dist_main/slider/slider.js"></script>
	<!-- Fancybox -->
	<script src="<?= base_url() ?>assets/dist_main/facncybox/jquery.fancybox.js"></script>
	<!-- template main js -->
	<script src="<?= base_url() ?>assets/js_main/main.js"></script>
</body>

</html>