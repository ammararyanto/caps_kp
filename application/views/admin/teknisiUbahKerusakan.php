<!-- Begin Page Content -->

<form action="<?= base_url() ?>admin/teknisi/ubahKerusakan/<?= $transaksi['id_transaksi'] ?>" method="POST">
    <div class="container-fluid transaksi">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <span class="breadcrumb-item">Data Pelanggan</span>
                        </h6>
                    </div>
                    <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
                    <input type="hidden" name="tanggal_ubah" id="tanggal_ubah" value="<?= time() ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label-sm" for="id_member">ID Nota</label>
                                    <input type="text" class="form-control form-control-sm" id="id_member" name="id_member" value="<?= $transaksi['id_transaksi'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label-sm" for="nama">Nama Customer</label>
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $transaksi['nama_pelanggan'] ?>" disabled>
                                    <small class="form-text text-danger"><?php echo form_error('nama') ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label-sm" for="no_hp">No Telfon</label>
                                    <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" value="<?= $transaksi['no_hp'] ?>" disabled>
                                    <small class="form-text text-danger"><?= form_error('no_hp') ?></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label-sm" for="alamat">Alamat</label>
                                    <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?= $transaksi['alamat'] ?>" disabled>
                                    <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                </div>
                            </div>
                            <div class="form-grup col-md-4">
                                <label class="col-form-label-sm" for="alamat">Jenis Device</label>
                                <input type="text" class="form-control form-control-sm" id="product_id" name="product_id" value="<?= $transaksi['product'] ?>" disabled>
                                <small class="form-text text-danger"><?= form_error('product_id') ?></small>
                            </div>
                            <div class="form-grup col-md-4">
                                <label class="col-form-label-sm" for="alamat">Tipe Device</label>
                                <input type="text" class="form-control form-control-sm" id="platform_id" name="platform_id" value="<?= $transaksi['platform'] ?>" disabled>
                                <small class="form-text text-danger"><?= form_error('platform_id') ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <span class="breadcrumb-item">Pilih Kerusakan</a></span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <h4>Cari Barang</h4>
                        <div class="input-group">
                            <input type="text" name="searchTeknisi" id="searchTeknisi" class="form-control bg-light border-0 small searchTeknisi" placeholder="Cari..." aria-label="Cari" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row" id="resultTeknisi">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <span class="breadcrumb-item">Kerusakan</a></span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 px-0">
                                <div class="ml-2" id="cart_detailstek">
                                    <!-- isi transaksi -->
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold" for="konfirmasi">Konfirmasi Perubahan</label>
                            <select class="form-control" name="konfirmasi" id="konfirmasi">
                                <option value="">Pilih</option>
                                <option value="2">Simpan Perubahan</option>
                            </select>
                            <small class="form-text text-danger"><?= form_error('konfirmasi') ?></small>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mt-1">Ubah Kerusakan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- End of Main Content -->