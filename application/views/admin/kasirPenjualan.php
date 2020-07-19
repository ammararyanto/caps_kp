<!-- Begin Page Content -->
<div>
    <?php
    $count = 0;
    $today = date('Y-m-d', time());
    foreach ($notacount as $ntc) {
        $tsTransaksi = strtotime($ntc['tanggal_taransaksi']);
        if (date('Y-m-d', $tsTransaksi) == $today) {
            $count = 1 + $count;
        }
    }

    $nc1 = $count + 1;
    if ($nc1 < 10) {
        $cn = "00" . $nc1;
    } elseif ($nc1 < 100) {
        $cn = "0" . $nc1;
    } elseif ($nc1 < 1000) {
        $cn =  $nc1;
    }
    $time = time();
    $todayn = date('mdy', $time); ?>
    <form action="<?= base_url() ?>admin/kasir/penjualanBaru" method="POST" target="_blank">
        <div class="container-fluid transaksi">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span class="breadcrumb-item">Data Pelanggan</span>
                                <span class="breadcrumb-item active">ID Nota (<?= $nota_id = $todayn . "" . $cn; ?>)</span>
                            </h6>
                        </div>
                        <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $nota_id ?>">
                        <input type="hidden" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= $time ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="id_member">ID Member</label>
                                        <input type="text" class="form-control form-control-sm" id="id_member" name="id_member" value="<?= set_value('id_member') ?>" placeholder="contoh 1123">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Nama Customer</label>
                                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= set_value('nama') ?>" placeholder="contoh Candra">
                                        <small class="form-text text-danger"><?php echo form_error('nama') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="no_hp">No Telfon</label>
                                        <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" value="<?= set_value('no_hp') ?>" placeholder="contoh 81234127483">
                                        <small class="form-text text-danger"><?= form_error('no_hp') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?= set_value('alamat') ?>" placeholder="contoh Purwokerto">
                                        <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>
                                <div class="form-grup col-md-3">
                                    <label for="product_id">Jenis Device</label>
                                    <select class="form-control form-control-sm" name="product_id" id="product_id">
                                        <option value=''>Pilih</option>
                                        <?php foreach ($product as $pd) : ?>
                                            <option value="<?= $pd['id']; ?>"><?= $pd['product']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('product_id') ?></small>
                                </div>
                                <div class="form-grup col-md-3">
                                    <label for="platform_id">Tipe Device</label>
                                    <select class="form-control form-control-sm" name="platform_id" id="platform_id">
                                        <option value="">Pilih</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('platform_id') ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span class="breadcrumb-item">Pilih Barang</a></span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <h4>Cari Barang</h4>
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control bg-light border-0 small search" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="result">
                                <!-- isi pencarian -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span class="breadcrumb-item">Detail Transaksi</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div id="cart_details">
                                <!-- isi transaksi -->
                            </div>
                            <div id="kembalianm">
                                <h6 class="font-weight-bold "> </h6>
                                <div class="form-inline ml-1 mb-2">
                                    <h6 for="diskon">Diskon</h6>
                                    <input type="text" class="form-control ml-2 diskon" id="diskon" name="diskon" placeholder="50000" value="<?= set_value('diskon') ?>">
                                </div>
                                <input type="hidden" class="form-control ml-2 diskonnom" id="diskonnom" name="diskonnom" value="">
                                <div class="form-inline ml-1 mb-2">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="nominal" name="discnom" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="nominal">Rp</label>
                                    </div>
                                    <div class="custom-control custom-radio ml-3">
                                        <input type="radio" id="prosentase" name="discnom" value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="prosentase">%</label>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control ml-2 totalpdiskon" id="totalpdiskon" name="totalpdiskon" value="">
                                <h6 class="font-weight-bold">Grand Total Rp. <span class="grand_total"></span> </h6>

                                <div class="form-inline ml-1 mb-2">
                                    <label for="is_cash">Pembayaran</label>
                                    <select class="form-control form-control-sm ml-3" name="is_cash" id="is_cash">
                                        <option value="">Pilih</option>
                                        <option value="1">Cash</option>
                                        <option value="0">Transfer</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('is_cash') ?></small>
                                </div>
                                <div class="form-inline ml-1 mb-2">
                                    <h6 for="cash">Tunai</h6>
                                    <input type="text" class="form-control ml-2 uang_cash" id="uang_cash" name="uang_cash" value="<?= set_value('uang_cash') ?>" placeholder="contoh 50000">
                                    <small class="form-text text-danger"><?= form_error('uang_cash') ?></small>
                                </div>
                                <h6 class="font-weight-bold">Kembalian Rp. <span class="kembalian"></span> </h6>
                                <input type="hidden" class="form-control ml-2 kembalian" id="kembalian" name="kembalian" placeholder="contoh 50000">
                            </div>
                            <button type="submit" name="submit" value="0" class="btn btn-primary mt-1">Proses</button>
                            <button type="submit" name="submit" value="1" class="btn btn-primary mt-1">Bayar</button>
                            <button class="btn btn-primary btn-sm mt-1 float-right" onClick="window.location.href=window.location.href"><i class="fas fa-redo-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<!-- End of Main Content -->