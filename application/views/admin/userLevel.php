<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

            <div class="card shadow mb-4 border-left-primary" style="overflow-x:auto;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><?php echo $tittle ?></span>
                    </h6>
                </div>

                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="<?= base_url() ?>admin/admin/addUser" class="btn btn-primary mb-4 btn-icon-split float-left mr-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text ">Tambah User Baru</span>
                    </a>

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($userLevel as $u) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <th>
                                        <?php
                                        $tmp = explode(" ", $u['name']);
                                        echo $u['name'] = implode("&nbsp;", $tmp);
                                        ?>
                                    </th>
                                    <th><?= $u['email'] ?></th>
                                    <th><?= $u['role'] ?></th>
                                    <th>
                                        <a href="<?= base_url('admin/admin/userLevelChange/') . $u['id'] ?>" class="btn btn-success btn-circle btn-sm">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="<?= base_url('admin/admin/userLevelDelete/') . $u['id'] ?>" class="btn btn-danger btn-circle btn-sm">
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