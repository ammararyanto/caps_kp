<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>


    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Change User Level</h6>
                </div>
                <div class="card-body">
                    <form class="user" action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id_member" class="form-control form-control-file" id="id_member" value="">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name">Nama</label>
                                <br><strong></strong>
                                <input type="text" name="name" class="form-control form-control-file form-control-sm" id="name" value="<?= $userLevel['name'] ?>">
                                <small class="form-text text-danger"><?= form_error('name') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <br><strong></strong>
                                <input type="text" name="email" class="form-control form-control-file form-control-sm" id="email" value="<?= $userLevel['email'] ?>">
                                <small class="form-text text-danger"><?= form_error('email') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="password">Password</label>
                                <br><strong></strong>
                                <input type="text" name="password" class="form-control form-control-file form-control-sm" id="password" value="notactivated">
                                <small class="form-text text-danger"><?= form_error('password') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="role">Role</label>
                                <select class="form-control form-control-sm" name="role" id="role">
                                    <?php foreach ($role as $rl) : ?>
                                        <?php if ($rl['id'] == $userLevel['role_id']) : ?>
                                            <option value="<?= $rl['id']; ?>" selected><?= $rl['role']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $rl['id']; ?>"><?= $rl['role']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="tambah_nota" class="btn btn-primary float-left mt-3">Ubah</button>
                    </form>
                </div>
            </div>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->