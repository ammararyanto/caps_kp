<!-- Begin Page Content -->

<form action="<?= base_url() ?>admin/kasir/Bayar/<?= $transaksi['id_transaksi'] ?>" target="_blank" method="POST">
    <div class="container-fluid transaksi">
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <span class="breadcrumb-item">Data Pelanggan</span>
                            <span class="breadcrumb-item active">ID Nota (<?= $transaksi['id_transaksi'] ?>)</span>
                        </h6>
                    </div>
                    <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
                    <input type="hidden" name="tanggal_ubah" id="tanggal_ubah" value="<?= time() ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label-sm" for="id_member">ID Member</label>
                                    <input type="text" class="form-control form-control-sm" id="id_member" name="id_member" value="<?= $transaksi['id_member'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label-sm" for="nama">Nama Customer</label>
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $transaksi['nama_pelanggan'] ?>" disabled>
                                    <small class="form-text text-danger"><?php echo form_error('nama') ?></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label-sm" for="no_hp">No Telfon</label>
                                    <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" value="<?= $transaksi['no_hp'] ?>" disabled>
                                    <small class="form-text text-danger"><?= form_error('no_hp') ?></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label-sm" for="alamat">Alamat</label>
                                    <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?= $transaksi['alamat'] ?>" disabled>
                                    <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                </div>
                            </div>
                            <div class="form-grup col-md-3">
                                <label for="product_id">Jenis Device</label>
                                <select class="form-control form-control-sm" name="product_id" id="product_id" disabled>
                                    <option value="<?= $transaksi['product_id']; ?>"><?= $transaksi['product']; ?></option>
                                </select>
                                <small class="form-text text-danger"><?= form_error('product_id') ?></small>
                            </div>
                            <div class="form-grup col-md-3">
                                <label for="platform_id">Tipe Device</label>
                                <select class="form-control form-control-sm" name="platform_id" id="platform_id" disabled>
                                    <option value="<?= $transaksi['platform']; ?>"><?= $transaksi['platform']; ?></option>
                                </select>
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
                            <span class="breadcrumb-item">Kerusakan</a></span>
                        </h6>
                    </div>
                    <div class="card-body pt-1">
                        <div class="row">
                            <div class="col-lg-12 px-0">
                                <div id="cart_detailsubh">
                                </div>
                                <!-- isi transaksi -->
                            </div>
                            <!-- garis divider -->
                            <div class="col-lg-12">
                                <hr class="sidebar-divider d-none d-md-block mb-1">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-end">
                                <div class="col-lg-5">
                                    <div class="form-inline mb-2">
                                        <label class="col-form-label" for="nama">Discount</label>
                                        <input type="text" class="form-control diskon" id="diskon" name="diskon" placeholder="50000" value="<?= $transaksi['diskon'] ?>">
                                    </div>
                                    <input type="hidden" class="form-control ml-2 diskonnom" id="diskonnom" name="diskonnom" value="<?= $transaksi['diskon'] ?>">
                                </div>
                                <div class="col-lg-auto">
                                    <div class="form-inline ml-0 mb-3">
                                        <?php if ($transaksi['disc_status'] == 0) : ?>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="nominal" name="discnom" value="0" class="custom-control-input discnom" checked>
                                                <label class="custom-control-label" for="nominal">Rp</label>
                                            </div>
                                            <div class="custom-control custom-radio ml-3">
                                                <input type="radio" id="prosentase" name="discnom" value="1" class="custom-control-input discnom">
                                                <label class="custom-control-label" for="prosentase">%</label>
                                            </div>
                                        <?php else : ?>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="nominal" name="discnom" value="0" class="custom-control-input discnom">
                                                <label class="custom-control-label" for="nominal">Rp</label>
                                            </div>
                                            <div class="custom-control custom-radio ml-3">
                                                <input type="radio" id="prosentase" name="discnom" value="1" class="custom-control-input discnom" checked>
                                                <label class="custom-control-label" for="prosentase">%</label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-lg-12">
                                    <hr class="sidebar-divider d-none d-md-block mb-1">
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Metode Pembayaran</label>
                                        <select class="form-control" name="is_cash" id="is_cash">
                                            <?php if ($transaksi['is_cash'] == 1) : ?>
                                                <option value="1" selected>Cash</option>
                                                <option value="0">Transfer</option>
                                            <?php else : ?>
                                                <option value="1">Cash</option>
                                                <option value="0" selected>Transfer</option>
                                            <?php endif; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('is_cash') ?></small></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Nominal Tunai</label>
                                        <input type="text" class="form-control uang_cash" id="uang_cash" name="uang_cash" value="<?= $transaksi['cash'] ?>" placeholder="contoh 50000">
                                        <small class="form-text text-danger"><?= form_error('uang_cash') ?></small>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <hr class="sidebar-divider d-none d-md-block mb-1 mt-1">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h6 class="text-left">Grand Total <b class="text-right">Rp <span class="grand_total"><?= $transaksi['grand_total'] ?></span></b></h6>
                                    <h6 class="text-left">Kembalian <b class="text-right">Rp <span class="kembalian"></span></b></h6>
                                </div>
                            </div>

                            <input type="hidden" class="form-control ml-2 totalpdiskon" id="totalpdiskon" name="totalpdiskon" value="<?= $transaksi['grand_total'] ?>">
                            <!-- <div class="form-inline ml-1 mb-2">
                                <label for="is_cash">Pembayaran</label>
                                <select class="form-control form-control-sm ml-3" name="is_cash" id="is_cash">
                                    <?php if ($transaksi['is_cash'] == 1) : ?>
                                        <option value="1" selected>Cash</option>
                                        <option value="0">Transfer</option>
                                    <?php else : ?>
                                        <option value="1">Cash</option>
                                        <option value="0" selected>Transfer</option>
                                    <?php endif; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('is_cash') ?></small>
                            </div> -->
                            <!-- <div class="form-inline ml-1 mb-2">
                                <h6 for="cash">Tunai</h6>
                                <input type="text" class="form-control ml-2 uang_cash" id="uang_cash" name="uang_cash" value="<?= $transaksi['cash'] ?>" placeholder="contoh 50000">
                                <small class="form-text text-danger"><?= form_error('uang_cash') ?></small>
                            </div> -->
                            <!-- <h6 class="font-weight-bold">Grand Total Rp. <span class="grand_total"><?= $transaksi['grand_total'] ?></span> </h6>
                            <h6 class="font-weight-bold">Kembalian Rp. <span class="kembalian"></span> </h6> -->
                            <input type="hidden" class="form-control ml-2 kembalian" id="kembalian" name="kembalian" placeholder="contoh 50000">
                        </div>
                        <button type="submit" name="submit" value="0" class="btn btn-primary mt-1">Ubah Pembayaran</button>
                        <button type="submit" name="submit" value="1" class="btn btn-primary mt-1">Ambil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- End of Main Content -->

<script>
    $(document).ready(function() {

        $('#cart_detailsubh').load("<?php echo base_url() ?>admin/kasir/ubahBayar/<?= $transaksi['id_transaksi'] ?>");

    });
</script>