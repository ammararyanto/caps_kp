<!-- Begin Page Content -->

<?php
$disable_view = 1;

//data hobi dari tabel siswa 
$datacheck = explode(',', $checklist_data['checklist_awal']);
?>
<div class="container-fluid">
    <div class="row mb-3 px-1">
        <div class="btn-group btn-sm float-left" role="group" aria-label="Teknisi Button">
            <button onclick="history.go(-1);" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-chevron-left"></i> Kembali</button>
        </div>
    </div>

    <form id="actionDetail" action="" method="POST">
        <div class="card shadow mb-4">
            <div class="card-header py-auto">
                <h6 class="my-1 font-weight-bold text-primary">
                    <span class="breadcrumb-item">Form Pengalihan Teknisi</span>
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
                            <input type="hidden" name="status_pengerjaan" id="id_transaksi" value="<?= $transaksi['stasus_pengerjaan'] ?>">
                            <div class="form-group col-md-3">
                                <label class="col-form-label-sm" for="tanggalAwal">Atas Nama Transaksi</label>
                                <input type="text" name="nama_pelanggan" class="form-control form-control-sm" value="<?= $transaksi['nama_pelanggan'] ?> " disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label-sm" for="tanggalAkhir">Status Pengerjaan</label>
                                <input type="text" name="stasus_pengerjaan" class="form-control form-control-sm" value="<?= $transaksi['sPengerjaan'] ?> " disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label-sm" for="tanggalAkhir">Teknisi Sebelumnya</label>
                                <input type="text" name="teknisi_sebelum" class="form-control form-control-sm" value="<?= $nama_teknisi ?> " disabled>
                            </div>
                            <div class="form-grup col-md-3">
                                <label class="col-form-label-sm" for="id_sPengerjaan">Teknisi Pengganti</label>
                                <select class="form-control form-control-sm " name="id_teknisi" id="id_teknisi">
                                    <option value=''>Pilih Teknisi</option>
                                    <?php foreach ($daftarTeknisi as $dt) : ?>
                                        <option value="<?= $dt['id']; ?>"><?= $dt['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('id_teknisi') ?></small>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-2 pt-4">
                        <button class="btn btn-primary btn-icon-split btn-sm mt-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-retweet"></i>
                            </span>
                            <span class="text">Submit Pergantian</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>


    <div class="card shadow mb-4">
        <div class="card-header py-auto">
            <h6 class="my-1 font-weight-bold text-primary">
                <span class="breadcrumb-item">Detail Servisan</span>
            </h6>
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
                                        <label class="col-form-label-sm" for="nama">Nomer Handphone</label>
                                        <input type="text" class="form-control form-control-sm" value="0<?= $transaksi['no_hp'] ?> " disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                        <input type="text" class="form-control form-control-sm" value="<?= $nama_teknisi ?>" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- garis divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- tabel detail kerusakan -->
                            <form id="actionDetail" action="<?= base_url() ?>admin/teknisi/actionTeknisiDetail" method="POST">
                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <h3 class=" mb-2">Detail Kerusakan</h3>
                                    </div>
                                    <?php if ($disable_view == 0) : ?>
                                        <div class="col-lg-6">
                                            <button id="ButtonBatal" onclick="cekBatal()" type="submit" name="action" value="batal" class="btn btn-danger btn-sm float-right ml-3">Batal</button>
                                            <button id="ButtonSelesai" onclick="cekSelesai()" type="submit" name="action" value="selesai" class="btn btn-success btn-sm float-right">Selesai</button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <table class="table table-responsive">
                                    <tr>
                                        <th>Kerusakan</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>A.N</th>
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

                            </form>

                            <!-- cardview komentar -->
                            <div class="card" hidden>
                                <div class="card-header">
                                    <h5>Keterangan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body mb-3">
                                            <?php if (empty($checklist_data['isi_komentar'])) : ?>

                                            <?php else : ?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?= base_url() ?>image/profile/<?= $checklist_data['image'] ?>" class="rounded-circle mx-auto" style="height: 60px;">
                                                    </div>
                                                    <div class="col-md-10 py-auto">
                                                        <div class="row">
                                                            <div class="font-weight-bold text-primary ?> text-uppercase"><?= $checklist_data['name'] ?></div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="text text-gray-800"> <?= $checklist_data['isi_komentar'] ?></div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- garis divider -->
                                                <hr class="sidebar-divider d-none d-md-block">
                                            <?php endif; ?>

                                            <div class="col-md-12 overflow-auto" style="max-height: 25 0px; min-height : 20px ;">
                                                <?php if (empty($komentar)) : ?>
                                                    <div class="row">
                                                        <div class="text text-gray-500 mx-auto"> Belum ada komentar</div>
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
                                                        ?>

                                                        <div class="row mb-2">
                                                            <div class="col-auto <?= $position ?> ">
                                                                <div class="card bg-<?= $warna_bg ?>">
                                                                    <div class="card-body py-2 px-2">
                                                                        <div class="row">
                                                                            <div class="col-auto">
                                                                                <div class="text-xs font-weight-bold text-<?= $warna_nama ?> text-uppercase"><?= $kmn['name'] ?></div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="text text-<?= $warna_koment ?>"><?= $kmn['isi_komentar'] ?></div>
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


                        </div>

                        <!-- card view checklist -->
                        <div class="col-lg-6">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="mt-3">Checklist</h5>
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
                    </div>
                </div>

            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->