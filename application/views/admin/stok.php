<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item">Stok</a></span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                    <a class="btn btn-primary mb-3" href="<?= base_url() ?>admin/gudang/addNewStuff">Tambahkan Barang</a>
                    <a class="btn btn-primary mb-3" href="<?= base_url() ?>admin/gudang/reportAksesoris" hidden>Laporan Akssesoris</a>
                    <a class="btn btn-primary mb-3" href="<?= base_url() ?>admin/gudang/reportSparepart" hidden>Laporan Sparepart</a>
                    <?php
                    $total = 0;
                    foreach ($stok as $st) {
                        $harga = $st['harga_jual'];
                        $jumlah_barang = $st['stok_barang'];
                        $total  = $total + ($harga * $jumlah_barang);
                    }

                    ?>
                    <!-- <span class="float-right font-weight-bold">Total Aset = <?php echo rupiah($total) ?></span> -->
                    <!-- DataTales Product -->
                    <div style="overflow-x:auto;">
                        <table class="table table-bordered dataTable" id="dataTableProduct" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <td>ID&nbspBarang</td>
                                    <th>Nama&nbspBarang</th>
                                    <th>Tipe&nbspBarang</th>
                                    <th>Foto</th>
                                    <th>Harga&nbspBeli</th>
                                    <th>Harga&nbspJual</th>
                                    <th>Stok&nbspBarang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = null; ?>
                                <?php foreach ($stok as $st) : ?>

                                    <tr>
                                        <?php
                                        $no = $no + 1;
                                        ?>
                                        <td><?= $no ?></td>
                                        <td><?= $st['id_barang'] ?></td>
                                        <td><?= $st['nama_barang'] ?></td>
                                        <td><?= $st['nama_tipepenjualan'] ?></td>
                                        <td>
                                            <img src="<?= base_url() ?>image/barang/<?= $st['foto'] ?>" alt="<?= $st['nama_barang'] ?>" style="height:30px;">
                                        </td>
                                        <td><?php echo rupiah($st['harga_beli']) ?></td>
                                        <td><?php echo rupiah($st['harga_jual']) ?></td>
                                        <td><?= $st['stok_barang'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success btn-sm" href="<?= base_url() ?>admin/gudang/addStock/<?= $st['id_barang'] ?>" data-toggle="tooltip" title="Tambah Stok"><i class="fas fa-fw fa-plus"></i></a>
                                                <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/gudang/stuffEdit/<?= $st['id_barang'] ?>" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
                                                <?php
                                                $jumlah_barang = $st['stok_barang'];
                                                if ($jumlah_barang < 1) {
                                                ?>
                                                    <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url() ?>admin/gudang/stuffDelete/<?= $st['id_barang'] ?>" data-toggle="tooltip" title="Delete"><i class="fas fa-fw fa-trash"></i></a>
                                                <?php
                                                } else {
                                                }
                                                ?>
                                            </div>
                                        </td>
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