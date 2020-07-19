<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="breadcrumb-item"><a href="<?= base_url() ?>admin/user">User</a></span>
                        <span class="breadcrumb-item active"><?php echo $tittle ?></span>
                    </h6>
                </div>
                <div class="card-body pl-0 pr-0">
                    <?php foreach ($notif as $notif) : ?>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>/admin/user/userKomentar/<?= $notif['id_TrnsCmnt'] ?>">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="far fa-comments text-white"></i>
                                </div>
                            </div>
                            <div>
                                <?php
                                $timestampnotif = strtotime($notif['NR_dateupdate']);
                                $tanggalnotif = date('Y-m-d', $timestampnotif);
                                $waktunotif = date('H:i', $timestampnotif);
                                ?>
                                <div class="small text-gray-500"><?= $waktunotif . ' ' . longdate_indo($tanggalnotif)   ?></div>
                                <span class="">Seseorang Menambahkan Komentar Baru Pada Nota <span class="font-weight-bolder"><?= $notif['nama_pelanggan'] ?></span></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>