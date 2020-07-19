<!-- Begin Page Content -->

<form action="<?= base_url() ?>admin/kasir/Bayar/<?= $transaksi['id_transaksi'] ?>" method="POST">
    <div class="container-fluid transaksi">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label-sm" for="id_member">ID Member</label>
                                            <input type="text" class="form-control form-control-sm" id="id_member" name="id_member" value="<?= $transaksi['id_member'] ?>" disabled>
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
                                    <div class=" form-grup col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label-sm" for="alamat">Alamat</label>
                                            <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?= $transaksi['alamat'] ?>" disabled>
                                            <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                        </div>
                                    </div>
                                    <div class="form-grup col-md-4">
                                        <label for="product_id">Jenis Device</label>
                                        <select class="form-control form-control-sm mt-2" name="product_id" id="product_id" disabled>
                                            <option value="<?= $transaksi['product_id']; ?>"><?= $transaksi['product']; ?></option>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('product_id') ?></small>
                                    </div>
                                    <div class="form-grup col-md-4">
                                        <label for="platform_id">Tipe Device</label>
                                        <select class="form-control form-control-sm mt-2" name="platform_id" id="platform_id" disabled>
                                            <option value="<?= $transaksi['platform']; ?>"><?= $transaksi['platform']; ?></option>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('platform_id') ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <span class="breadcrumb-item">Kerusakan</span>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 px-0">
                                        <div id="cart_detailsubh">
                                        </div>
                                        <!-- isi transaksi -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <span class="breadcrumb-item">Pembayaran</a></span>
                            <?php if ($transaksi['stasus_pengerjaan'] < 5) : ?>
                                <span class="badge badge-info">Dalam Pengerjaan</span>
                            <?php elseif ($transaksi['status_pembayaran'] == 2) : ?>
                                <span class="badge badge-warning">Sudah DP</span>
                            <?php elseif ($transaksi['status_pembayaran'] == 99) : ?>
                                <span class="badge badge-success">Lunas</span>
                            <?php elseif ($transaksi['status_pembayaran'] == 3 || $transaksi['stasus_pengerjaan'] == 6 || $transaksi['stasus_pengerjaan'] == 8) : ?>
                                <span class="badge badge-danger">Cancel</span>
                            <?php endif; ?>
                        </h6>
                    </div>
                    <div class="card-body pt-1">
                        <div class="row mt-4">

                            <div class="col-lg-4 col-md-6">
                                <div class="card border-bottom-info py-0">
                                    <div class="card-body py-3 pr-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Awal</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="text mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= $transaksi['total'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-bottom-danger py-0">
                                    <div class="card-body py-3 pr-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Diskon / Potongan</div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="text mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= $transaksi['diskon'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-bottom-primary py-0">
                                    <div class="card-body py-3">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase">
                                                    <span class="breadcrumb-item">Terbayar</a></span>
                                                    <?php if ($transaksi['status_pembayaran'] == 2) : ?>
                                                        <span class="h4 badge badge-warning">DP</span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="text mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= $transaksi['cash'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 mb-1">
                            <!-- garis divider -->
                            <div class="col-lg-12">
                                <hr class="sidebar-divider d-none d-md-block mb-1">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row align-items-end" <?= $pembayaran_hidden ?>>
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
                                                <input type="radio" id="nominal" name="discnom" value="0" class="custom-control-input discnom" checked>
                                                <label class="custom-control-label" for="nominal">Rp</label>
                                            </div>
                                            <div class="custom-control custom-radio ml-3">
                                                <input type="radio" id="prosentase" name="discnom" value="1" class="custom-control-input discnom">
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
                            <div class="row" <?= $pembayaran_hidden ?>>
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
                                        <input type="text font-weight-bold" class="form-control uang_cash" id="uang_cash" name="uang_cash" value="<?= $transaksi['cash'] ?>" placeholder="- misal 500000 -">
                                        <small class="form-text text-danger"><?= form_error('uang_cash') ?></small>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1" <?= $pembayaran_hidden ?>>
                                <div class="col-lg-12">
                                    <hr class="sidebar-divider d-none d-md-block mb-1 mt-1">
                                </div>
                            </div>

                            <div class="row mt-3" <?= $pembayaran_hidden ?>>
                                <div class="col-md-12">
                                    <h6 class="text-left">Kurang Bayar <b class="text-right">Rp <span class="grand_total"><?= $kurang_pembayaran ?></span></b></h6>
                                    <h6 class="text-left">Kembalian <b class="text-right">Rp <span class="kembalian"></span></b></h6>
                                </div>
                            </div>

                            <input type="hidden" class="form-control ml-2 totalpdiskon" id="totalpdiskon" name="totalpdiskon" value="<?= $kurang_pembayaran ?>">
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
                        <?php if ($transaksi['status_pembayaran'] == 99 && $transaksi['stasus_pengerjaan'] <= 6) : ?>
                            <div class="alert alert-success" role="alert">
                                <b>Terima Kasih, </b>Transaksi atas nama <b><?= $transaksi['nama_pelanggan'] ?></b> sudah Lunas dan konfirmasi pengambilan device sudah bisa dilakukan dengan menekan tombol "Ambil" dibawah ini
                            </div>
                        <?php elseif ($transaksi['status_pembayaran'] == 3 && $transaksi['stasus_pengerjaan'] <= 6) : ?>
                            <div class="alert alert-primary" role="alert">
                                <b>Terima Kasih, </b>Transaksi atas nama <b><?= $transaksi['nama_pelanggan'] ?></b> telah <b>Dibatalkan</b> dan konfirmasi pengambilan device sudah bisa dilakukan dengan menekan tombol "Ambil" dibawah ini</div>
                        <?php elseif ($transaksi['stasus_pengerjaan'] <= 5) : ?>
                            <div class="alert alert-warning" role="alert">
                                <b>Peringatan!</b> periksa dan pastikan kembali <b>Nominal Tunai</b> dan <b>Discount (Termasuk tipe Discount)</b> yang diinputkan sebelum menekan tombol <b>Ubah Pembayaran</b>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col mt-2">
                                <button type="submit" name="submit" value="0" class="btn btn-primary btn-icon-split float-left mr-3" <?= $pembayaran_hidden ?>>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-money-bill-wave-alt"></i>
                                    </span>
                                    <span class="text">Ubah Pembayaran</span>
                                </button>

                                <button type="submit" name="submit" value="1" class="btn btn-info btn-icon-split " <?= $ambil_hidden ?>>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-hand-paper"></i>
                                    </span>
                                    <span class="text">Ambil</span>
                                </button>
                            </div>
                        </div>
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