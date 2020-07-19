<!--
==================================================
Slider Section Start
================================================== -->
<section class="carousel-default">
    <div id="carousel-default" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-default" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-default" data-slide-to="1" class=""></li>
            <li data-target="#carousel-default" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- NOTE: Bootstrap v4 changes class name to carousel-item -->
            <div class="item active">
                <img src="images/slider_promo.jpg" alt=" First slide">
                <div class="carousel-caption">
                    <a href="blog/free-icloud.html" type="button" class="btn btn-primary btn-slider">See More</a>
                </div>
            </div>
            <div class="item">
                <img src="images/slider1.jpg" alt="First slide">
                <div class="carousel-caption">
                    <h3>Candra Apple Solution</h3>
                    <p>Profesional Service Apple Device</p>
                </div>
            </div>
            <div class="item">
                <img src="images/slider2.jpg" alt="Second slide">
                <div class="carousel-caption">
                    <h3>Teknisi</h3>
                    <p>Teknisi yang handal dan profesional</p>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-default" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-default" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!--
==================================================
About Section Start
================================================== -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                    <h2>
                        Tentang Kami
                    </h2>
                    <p>
                        Kami Candra Apple Solution menggeluti dibidang servis iDevice siap untuk melayani bagi anda yang membutuhkan jasa service terpercaya.
                    </p>
                    <p>
                        Lokasi toko kami berada di Purwokerto dekat dengan Universitas Jendral Soedirman. Dan kami sudah berpengalaman dibidang service iDevice selama 5 tahun.
                    </p>
                </div>

            </div>
            <div class="col-md-6 col-sm-6">
                <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                    <img src="<?= base_url() ?>image/assets/about.jpg" alt="candra apple solution" title="candra apple solution">
                </div>
            </div>
        </div>
    </div>
</section> <!-- /#about -->

<!--
==================================================
Tracking
================================================== -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                    <img src="<?= base_url() ?>image/assets/caps.jpg" alt="candra apple solution" title="candra apple solution">
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                    <h2>Tracking Nota Servis</h2>
                    <form action="home/cari_nota" method="post" class="searchform" style="width:50%;" role="search">
                        <div class="input-group">
                            <input name="cari_nota" type="text" class="form-control" placeholder="Tracking Nota Anda">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"> <i class="ion-search"></i> </button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> <!-- /#about -->


