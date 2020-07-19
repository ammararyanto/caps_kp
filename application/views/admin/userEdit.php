<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>


    <div class="card shadow mb-4 col-lg-7 py-4 px-4 border-left-primary">
        <div class="row">
            <div class="col-md-4">
                <img class="img-thumbnail rounded-circle" src="<?= base_url() ?>image/profile/<?= $user['image'] ?>">
            </div>
            <div class="col-md-8">
                <?= form_open_multipart('admin/user/edit'); ?>

                <div class="form-group">
                    <label for="current_password">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>

                </div>

                <div class="form-group">
                    <label for="current_password">Nama Lengkap </label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                    <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="current_password">Foto Profil</label>
                    <div class="row">
                        <div class="col">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                <small class="text-danger">
                                    Gambar disarankan berukuran 1 x 1, dengan besar file max 2 mb, dan format PNG atau JPG</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
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
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->