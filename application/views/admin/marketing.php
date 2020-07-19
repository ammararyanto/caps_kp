<!-- Begin Page Content -->

<?php
$kotor = 0;
foreach ($omset as $om) {
    $tsDiambil = strtotime($om['tanggal_diambil']);
    $tanggal_diambil =  date('Y - m - d', $tsDiambil);
    $today = date('Y - m - d', time());
    if ($tanggal_diambil == $today) {
        $kotor = $om['grand_total'] + $kotor;
    }
}

$hitung_nota = 0;
foreach ($nota_hariini as $nthi) {
    $tsTransaksi = strtotime($nthi['tanggal_taransaksi']);
    $tanggal_transaksi = date('Y - m - d', $tsTransaksi);
    $today = date('Y - m - d', time());
    if ($tanggal_transaksi == $today) {
        $hitung_nota = 1 + $hitung_nota;
    }
}

?>
<div class="container-fluid">
    <div class="row ml-2">
        <h3>Review Harian</h3>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nota Hari Ini</div>
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
    </div>
    <div class="row ml-2">
        <h3>Konfirmasi</h3>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/marketing/harusKonfirmasi') ?>" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-9 ">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Harus Dikonfirmasi</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $menungguKonfirmasi ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <i class="float-right fas fa-phone fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/marketing/belumDiambil') ?>" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-9 ">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Belum Diambil</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $belumDiambil ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <i class="float-right fas fa-hand-paper fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <!-- Page Heading -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->