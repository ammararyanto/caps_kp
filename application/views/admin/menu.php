<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><?php echo $tittle ?></span>
                    </h6>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>


                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-primary mb-4 btn-icon-split float-left mr-3" data-toggle="modal" data-target="#AddMenu">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Menu Baru</span>
                    </a>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Icons</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $mn) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <th><i class="<?= $mn['icons'] ?>"></i></th>
                                    <th><?= $mn['menu'] ?></th>
                                    <th>
                                        <a href="<?= base_url() ?>admin/menu/edit/<?= $mn['id'] ?>" class="btn btn-success btn-circle btn-sm">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="<?= base_url() ?>admin/menu/delete/<?= $mn['id'] ?>" class="btn btn-danger btn-circle btn-sm">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </a>
                                    </th>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>


        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="AddMenu" tabindex="-1" role="dialog" aria-labelledby="AddMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddMenuLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menu') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icons" name="icons" placeholder="Icons fontawesome">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>