<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/admin/role">Role</a></span>
                        <span class="breadcrumb-item active" aria-current="page">Edit Role Access</span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <h5>Role : <?= $role['role']; ?></h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Access</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $mn) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <th><?= $mn['menu'] ?></th>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $mn['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $mn['id']; ?>">
                                    </div>
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