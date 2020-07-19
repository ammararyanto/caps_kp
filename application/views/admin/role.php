<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-6">

            <div class="card shadow mb-4 border-left-primary" style="overflow-x:auto;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><?php echo $tittle ?></span>
                    </h6>
                </div>

                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-primary mb-4 btn-icon-split float-left mr-3" data-toggle="modal" data-target="#RoleMenu">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text ">Tambahkan Role Baru</span>
                    </a>

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($role as $r) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <th><?= $r['role'] ?></th>
                                    <th>
                                        <a href="<?= base_url('admin/admin/roleaccess/') . $r['id'] ?>" class="btn btn-warning btn-circle btn-sm">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-user-lock"></i>
                                            </span>
                                        </a>
                                        <a href="<?= base_url('admin/admin/roleChange/') . $r['id'] ?>" class="btn btn-success btn-circle btn-sm">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="<?= base_url('admin/admin/roleDelete/') . $r['id'] ?>" class="btn btn-danger btn-circle btn-sm">
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
<div class="modal fade" id="RoleMenu" tabindex="-1" role="dialog" aria-labelledby="RoleMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="RoleMenuLabel">Tambah Role Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/admin/role') ?>" method="post">
                <div class="modal-body">
                    <div class="form-grup">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>