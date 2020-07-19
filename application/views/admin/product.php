<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $tittle ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item">Product</a></span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>
                    <a class="btn btn-primary mb-3" href="<?= base_url() ?>admin/gudang/addProduct">Tambah Product Baru</a>
                    <!-- DataTales Product -->
                    <div style="overflow-x:auto;">
                        <table class="table table-bordered dataTable" id="dataTableProduct" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = null; ?>
                                <?php foreach ($product as $pd) : ?>
                                    <tr>
                                        <?php
                                        $no = $no + 1;
                                        ?>
                                        <td><?= $no ?></td>
                                        <td><?= $pd['product'] ?></td>
                                        <td>
                                            <img src="<?= base_url() ?>image/product/<?= $pd['image'] ?>" alt="<?= $pd['product'] ?>" style="height:30px;">
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Teknisi Button">
                                                <a class="btn btn-warning btn-sm" href="<?= base_url() ?>admin/gudang/edit/<?= $pd['id'] ?>" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
                                                <a class="btn btn-primary btn-sm" href="<?= base_url() ?>admin/gudang/checklist/<?= $pd['id'] ?>" data-toggle="tooltip" title="Checklist"><i class="far fa-fw fa-check-square"></i></i></a>
                                                <a class="btn btn-danger btn-sm delete-btn" href="<?= base_url() ?>admin/gudang/delete/<?= $pd['id'] ?>" data-toggle="tooltip" title="Delete"><i class="fas fa-fw fa-trash"></i></a>
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