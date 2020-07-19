<?php
$today = date('Y - m - d', time());
$kotor = 0;
$hitung_lunas = 0;
foreach ($omset as $om) {
    $tsDiambil = strtotime($om['tanggal_diambil']);
    $tanggal_diambil =  date('Y - m - d', $tsDiambil);
    if ($tanggal_diambil == $today) {
        $kotor = $om['grand_total'] + $kotor;
        $hitung_lunas++;
    }
}

$hitung_nota = 0;
foreach ($nota_hariini as $nthi) {
    $tsMasuk = strtotime($nthi['tanggal_taransaksi']);
    $tanggal_transaksi = date('Y - m - d', $tsMasuk);
    if ($tanggal_transaksi == $today) {
        $hitung_nota = 1 + $hitung_nota;
    }
}

$hitung_cancel = 0;
foreach ($nota_cancel as $cancel) {
    $tsCancel = strtotime($cancel['tanggal_diambil']);
    $tanggal_cancel = date('Y - m - d', $tsCancel);
    if ($tanggal_cancel == $today) {
        $hitung_cancel++;
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row ml-2">
        <h2>Menu</h2>
    </div>
    <div class="row">

        <div class="col-xl-3 col-md-2 mb-4">
            <a href="<?= base_url() ?>admin/kasir/servisBaru" class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="no-gutters align-items-center">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-fw fa-tools fa-3x text-gray-300"></i>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <div class="font-weight-bold text-secondary">Servis</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-2 mb-4">
            <a href="<?= base_url() ?>admin/kasir/belumDiambil" class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="no-gutters align-items-center">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-fw fa-file-invoice-dollar fa-3x text-red-300"></i>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <div class="font-weight-bold text-danger">Belum Diambil</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-2 mb-4">
            <a href="<?= base_url() ?>admin/kasir/notaDiambil" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="no-gutters align-items-center">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-fw fa-file-invoice-dollar fa-3x text-success-300"></i>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <div class="font-weight-bold text-success">Sudah Diambil</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-2 mb-4">
            <a href="<?= base_url() ?>admin/kasir/notaSemua" class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="no-gutters align-items-center">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-fw fa-file-invoice-dollar fa-3x text-gray-300"></i>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <div class="font-weight-bold text-secondary">Semua Nota</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row ml-2">
        <h2>Overview</h2>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Omset Hari Ini</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= rupiah($kotor) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nota Masuk Hari Ini</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $hitung_nota ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nota Lunas Hari Ini</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $hitung_lunas ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice fa-2x text-success-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Cancel Hari Ini</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $hitung_cancel ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->