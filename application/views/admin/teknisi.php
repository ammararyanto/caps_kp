<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message_oper'); ?>
    <div class="row ml-2">
        <h3>Pekerjaan</h3>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/teknisi/teknisiCek') ?>" class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-9 ">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perlu Di cek</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $belumDicek; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <i class="float-right fas fa-clipboard-check fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/teknisi/menungguKonfirmasi') ?>" class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-9 ">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Menunggu Konfirmasi</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $menungguKonfirmasi; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <i class="float-right fas fa-phone fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/teknisi/sudahKonfirmasi') ?>" class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-9 ">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sudah dikonfirmasi</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $sudahKonfirmasi; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <i class="float-right fas fa-user-check fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/teknisi/daftarServisan') ?>" class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-9 ">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Daftar Antrian Servis</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $daftarServisan; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <i class="float-right fas fa-clipboard-list fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <div class="row ml-2">
        <h3>Pengerjaan Jadi Hari ini</h3>
    </div>
    <div class="row">

        <?php foreach ($daftarTeknisi as $dt) : ?>
            <?php
            $id_teknisi = $dt['id'];
            $sPengerjaan = 5;
            $tgl = date('Y-m-d', time());
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->where('tanggal_selesai like', $tgl . '%');
            $this->db->where('id_teknisi', $id_teknisi);
            $jumlahServis = $this->db->count_all_results();

            if ($user['id'] == $dt['id']) {
                $link = base_url('admin/teknisi/servisSelesaiTeknisi/') . $dt['id'];
                $class = "";
            } else {
                $link = "";
                $class = "disableButtonTeknisi";
            }

            if ($jumlahServis == 0) {
                $hidden = " hidden";
            } else
                $hidden = "";

            ?>


            <div class="col-xl-3 col-md-6 mb-4" <?= $hidden ?>>
                <a href="<?= $link ?>" class="card border-left-primary shadow h-100 py-2 <?= $class ?>">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-sm-9 ">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $dt['name']; ?></div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlahServis; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <i class="float-right fas fa-user fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>

    </div>

    <div class="row ml-2">
        <h3>Review Hari Ini</h3>
    </div>

    <?php
    $today = date("Ymd", time());
    $selesaiHariIniJumlah = 0;
    $cancelHariIniJumlah = 0;
    foreach ($selesaiHariIni as $sHI) {
        $tanggalSelesai = date("Ymd", $sHI['datetime']);
        if ($tanggalSelesai == $today) {
            $selesaiHariIniJumlah++;
        }
    }

    foreach ($cancelHariIni as $cHI) {
        $tanggalCancel = date("Ymd", $cHI['datetime']);
        if ($tanggalCancel == $today) {
            $cancelHariIniJumlah++;
        }
    }
    ?>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/teknisi/servisHariIni/5') ?>" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-9 ">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transaksi Selesai</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $selesaiHariIniJumlah; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <i class="float-right fas fa-calendar-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('admin/teknisi/servisHariIni/6') ?>" class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-9 ">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Transaksi Batal</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $cancelHariIniJumlah; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <i class="float-right fas fa-calendar-times fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->