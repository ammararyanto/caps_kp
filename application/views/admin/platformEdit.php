<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/gudang/platform">Platform</a></span>
                        <span class="breadcrumb-item active">Add Platform</span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open_multipart('admin/gudang/platformEdit/' . $platform['id']); ?>
                    <div class="form-group row">
                        <label for="platform" class="col-sm-2 col-form-label">Platform</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="platform" name="platform" value="<?= $platform['platform'] ?>">
                            <small class="form-text text-danger"><?= form_error('menu') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('image/platform/') . $platform['image'] ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" value="<?= $platform['image'] ?>">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                        <small class="text-danger pl-3">Images must be 1x1 in size, 2mb maximum. PNG, JPG, GIF format</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Product</div>
                        <div class="col-sm-10">
                            <select name="product_id" id="product_id" class="form-control">
                                <?php foreach ($product as $pd) : ?>
                                    <?php if ($pd['id'] == $platform['product_id']) : ?>
                                        <option value="<?= $pd['id'] ?>" selected><?= $pd['product'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $pd['id'] ?>"><?= $pd['product'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('menu') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="model" class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="model" name="model" value="<?= $platform['model'] ?>">
                            <small class="form-text text-danger"><?= form_error('menu') ?></small>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->