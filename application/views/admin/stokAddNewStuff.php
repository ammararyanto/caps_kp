<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/gudang/stok">Stok</a></span>
                        <span class="breadcrumb-item active">Input Barang</span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open_multipart('admin/gudang/addNewStuff'); ?>
                    <div class="form-group row">
                        <label for="id_barang" class="col-sm-2 col-form-label">Id Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_barang" name="id_barang">
                            <small class="form-text text-danger"><?= form_error('id_barang') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                            <small class="form-text text-danger"><?= form_error('nama_barang') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Gambar / Foto</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('image/platform/default.png') ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                        <small class="text-danger pl-3">Images must be 1x1 in size, 2mb maximum. PNG, JPG, GIF format</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Tipe Penjualan</div>
                        <div class="col-sm-10">
                            <select name="tipe_penjualan" id="tipe_penjualan" class="form-control">
                                <option value="">Pilih Tipe Penjualan</option>
                                <?php foreach ($tipe_penjualan as $tpp) : ?>
                                    <option value="<?= $tpp['id_tipepenjualan'] ?>"><?= $tpp['nama_tipepenjualan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('tipe_penjualan') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_beli" name="harga_beli">
                            <small class="form-text text-danger"><?= form_error('harga_beli') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_jual" name="harga_jual">
                            <small class="form-text text-danger"><?= form_error('harga_jual') ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok" name="stok">
                            <small class="form-text text-danger"><?= form_error('stok') ?></small>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
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