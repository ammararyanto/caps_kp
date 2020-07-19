<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row mb-4">
        <div class="col-auto">
            <i class="ml-2 fas <?= $iconTitle ?> fa-2x text-<?= $viewColour ?>"></i>
        </div>
        <h4 class="font-weight-bold text-grey-100 my-auto"><?= $tittle ?></h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/teknisi">Teknisi</a></span>
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
                                    <th>Nama&nbspPelanggan</th>
                                    <th>Tanggal&nbspMasuk</th>
                                    <th>Device</th>
                                    <th>Kerusakan</th>
                                    <?php if ($sPengerjaan == 1 || $sPengerjaan == 3) : ?>
                                        <th>Penaggung&nbspJawab</th>
                                    <?php else : ?>
                                        <th>Teknisi</th>
                                    <?php endif; ?>
                                    <th>Status&nbspPengerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($nota as $nt) : ?>

                                    <?php
                                    //script untuk ambil nama teknisi berdasarkan id
                                    $this->db->select();
                                    $this->db->where('id', $nt['id_user']);
                                    $this->db->from('user');
                                    $namaCS =  $this->db->get()->row()->name;

                                    //func untuk merubah waktu dr full datetime menjadi long date indo
                                    $timeStampTanggalMasuk = strtotime($nt['tanggal_taransaksi']);
                                    $tanggal_masuk = date('Y-m-d', $timeStampTanggalMasuk);

                                    //func untuk menampilkan nama penanggung jawab sesuai dengan status pengerjaan
                                    if ($sPengerjaan == 1 || $sPengerjaan == 3) {
                                        $namaPJ = $namaCS;
                                    } else {
                                        $namaPJ = $nt['name'];
                                    }

                                    ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>admin/teknisi/lihatDetail/<?= $nt['id_transaksi'] ?>"><?= $nt['nama_pelanggan'] ?></a></td>
                                        <td><?= longdate_indo($tanggal_masuk); ?></td>
                                        <td><?php echo $nt['product'] . '&nbsp' . $nt['platform'] ?></td>
                                        <td><?= $nt['total_barang'] ?></td>
                                        <td><?= $namaPJ ?></td>
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