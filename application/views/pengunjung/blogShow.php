<!--
==================================================
Global Page Section Start
================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2><?= $content['tittle'] ?></h2>
                    <div class="portfolio-meta">
                        <span><?php
                                $date = date('Y-m-d', $content['date_created']);
                                echo longdate_indo($date);
                                ?></span>|
                        <span><?= $content['uploader'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#Page header-->


<section class="single-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post-img">
                    <img class="img-responsive" alt="" src="<?= base_url() ?>Image/blog/<?= $content['picture'] ?>">
                </div>
                <div class="post-content">
                    <?= $content['content'] ?>
                </div>
            </div>
</section>