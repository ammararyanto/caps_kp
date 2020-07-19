<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row m-2">
        <button onclick="history.go(-1);" class="btn btn-primary float-left"><i class="fas fa-fw fa-chevron-left"></i> Kembali</button>
    </div>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item active"><?php echo $tittle ?></span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                    <!-- DataTales Product -->
                    <div style="overflow-x:auto;">
                        <table class="table table-hover dataTable" id="dataTableProduct" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID&nbspNota</th>
                                    <th>ID&nbspMember</th>
                                    <th>Nama&nbspPelanggan</th>
                                    <th>Nomor&nbspTelfon</th>
                                    <th>Jam</th>
                                    <th>Tanggal&nbspMasuk</th>
                                    <th>Tanggal&nbspDiambil</th>
                                    <th>Device</th>
                                    <th>Item</th>
                                    <th>Total</th>
                                    <th>Diskon</th>
                                    <th>Grand&nbspTotal</th>
                                    <th>DP</th>
                                    <th>Status&nbspPembayaran</th>
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


                                    if ($nt['tanggal_diambil'] == '0000-00-00 00:00:00') {
                                        $tanggal_diambil = 'Belum Diambil';
                                    } else {
                                        $tsTanggalDiambil = strtotime($nt['tanggal_diambil']);
                                        $ambil = date('Y-m-d', $tsTanggalDiambil);
                                        $dt_diambil = date('Y-m-d', $tsTanggalDiambil);
                                        $tanggal_diambil = longdate_indo($dt_diambil);
                                        $jam_diambil = date('H:i', $tsTanggalDiambil);
                                    }

                                    ?>

                                    <tr>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <?php if ($nt['stasus_pengerjaan'] < 99) : ?>
                                                    <a class="btn btn-dark btn-sm" href="<?= base_url() ?>admin/kasir/Bayar/<?= $nt['id_transaksi'] ?>" data-toggle="tooltip" title="Bayar"><i class="fas fa-fw fa-money-bill-wave"></i></a>
                                                <?php else : ?>
                                                <?php endif ?>
                                                <a class="btn btn-dark btn-sm" href="<?= base_url() ?>admin/kasir/cetakNota/<?= $nt['id_transaksi'] ?>" target="_blank" data-toggle="tooltip" title="Print"><i class="fas fa-fw fa-print"></i></a>
                                            </div>
                                        </td>
                                        <td class="list-nota"><a href="<?= base_url() ?>admin/kasir/detailkerusakan/<?= $nt['id_transaksi'] ?>" class=""><?= $nt['id_transaksi'] ?></a></td>
                                        <td><?= $nt['id_pelanggan'] ?></td>
                                        <td><?= $nt['nama_pelanggan'] ?></td>
                                        <td><?php echo '+62' . $nt['no_hp'] ?></td>
                                        <td><?php
                                            echo $jam_masuk;
                                            ?></td>
                                        <td>
                                            <?php
                                            echo $tanggal_masuk;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $tanggal_diambil;
                                            ?>
                                        </td>
                                        <td><?php echo $nt['product'] . '&nbsp' . $nt['platform'] ?></td>
                                        <td><?= $nt['total_barang'] ?></td>
                                        <td><?= rupiah($nt['total']) ?></td>
                                        <?php
                                        if ($nt['disc_status'] == 0) {
                                            $diskon = rupiah($nt['diskon']);
                                        } else {
                                            $diskon = $nt['diskon'] . '%';
                                        }
                                        ?>
                                        <td><?= $diskon ?></td>
                                        <td><?= rupiah($nt['grand_total']) ?></td>
                                        <?php $nominal_kembalian = $nt['change_nominal'];
                                        $grand_total = $nt['grand_total'];
                                        $nominal = $grand_total + ($nominal_kembalian);


                                        if ($nominal > 0 && $nominal < $grand_total) {
                                            echo '<td>' . rupiah($nominal) . '</td>';
                                            //DP

                                        } elseif ($nominal == 0) {
                                            echo '<td> Tidak&nbspDP </td>';
                                            //Tidak dp
                                        } elseif ($nominal <= $grand_total) {
                                            echo '<td> Tidak&nbspDP </td>';
                                        } elseif ($nominal > $grand_total) {
                                            echo '<td> Tidak&nbspDP </td>';
                                        }
                                        ?>

                                        <!-- <td><?= $dp ?></td> -->
                                        <td><?= $nt['sPembayaran'] ?></td>
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