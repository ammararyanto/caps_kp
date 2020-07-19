<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
        <a href="<?= base_url() ?>admin/blog/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-fw fa-plus text-white-50"></i></i> New Article</a>
    </div>
    <?php foreach ($content as $cntn) : ?>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $cntn['tittle'] ?></h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Action:</div>
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Delete</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <img src="<?= base_url() ?>Image/blog/<?= $cntn['picture'] ?>" class="img-fluid mx-auto d-block" alt="Responsive image">
            <p class="mt-3">
                <?php
                    $content_limit = $cntn['content'];
                    echo $content = word_limiter($content_limit, 30);
                    ?>
            </p>
            <p class="blockquote-footer float-left"> <?= $cntn['uploader'] ?> / <?= $cntn['category_id'] ?> /
                <?php
                    $date = date('Y-m-d', $cntn['date_created']);
                    echo longdate_indo($date);
                    ?>
            </p>
            <a href="<?= base_url(); ?>blog/<?= $cntn['id'] ?>" class="btn btn-primary float-right">Live View</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->