<!--
==================================================
Portfolio Section Start
================================================== -->
<section id="works" class="works">
    <div class="container">
        <div class="section-heading">
            <h2 class="title wow fadeInDown" data-wow-delay=".3s">Servis Kami</h2>
            <p class="wow fadeInDown" data-wow-delay=".5s">
                Apa yang kami sediakan untuk anda?
            </p>
        </div>
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                    <div class="img-wrapper">
                        <img src="<?= base_url() ?>image/assets/our_service/hardware.jpg" class="img-responsive" alt="candra apple solution" title="candra apple solution">
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="<?= base_url() ?>image/assets/our_service/hardware.jpg">Zoom</a>
                                <a target="_blank" href="hardware.html">Details</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                        <h4 align="center">
                            <a href="hardware.html">
                                Hardware
                            </a>
                        </h4>
                        <p>

                        </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="img-wrapper">
                        <img src="<?= base_url() ?>image/assets/our_service/software.jpg" class="img-responsive" alt="candra apple solution" title="candra apple solution">
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="<?= base_url() ?>image/assets/our_service/software.jpg">Zoom</a>
                                <a target="_blank" href="software.html">Details</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                        <h4 align="center">
                            <a href="software.html">
                                Software
                            </a>
                        </h4>
                        <p>

                        </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="img-wrapper">
                        <img src="<?= base_url() ?>image/assets/our_service/unlock_icloud.jpg" class="img-responsive" alt="candra apple solution" title="candra apple solution">
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="<?= base_url() ?>image/assets/our_service/unlock_icloud.jpg">Zoom</a>
                                <a target="_blank" href="unlock_icloud.html">Details</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                        <h4 align="center">
                            <a href="unlock_icloud.html">
                                Unlock iCloud
                            </a>
                        </h4>
                        <p>

                        </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
                    <div class="img-wrapper">
                        <img src="<?= base_url() ?>image/assets/our_service/unlock_jaringan.jpg" class="img-responsive" alt="candra apple solution" title="candra apple solution">
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="<?= base_url() ?>image/assets/our_service/unlock_jaringan.jpg">Zoom</a>
                                <a target="_blank" href="unlock_jaringan.html">Details</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                        <h4 align="center">
                            <a href="unlock_jaringan.html">
                                Unlock Jaringan
                            </a>
                        </h4>
                        <p>

                        </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms">
                    <div class="img-wrapper">
                        <img src="<?= base_url() ?>image/assets/our_service/aksesoris.jpg" class="img-responsive" alt="candra apple solution" title="candra apple solution">
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="<?= base_url() ?>image/assets/our_service/aksesoris.jpg">Zoom</a>
                                <a target="_blank" href="aksesoris.html">Details</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                        <h4 align="center">
                            <a href="aksesoris.html">
                                Aksesoris Apple
                            </a>
                        </h4>
                        <p>

                        </p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="1200ms">
                    <div class="img-wrapper">
                        <img src="<?= base_url() ?>image/assets/our_service/jualbeli.jpg" class="img-responsive" alt="candra apple solution" title="candra apple solution">
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="<?= base_url() ?>image/assets/our_service/jualbeli.jpg">Zoom</a>
                                <a target="_blank" href="jualbeli.html">Details</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                        <h4 align="center">
                            <a href="jualbeli.html">
                                Jual Beli.
                            </a>
                        </h4>
                        <p>

                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section> <!-- #works -->
<!--
==================================================
Portfolio Section Start
================================================== -->
<section id="feature">
    <div class="container">
        <div class="section-heading">
            <h2 class="title wow fadeInDown" data-wow-delay=".3s">Kami Menawarkan</h2>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="media-left">
                        <div class="icon">
                            <img src="<?= base_url() ?>image/assets/icons/free.png" alt="candra apple solution" title="candra apple solution">
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Cek Gratis</h4>
                        <p>Gratis pengecekan kerusakan ringan software dan hardware.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                    <div class="media-left">
                        <div class="icon">
                            <img src="<?= base_url() ?>image/assets/icons/cepat.png" alt="candra apple solution" title="candra apple solution">
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Proses Cepat</h4>
                        <p>Proses pengerjaan servis software dan hardware bisa ditunggu di tempat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
                    <div class="media-left">
                        <div class="icon">
                            <img src="<?= base_url() ?>image/assets/icons/garansi.png" alt="candra apple solution" title="candra apple solution">
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Bergaransi</h4>
                        <p>Servis hardware bergaransi satu bulan.<br><br></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1200ms">
                    <div class="media-left">
                        <div class="icon">
                            <img src="<?= base_url() ?>image/assets/icons/teknisi.png" alt="candra apple solution" title="candra apple solution">
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Teknisi Handal</h4>
                        <p>Kami memiliki teknisi handal yang sudah berpengalaman dalam service iDevice.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1500ms">
                    <div class="media-left">
                        <div class="icon">
                            <img src="<?= base_url() ?>image/assets/icons/pelayanan.png" alt="candra apple solution" title="candra apple solution">
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Pelayanan Bagus</h4>
                        <p>Kami memiliki customer service yang ramah dan bisa memberikan solusi terbaik untuk anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1800ms">
                    <div class="media-left">
                        <div class="icon">
                            <img src="<?= base_url() ?>image/assets/icons/bestdeal.png" alt="candra apple solution" title="candra apple solution">
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Harga Terbaik</h4>
                        <p>Harga yang kami tawarkan terbaik dikelasnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- /#feature -->