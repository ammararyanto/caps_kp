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
                        <li><a href="<?= base_url() ?>software">Software </a></li>
                        <li class="active"><?= $product['product'] ?> </li>
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

<!--=======================================
=            Blog Left sidebar            =
========================================-->

<section id="blog-full-width">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="search widget">
                        <form action="" method="get" class="searchform" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </div>

                    <div class="recent-post widget">
                        <h3>Recent Posts</h3>
                        <ul>
                            <?php foreach ($blog as $bg) : ?>
                                <li>
                                    <a href=""><?= $bg['tittle'] ?></a><br>
                                    <time><?php
                                                $date = date('Y-m-d', $bg['date_created']);
                                                echo longdate_indo($date);
                                                ?></time>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <?php foreach ($content as $cntn) : ?>
                    <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                        <div class="blog-post-image">
                            <a href="<?= base_url() ?>software/service_read/<?= $bg['id'] ?>"><img class="img-responsive" src="<?= base_url() ?>Image/blog/<?= $cntn['picture'] ?>" alt="<?= $cntn['tittle'] ?>" /></a>
                        </div>
                        <div class="blog-content">
                            <h2 class="blogpost-title">
                                <a href="<?= base_url() ?>software/service_read/<?= $bg['id'] ?>"><?= $cntn['tittle'] ?></a>
                            </h2>
                            <div class="blog-meta">
                                <span>
                                    <?php
                                        $date = date('Y-m-d', $bg['date_created']);
                                        echo longdate_indo($date);
                                        ?>
                                </span>
                                <span>by <a href="#"><?= $cntn['uploader'] ?></a></span>
                                <span><a href="#"><?= $cntn['category'] ?></a></span>
                            </div>
                            <p>
                                <?php
                                    $content_limit = $cntn['content'];
                                    echo $content = word_limiter($content_limit, 30);
                                    ?>
                            </p>
                            <a href="<?= base_url() ?>software/service_read/<?= $bg['id'] ?>" class="btn btn-dafault btn-details">Continue Reading</a>
                        </div>
                    </article>
                <?php endforeach; ?>
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</section>

<!--====  End of Blog Left sidebar  ====-->