<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <?php
    $role_id = $user['role_id'];
    $queryMenu = "SELECT role From user_role where id='$role_id'";
    $jobdesc = $this->db->query($queryMenu)->row_array();
    ?>

    <div class="card shadow mb-4 col-lg-6 py-4 pr-4 border-left-dark">
        <div class="row">
            <div class="col-md-4">
                <img class="img-thumbnail rounded-circle mb-4 mx-auto" src="<?= base_url() ?>image/profile/<?= $user['image'] ?>">
            </div>
            <div class="col">
                <h5 class="font-weight-bold"><?= $user['name'] ?></h5>

                <hr class="sidebar-divider ">

                <div class="row">
                    <div class="col-sm-3">
                        <p class="font-weight-bold">Role</p>
                        <p class="font-weight-bold">E-mail</p>
                    </div>

                    <div class="col">
                        <p class="font-weight-light"><?= $jobdesc['role'] ?></p>
                        <p class="font-weight-light"><?= $user['email'] ?></p>
                    </div>
                </div>
                <?php
                $tgl_gabung = date('Y-m-d', $user['date_created']);
                ?>
                <p class="card-text mt-3"><small class="text-muted">Bergabung Sejak <?= date_indo($tgl_gabung) ?></small></p>
                <div class="row mt-4">
                    <div class="col-md-12">

                        <a href="<?= base_url('admin/user/edit'); ?>" class="btn btn-info btn-icon-split float-right ml-3 mt-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">Ubah Profil</span>
                        </a>

                        <a href="<?= base_url('admin/user/changepassword'); ?>" class="btn btn-warning btn-icon-split float-right  mt-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-key"></i>
                            </span>
                            <span class="text">Ubah Password</span>
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