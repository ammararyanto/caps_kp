<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/marketing">Marketing</a></span>
                        <span class="breadcrumb-item active"><?php echo $tittle ?></span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                    <div style="overflow-x:auto;">
                        <table class="table table-bordered dataTable" id="dataTableProduct" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama&nbspPelanggan</th>
                                    <th>Tanggal&nbspMasuk</th>
                                    <th>Device</th>
                                    <th>Kerusakan</th>
                                    <th>Status&nbspPengerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($nota as $nt) : ?>
                                    <?php
                                    //func untuk merubah waktu dr full datetime menjadi long date indo
                                    $tsMasuk = strtotime($nt['tanggal_taransaksi']);
                                    $dt_masuk = date('Y-m-d', $tsMasuk);
                                    $tanggal_masuk = longdate_indo($dt_masuk);
                                    $jam_masuk = date('H:i', $tsMasuk);
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <?php
                                                if ($sPengerjaan == 1) : ?>
                                                    <a href="<?= base_url() ?>admin/teknisi/ubahKerusakan/<?= $nt['id_transaksi']  ?>" name="selesaibtn" id="selesaibtn" class="btn btn-dark btn-sm" data-toggle="tooltip" title="Ubah Kerusakan"><i class="fas fa-edit"></i></a>
                                                <?php elseif ($sPengerjaan == 2) : ?>
                                                    <a href="<?= base_url() ?>admin/marketing/lihatDetail/<?= $nt['id_transaksi']  ?>" name="selesaibtn" id="selesaibtn" class="btn btn-dark btn-sm" data-toggle="tooltip" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                                <?php elseif ($sPengerjaan == 99) : ?>
                                                    <a href="<?= base_url() ?>admin/marketing/lihatDetail/<?= $nt['id_transaksi']  ?>" name="selesaibtn" id="selesaibtn" class="btn btn-dark btn-sm" data-toggle="tooltip" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                                <?php elseif ($sPengerjaan >= 3 && $sPengerjaan <= 4) : ?>
                                                    <a href="<?= base_url() ?>admin/teknisi/statusUpdate/<?= $nt['id_transaksi']  ?>/<?= print time() ?>/<?= $nt['status_pembayaran'] ?>/1" name="selesaibtn" id="selesaibtn" class="btn btn-dark btn-sm selesaibtn" data-toggle="tooltip" title="Selesai"><i class="far fa-fw fa-check-circle"></i></a>
                                                    <a href="<?= base_url() ?>admin/teknisi/statusUpdate/<?= $nt['id_transaksi']  ?>/<?= print time() ?>/<?= $nt['status_pembayaran'] ?>/0" name="batalbtn" id="batalbtn" class="btn btn-dark btn-sm batalbtn" data-toggle="tooltip" title="Batal"><i class="far fa-fw fa-times-circle"></i></a>
                                                <?php endif; ?>

                                            </div>
                                        </td>
                                        <td><?= $nt['nama_pelanggan'] ?></td>
                                        <td>
                                            <?php
                                            echo $tanggal_masuk;
                                            ?>
                                        </td>
                                        <td><?php echo $nt['product'] . '&nbsp' . $nt['platform'] ?></td>
                                        <td><?= $nt['total_barang'] ?></td>


                                        <td><?= $nt['sPengerjaan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->