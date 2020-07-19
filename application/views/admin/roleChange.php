<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">

                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/admin/role">Role</a></span>
                        <span class="breadcrumb-item active" aria-current="page">Edit Role</span>

                    </h6>
                </div>
                <div class="card-body">
                    <form class="user" action="" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id">ID</label>&nbsp;(<strong><?= $role['id'] ?></strong>)
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="role">Role</label>
                                <br><strong></strong>
                                <input type="text" name="role" class="form-control form-control-file form-control-sm" id="role" value="<?= $role['role'] ?>">
                                <small class="form-text text-danger"><?= form_error('role') ?></small>
                            </div>
                        </div>
                        <button type="submit" name="tambah_nota" class="btn btn-primary btn-sm float-left mt-3">Ubah</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->