<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/gudang/product"> Product</a></span>
                        <span class="breadcrumb-item active">Checklist <?= $produk['product'] ?></span>
                    </h6>
                </div>
                <div class="card-body">

                    <?= $this->session->flashdata('message'); ?>
                    <button class="btn btn-primary" href="#addChecklist" data-toggle="modal" title="Add Checklist">Add Check List</button>
                    <h4 class="mt-3">Daftar Check <?= $produk['product'] ?></h4>
                    <ul class="mt-3 row">
                        <?php foreach ($checklist as $chk) : ?>
                            <li class="col-md-6">
                                <h5><?= $chk['nama_checklist'] ?> <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url() ?>admin/gudang/deleteChecklist/<?= $chk['id'] ?>" data-toggle="tooltip" title="Delete"><i class="fas fa-fw fa-trash"></i></a></h5>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="addChecklist" tabindex="-1" role="dialog" aria-labelledby="addChecklist" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="ubah"><?= $st['nama_barang']; ?></h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>admin/gudang/checklist/<?= $produk['id'] ?>">
                <div class="modal-body">
                    <div class="form-group fieldGroup">
                        <label for="">Nama Check</label>
                        <div class="input-group">
                            <input type="text" name="nama_check" class="form-control" placeholder="Nama Checklist" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->