<!-- 
        ================================================== 
            Global Page Section Start
        ================================================== -->

<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Software Service</h2>

                    <ol class="breadcrumb">
                        <li><a href="<?= base_url() ?>">Home </a></li>
                        <li class="active">Software</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 
        ================================================== 
            Global Page Section End
        ================================================== -->
<!--
==================================================
Portfolio Section Start
================================================== -->
<section id="works" class="works">
    <div class="container">
        <div class="section-heading">
            <h2 class="title wow fadeInDown" data-wow-delay=".3s">Chose Produc</h2>
        </div>
        <div class="row">
            <?php foreach ($product as $pd) : ?>
                <div class="col-sm-4 col-xs-12">
                    <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                        <a href="<?= base_url() ?>software/service/<?= $pd['product'] ?>">
                            <div class="img-wrapper">
                                <img src="<?= base_url() ?>image/product/<?= $pd['image'] ?>" class="img-responsive" alt="candra apple solution" title="candra apple solution">
                                <div class="overlay">
                                </div>
                            </div>
                        </a>
                        <figcaption>
                            <h4 align="center">
                                <a href="<?= base_url() ?>software/service/<?= $pd['product'] ?>">
                                    <?= $pd['product'] ?>
                                </a>
                            </h4>
                        </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section> <!-- #works -->
<!--
==================================================
Portfolio Section Start
================================================== -->