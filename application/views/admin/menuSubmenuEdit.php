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

                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/menu/submenu">Submenu</a></span>
                        <span class="breadcrumb-item active" aria-current="page">Edit Submenu</span>

                    </h6>
                </div>
                <div class="card-body">
                    <form class="user" action="" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id">ID</label>&nbsp;(<strong><?= $subMenu['id'] ?></strong>)
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tittle">Tittle</label>
                                <input type="text" name="tittle" class="form-control form-control-file form-control-sm" id="tittle" value="<?= $subMenu['tittle'] ?>">
                                <small class="form-text text-danger"><?= form_error('tittle') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="menu_id">Menu</label>
                                <select class="form-control form-control-sm" name="menu_id" id="menu_id">
                                    <?php foreach ($menu as $mn) : ?>
                                    <?php if ($mn['id'] == $subMenu['menu_id']) : ?>
                                    <option value="<?= $mn['id']; ?>" selected><?= $mn['menu']; ?></option>
                                    <?php else : ?>
                                    <option value="<?= $mn['id']; ?>"><?= $mn['menu']; ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="url">Tittle</label>
                                <br><strong></strong>
                                <input type="text" name="url" class="form-control form-control-file form-control-sm" id="url" value="<?= $subMenu['url'] ?>">
                                <small class="form-text text-danger"><?= form_error('url') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <?php if ($subMenu['is_active'] == 1) : ?>
                                    <input type="radio" id="is_active1" name="is_active" value="1" class="custom-control-input" checked>
                                    <?php else : ?>
                                    <input type="radio" id="is_active1" name="is_active" value="1" class="custom-control-input">
                                    <?php endif; ?>
                                    <label class="custom-control-label" for="is_active1">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <?php if ($subMenu['is_active'] == 0) : ?>
                                    <input type="radio" id="is_active2" name="is_active" value="0" class="custom-control-input" checked>
                                    <?php else : ?>
                                    <input type="radio" id="is_active2" name="is_active" value="0" class="custom-control-input">
                                    <?php endif; ?>
                                    <label class="custom-control-label" for="is_active2">Not Active</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary btn-sm float-left mt-3">Ubah</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->