<!-- Begin Page Content -->

<?php
$datacheck = explode(',', $checklist_data['checklist_awal']);
$datacheck_selesai = explode(',', $checklist_data['checklist_akhir']);
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="btn-group btn-sm float-left" role="group" aria-label="Teknisi Button">
                <button onclick="history.go(-1);" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-chevron-left"></i> Kembali</button>
            </div>
            <div class="btn-group btn-sm float-right" role="group" aria-label="Teknisi Button">

                <?php
                // deteksi apakan ada dari detail kerusakan yg sudah di kerjakan
                $index_deteksi_batal = 0;
                foreach ($detail as $cek) :
                    if ($cek['status'] == 1) {
                        $index_deteksi_batal++;
                    }
                endforeach;

                // deteksi apakan ada dari detail kerusakan yg belum dikerjakan
                $index_deteksi_belum = 0;
                foreach ($detail as $cek) :
                    if ($cek['status'] == 0) {
                        $index_deteksi_belum++;
                    }
                endforeach;

                $index_batal_semua = 0;
                foreach ($detail as $cek) :
                    if ($cek['status'] == 2) {
                        $index_batal_semua++;
                    }
                endforeach;

                $disable_view = 0;
                if ($transaksi['stasus_pengerjaan'] > 4 || $transaksi['stasus_pengerjaan'] < 4) {
                    $disable_view = 1;
                }

                ?>

                <?php
                if ($transaksi['stasus_pengerjaan'] == 1) : ?>
                    <a href="<?= base_url() ?>admin/teknisi/ubahKerusakan/<?= $transaksi['id_transaksi']  ?>" name="selesaibtn" id="selesaibtn" class="btn btn-dark btn-sm" data-toggle="tooltip" title="Ubah Kerusakan"><i class="fas fa-edit"></i> Ubah Kerusakan</a>
                <?php elseif ($transaksi['stasus_pengerjaan'] == 2 || $transaksi['stasus_pengerjaan'] == 3) : ?>
                    <a href="<?= base_url() ?>admin/teknisi/statusUpdate/<?= $transaksi['id_transaksi']  ?>/<?= print time() ?>/<?= $transaksi['status_pembayaran'] ?>/1" name="selesaibtn" id="selesaibtn" class="btn btn-dark btn-sm kerjakanbtn" data-toggle="tooltip" title="Kerjakan"><i class="far fa-fw fa-check-circle"></i> Kerjakan</a>
                    <a href="<?= base_url() ?>admin/teknisi/statusUpdate/<?= $transaksi['id_transaksi']  ?>/<?= print time() ?>/<?= $transaksi['status_pembayaran'] ?>/0" name="batalbtn" id="batalbtn" class="btn btn-dark btn-sm batalbtn" data-toggle="tooltip" title="Batal"><i class="far fa-fw fa-times-circle"></i> Batal</a>
                <?php elseif ($transaksi['stasus_pengerjaan'] >= 3 && $transaksi['stasus_pengerjaan'] == 4) : ?>
                    <a href="<?= base_url() ?>admin/teknisi/ubahKerusakan/<?= $transaksi['id_transaksi']  ?>" class="btn btn-dark btn-sm" data-toggle="tooltip" title="Ubah Kerusakan"><i class="fas fa-edit"></i> Ubah Kerusakan</a>
                    <?php if ($index_deteksi_belum == 0 && $index_batal_semua < $jml_detail) : ?>
                        <a href="<?= base_url() ?>admin/teknisi/statusUpdate/<?= $transaksi['id_transaksi']  ?>/<?= print time() ?>/<?= $transaksi['status_pembayaran'] ?>/1" name="selesaibtn" id="selesaibtn" class="btn btn-dark btn-sm selesaibtn" data-toggle="tooltip" title="Selesai"><i class="far fa-fw fa-check-circle"></i> Selesai </a>
                    <?php endif; ?>
                    <?php if ($index_deteksi_batal == 0) : ?>
                        <a href="<?= base_url() ?>admin/teknisi/statusUpdate/<?= $transaksi['id_transaksi']  ?>/<?= print time() ?>/<?= $transaksi['status_pembayaran'] ?>/0" name="batalbtn" id="batalbtn" class="btn btn-dark btn-sm batalbtn" data-toggle="tooltip" title="Batal"><i class="far fa-fw fa-times-circle"></i> Batal </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php if ($transaksi['stasus_pengerjaan'] > 1 && $transaksi['stasus_pengerjaan'] < 5) : ?>
                <div class="btn-group btn-sm float-right" role="group">
                    <a href="<?= base_url() ?>admin/teknisi/lihatDetailOper/<?= $transaksi['id_transaksi']  ?>" name="selesaibtn" id="selesaibtn" class="btn btn-dark btn-sm" data-toggle="tooltip" title="Ganti Teknisi"><i class="fas fa-retweet"></i> Ganti Teknisi</a>
                </div>
            <?php else : ?>

            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-lg-12">

                    <!-- row data pelanggan -->
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="col-md-12 mx-auto">
                                <img class="img-thumbnail rounded-circle mx-auto" src="<?= base_url() ?>image/profile/default.png">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Nama Pelanggan</label>
                                        <input type="text" class="form-control form-control-sm" value="<?= $transaksi['nama_pelanggan'] ?> " disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">ID Nota</label>
                                        <input type="text" class="form-control form-control-sm" value="<?= $transaksi['id_transaksi'] ?> " disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Nomer Handphone</label>
                                        <input type="text" class="form-control form-control-sm" value="0<?= $transaksi['no_hp'] ?> " disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Alamat</label>
                                        <input type="text" class="form-control form-control-sm" value="<?= $transaksi['alamat'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Device</label>
                                        <input type="text" class="form-control form-control-sm" value="<?= $transaksi['product'] . ' ' . $transaksi['platform'] ?> " disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">IMEI / Serial</label>
                                        <input type="text" class="form-control form-control-sm" value="<?= $transaksi['id_device'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Status Pengerjaan</label>
                                        <input type="text" class="form-control form-control-sm" value="<?= $transaksi['sPengerjaan'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label-sm" for="nama">Penganggung Jawab</label>
                                        <input type="text" class="form-control form-control-sm" value="<?= $transaksi['name'] ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- garis divider -->
                    <hr class="sidebar-divider d-none d-md-block mb-4">

                    <div class="row">
                        <div class="col-lg-7">
                            <!-- tabel detail kerusakan -->
                            <form id="actionDetail" action="<?= base_url() ?>admin/teknisi/actionTeknisiDetail" method="POST">
                                <?php if ($transaksi['stasus_pengerjaan'] == 4) : ?>
                                    <div class="col-lg-12 alert alert-warning" role="alert">
                                        <b>Peringatan!</b> Setelah servisan selesai, jangan lupa untuk mengisi <b> Checklist Selesai</b> dan menempelkan <b>Stiker Garansi</b> pada device (apabila terjadi pergantian sparepart)
                                        <br>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3 class=" mb-2">Detail Kerusakan</h3>
                                    </div>
                                    <?php if ($disable_view == 0) : ?>
                                        <div class="col-lg-6 mb-2">
                                            <button id="ButtonBatal" onclick="cekBatal()" type="submit" name="action" value="batal" class="btn btn-danger btn-sm float-right ml-3">Batal</button>
                                            <button id="ButtonSelesai" onclick="cekSelesai()" type="submit" name="action" value="selesai" class="btn btn-success btn-sm float-right">Selesai</button>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if (empty($detail)) : ?>
                                    <div class="col-lg-12 alert alert-info mb-5" role="alert">
                                        <b>Informasi!</b> Belum ada jenis kerusakan yang ditambahkan
                                    </div>
                                <?php else : ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-responsive" width="100%">
                                                <tr>
                                                    <th>Kerusakan</th>
                                                    <th>Harga</th>
                                                    <th>Quantity</th>
                                                    <th>Atas Nama</th>
                                                    <th>Status</th>
                                                    <?php if ($disable_view == 0) : ?>
                                                        <th>Pilih</th>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php foreach ($detail as $dtl) : ?>
                                                    <?php

                                                    if ($dtl['status'] == 0) {
                                                        $hidden = " ";
                                                        $status = 'Belum';
                                                        $color = 'gray-600';
                                                    } elseif ($dtl['status'] == 1) {
                                                        $hidden = " hidden";
                                                        $status = 'Selesai';
                                                        $color = 'success';
                                                    } elseif ($dtl['status'] == 2) {
                                                        $hidden = " hidden";
                                                        $status = 'Batal';
                                                        $color = 'danger';
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?= $dtl['nama_barang'] ?> </td>
                                                        <td><?= rupiah($dtl['harga']) ?></td>
                                                        <td><?= $dtl['quantity'] ?></td>
                                                        <td><?= $dtl['name'] ?></td>
                                                        <td class="text-<?= $color ?> text-weight-bold"><?= $status ?></td>
                                                        <?php if ($disable_view == 0) : ?>
                                                            <td>
                                                                <div class="custom-control custom-checkbox" <?= $hidden ?>>
                                                                    <input type="checkbox" class="custom-control-input" id="cb<?= $dtl['id'] ?>" name="terpilih[]" value="<?= $dtl['id'] ?>">
                                                                    <label class="custom-control-label" for="cb<?= $dtl['id'] ?>"></label>
                                                                </div>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>


                                    <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
                                <?php endif; ?>


                            </form>
                        </div>

                        <div class="col-lg-5">
                            <!-- cardview komentar -->
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h5 class="text-gray-100">Keterangan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body mb-3">
                                            <?php if (empty($checklist_data['isi_komentar'])) : ?>

                                            <?php else : ?>
                                                <?php
                                                $tanggal_check = date('Y-m-d', $checklist_data['datetime']);
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?= base_url() ?>image/profile/<?= $checklist_data['image'] ?>" class="mt-0 rounded-circle" style="height: 50px;">
                                                    </div>
                                                    <div class="col-md-10 pl-0 ml-0">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class=" font-weight-bold text-primary text-uppercase"> <?= $checklist_data['name'] ?></div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="text text-xs text-gray-800 mt-2"> <?= longdate_indo($tanggal_check); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <div class="text text-gray-800"> <?= $checklist_data['isi_komentar'] ?></div>
                                                    </div>
                                                </div>
                                                <!-- garis divider -->
                                                <hr class="sidebar-divider d-none d-md-block">
                                            <?php endif; ?>

                                            <div class="col-md-12 overflow-auto" style="max-height: 200px; min-height : 20px ;">
                                                <?php if (empty($komentar)) : ?>
                                                    <div class="row">
                                                        <div class="col-lg-12 alert alert-info my-auto" role="alert">
                                                            <b>Informasi!</b> Belum ada komentar ditambahkan
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <?php foreach ($komentar as $kmn) : ?>
                                                        <?php
                                                        if ($kmn['id'] == $user['id']) {
                                                            $position = ' ml-auto';
                                                            $warna_koment = 'gray-800';
                                                            $warna_nama = 'primary';
                                                            $warna_bg = 'gray-200';
                                                        } else {
                                                            $position = '';
                                                            $warna_koment = 'gray-800';
                                                            $warna_nama = 'primary';
                                                            $warna_bg = '';
                                                        }
                                                        $tanggal_check = date('Y-m-d', $checklist_data['datetime']);
                                                        $tanggal_komen = longdate_indo(date('Y-m-d', $kmn['datetime'])) . ' ' . date('H:i', $kmn['datetime']);
                                                        $jam_check = date('H:i', $kmn['datetime']);
                                                        $datetime_komentar = longdate_indo($tanggal_check) . ' ' . $jam_check;

                                                        ?>

                                                        <div class="row mb-2">
                                                            <div class="col-auto px-1 mr-0 <?= $position ?> ">
                                                                <div class="card bg-<?= $warna_bg ?>">
                                                                    <div class="card-body py-2 px-2">
                                                                        <div class="row">
                                                                            <div class="col-auto">
                                                                                <div class="text-xs font-weight-bold text-<?= $warna_nama ?> text-uppercase"><?= $kmn['name'] ?></div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="text text-<?= $warna_koment ?>"><?= $kmn['isi_komentar'] ?></div>
                                                                                        <div class="float-right mt-1 text text-xs text-<?= $warna_koment ?>"><?= $tanggal_komen ?></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="media mt-3">
                                                        <a class="mr-3" href="#">
                                                            <img src="<?= base_url() ?>image/profile/<?= $kmn['image'] ?>" class="mr-3 rounded-circle" style="height: 50px;">
                                                        </a>
                                                        <div class="media-body">
                                                            <h5 class="mt-0"><?= $kmn['name'] ?></h5>
                                                            <?= $kmn['isi_komentar'] ?>
                                                        </div>
                                                    </div> -->
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>


                                    <form action="<?= base_url() ?>admin/teknisi/komentar/<?= $checklist_data['id_komentar'] ?>" method="POST">
                                        <div class="form-group">
                                            <div class="mt-3">
                                                <?= $this->session->flashdata('message'); ?>
                                            </div>
                                            <h5 for="komentar">Tambahkan Komentar</h5>
                                            <textarea class="form-control" placeholder="Tulis komentar anda disini" id="komentar" name="komentar" rows="3"></textarea>
                                        </div>
                                        <?php
                                        $u1 = $this->uri->segment(1);
                                        $u2 = $this->uri->segment(2);
                                        $u3 = $this->uri->segment(3);
                                        $u4 = $this->uri->segment(4);
                                        ?>
                                        <input type="hidden" name="url" id="url" value="<?php echo $u1 . '/' . $u2 . '/' . $u3 . '/' . $u4 ?>">
                                        <button type="submit" class="btn btn-sm btn-default btn-primary float-right">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- tutup card komentar -->
                        </div>
                    </div>
                    <!-- garis divider -->
                    <hr class="sidebar-divider d-none d-md-block mb-2 mt-4">

                    <div class="row">
                        <!-- card view checklist -->
                        <div class="col-lg-6">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="mt-3">Checklist Awal</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach ($checklist as $chk) : ?>
                                            <div class="col-md-6">
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input type="checkbox" class="custom-control-input" name="checklist[]" id="checklist<?= $chk['id'] ?>" value="<?= $chk['id'] ?>" <?php if (in_array($chk['id'], $datacheck)) echo "checked"; ?> disabled>
                                                    <label class="custom-control-label" for="checklist<?= $chk['id'] ?>"> <?= $chk['nama_checklist'] ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <!-- open tag checklist selesai -->
                            <?php if ($transaksi['stasus_pengerjaan'] >= 3 && $transaksi['stasus_pengerjaan'] == 4) : ?>
                                <form action="<?= base_url() ?>admin/teknisi/simpan_checklistSelesai/<?= $checklist_data['id_komentar'] ?>" method="POST">

                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h5 class="mt-3 float-left">Checklist Selesai</h5>
                                            <button type="submit" class="btn btn-sm btn-default btn-primary float-right mt-3">Simpan Checklist</button>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php
                                                $u1 = $this->uri->segment(1);
                                                $u2 = $this->uri->segment(2);
                                                $u3 = $this->uri->segment(3);
                                                $u4 = $this->uri->segment(4);
                                                ?>
                                                <input type="hidden" name="url" id="url" value="<?php echo $u1 . '/' . $u2 . '/' . $u3 . '/' . $u4 ?>">
                                                <?php foreach ($checklist as $chk) : ?>
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input" name="checklist_selesai[]" id="checklist_selesai<?= $chk['id'] ?>" value="<?= $chk['id'] ?>" <?php if (in_array($chk['id'], $datacheck_selesai)) echo "checked"; ?>>
                                                            <label class="custom-control-label" for="checklist_selesai<?= $chk['id'] ?>"> <?= $chk['nama_checklist'] ?></label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            <?php elseif ($transaksi['stasus_pengerjaan'] != 3 && $transaksi['stasus_pengerjaan'] != 4) : ?>

                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h5 class="mt-3">Checklist Selesai</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php foreach ($checklist as $chk) : ?>
                                                <div class="col-md-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" name="checklist_selesai[]" id="checklist_selesai<?= $chk['id'] ?>" value="<?= $chk['id'] ?>" <?php if (in_array($chk['id'], $datacheck_selesai)) echo "checked"; ?> disabled>
                                                        <label class="custom-control-label" for="checklist_selesai<?= $chk['id'] ?>"> <?= $chk['nama_checklist'] ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>


                            <?php endif; ?>

                        </div>






                    </div>

                </div>
            </div>
        </div>




    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->