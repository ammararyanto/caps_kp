<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg">
            <div class="card shadow mb-4 border-left-primary" style="overflow-x:auto;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><?php echo $tittle ?></span>
                    </h6>
                </div>

                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-primary mb-4 btn-icon-split float-left mr-3" data-toggle="modal" data-target="#AddSubmenu">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text ">Add New Submenu</span>
                    </a>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($subMenu as $sm) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <th><?= $sm['tittle'] ?></th>
                                    <th><?= $sm['menu'] ?></th>
                                    <th><?= $sm['url'] ?></th>
                                    <th><?php
                                        if ($sm['is_active'] == 1) {
                                            echo 'Active';
                                        } else {
                                            echo 'Not Activated';
                                        }
                                        ?></th>
                                    <th>
                                        <a href="<?= base_url() ?>admin/menu/editSubmenu/<?= $sm['id'] ?>" class="btn btn-success btn-circle btn-sm">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="<?= base_url() ?>admin/menu/deleteSubmenu/<?= $sm['id'] ?>" class="btn btn-danger btn-circle btn-sm">
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
<div class="modal fade" id="AddSubmenu" tabindex="-1" role="dialog" aria-labelledby="AddSubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddSubmenuLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menu/submenu') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Submenu tittle">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $mn) : ?>
                                <option value="<?= $mn['id'] ?>"><?= $mn['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" name="is_active" id="is_active" checked>
                            <label for="is_active" class="custom-control-label">Active?</label>
                        </div>
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