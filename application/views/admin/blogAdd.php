<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('Blog', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <?= form_open_multipart('admin/blog/add'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold float-left pt-2">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/blog">Blog</a></span>
                        <span class="breadcrumb-item active" aria-current="page"><?php echo $tittle ?></span>
                    </h6>
                    <button type="submit" class="btn btn-primary btn-sm float-right">Upload</button>
                </div>
                <div class="card-body row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tittle" id="tittle" placeholder="Tittle">
                            <small class="form-text text-danger"><?= form_error('tittle') ?></small>
                        </div>
                        <div class="custom-file w-50">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Banner Image</label>
                            <small class="text-danger pl-3">
                            </small>
                        </div>
                        <div class="form-grup">
                            <small class="form-text text-danger"><?= form_error('content') ?></small>
                            <textarea class="ckeditor" name="content" id="content"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tag" id="tag" placeholder="tag" />
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <small class="form-text text-danger"><?= form_error('category_id') ?></small>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="" selected>Select Category</option>
                                <?php foreach ($category as $ctg) : ?>\
                                <option value="<?= $ctg['id']; ?>"><?= $ctg['category']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_id">Product</label><small class="form-text text-danger"><?= form_error('product_id') ?></small>
                            <small class="text-primary">Di isi jika category bukan blog</small>
                            <select class="form-control" name="product_id" id="product_id">
                                <option value="" selected>Select Product</option>
                                <?php foreach ($product as $pd) : ?>\
                                <option value="<?= $pd['id']; ?>"><?= $pd['product']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="publish1" name="publish" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="publish1">Publish</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="publish2" name="publish" class="custom-control-input" value="0" checked>
                            <label class="custom-control-label" for="publish2">Draft</label>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="uploader" id="uploader" value="<?= $user['name'] ?>" />
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->