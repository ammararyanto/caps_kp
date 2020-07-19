<!-- 
        ================================================== 
            Global Page Section Start
        ================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Candra Apple Blog</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= base_url() ?>home">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<!--=======================================
=            Blog Left sidebar            =
========================================-->

<section id="blog-full-width">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                </div>
                <?php foreach ($content as $cntn) : ?>
                    <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                        <div class="blog-post-image">
                            <a href="post-fullwidth.html"><img class="img-responsive" src="<?= base_url() ?>Image/blog/<?= $cntn['picture'] ?>" alt="" /></a>
                        </div>
                        <div class="blog-content">
                            <h2 class="blogpost-title">
                                <a href="post-fullwidth.html"><?= $cntn['tittle'] ?></a>
                            </h2>
                            <div class="blog-meta">
                                <span><?php
                                            $date = date('Y-m-d', $cntn['date_created']);
                                            echo longdate_indo($date);
                                            ?></span>
                                <span>by <a href=""><?= $cntn['uploader'] ?></a></span>
                                <span><?= $cntn['tag'] ?></a></span>
                            </div>
                            <p><?php
                                    $content_limit = $cntn['content'];
                                    echo $content = word_limiter($content_limit, 30);
                                    ?></p>
                            <a href="single-post.html" class="btn btn-dafault btn-details">Continue Reading</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!--====  End of Blog Left sidebar  ====-->