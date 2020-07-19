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
$time = date('Y-m-d H:i:s', time());
$todayn = substr(date('mdy', time()), 1); ?>
<!-- Begin Page Content -->
<div>
    <form action="<?= base_url() ?>admin/kasir/servisBaru" method="POST">
        <div class="container-fluid transaksi">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg-7">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Nama Customer</label>
                                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= set_value('nama') ?>" placeholder="-contoh Candra-">

                                        <small class="form-text text-danger"><?php echo form_error('nama') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="no_hp">No Telfon</label>
                                        <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" value="<?= set_value('no_hp') ?>" placeholder="-contoh 081234127483-">
                                        <small class="form-text text-danger"><?= form_error('no_hp') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?= set_value('alamat') ?>" placeholder="-contoh Purwokerto-">
                                        <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="alamat">IMEI / Serial</label>
                                        <input type="text" class="form-control form-control-sm" id="id_device" name="id_device" value="<?= set_value('id_device') ?>" placeholder="-contoh xxxx-">
                                        <small class="form-text text-danger"><?= form_error('id_device') ?></small>
                                    </div>
                                </div>
                                <div class="form-grup col-md-6">
                                    <label for="product_id">Jenis Device</label>
                                    <select class="form-control form-control-sm" name="product_id" id="product_id">
                                        <option value=''>Pilih</option>
                                        <?php foreach ($product as $pd) : ?>
                                            <option value="<?= $pd['id']; ?>"><?= $pd['product']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('product_id') ?></small>
                                </div>
                                <div class="form-grup col-md-6">
                                    <label for="platform_id">Tipe Device</label>
                                    <select class="form-control form-control-sm" name="platform_id" id="platform_id">
                                        <option value="">Pilih</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('platform_id') ?></small>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span class="breadcrumb-item">Keterangan Device</a></span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="komentar">Silahkan tambahkan keterangan (Opsional)</label>
                                <textarea class="form-control" placeholder="contoh : Pascode, iCloud, Kerusakan, Dsb" id="komentar" name="komentar" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span class="breadcrumb-item">Form Cek Device</a></span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <h4>Dikosongi Jika Tidak Berfungsi</h4>
                            <div id="checklist" class="row">

                                <hr class="sidebar-divider d-none d-md-block">

                            </div>
                            <div class="row">
                                <div class="col mt-3">
                                    <button class="btn btn-danger btn-icon-split float-left mr-3">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-times"></i>
                                        </span>
                                        <span class="text">Batal</span>
                                    </button>

                                    <button class="btn btn-primary btn-icon-split ">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text">Proses</span>
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
</div>
<!-- End of Main Content -->