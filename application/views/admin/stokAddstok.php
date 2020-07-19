<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/gudang/stok">Stok</a></span>
                        <span class="breadcrumb-item active">Tambah Stok</span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open_multipart('admin/gudang/addStock/' . $stok['id_barang']); ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tipe Penjualan</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $stok['id_barang'] ?></th>
                                <td><?= $stok['nama_barang'] ?></td>
                                <td><?= $stok['nama_tipepenjualan'] ?></td>
                                <td><?= $stok['harga_beli'] ?></td>
                                <td><?= $stok['harga_jual'] ?></td>
                                <td><input type="text" class="form-control" id="stok" name="stok" placeholder="tuliskan jumlah barang"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group row justify-content-end">
                        <button type="submit" class="btn btn-primary mr-3">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->