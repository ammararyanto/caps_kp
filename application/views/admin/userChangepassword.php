<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>

    <div class="card shadow mb-4 col-lg-6 pt-4 border-left-warning">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('admin/user/changepassword') ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Password Saat ini</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?php echo form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">Password terbaru</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?php echo form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Password terbaru (Tulis Ulang)</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?php echo form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="row mt-5 mb-4">
                    <div class="col-md-12">

                        <button type="submit" class="btn btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text text-gray-100">Submit</span>
                        </button>

                        <a href="<?= base_url('admin/user/'); ?>" class="btn btn-danger btn-icon-split float-right mr-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text ">Batal</span>
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->