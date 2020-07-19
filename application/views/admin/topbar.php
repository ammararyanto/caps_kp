<?php
$ci = &get_instance();
$ci->load->model('User_model');

$jumlahnotif = $ci->User_model->hitungNotifikasi($user['id']);
$notif = $ci->User_model->getNotif($user['id']);

if ($jumlahnotif <= 5) {
    $jumlahnotif = $jumlahnotif;
} else {
    $jumlahnotif = '5+';
}
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <?php if ($jumlahnotif > 0) : ?>
                            <span class="badge badge-danger badge-counter"><?= $jumlahnotif ?></span>
                        <?php else : ?>
                        <?php endif; ?>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Notifikasi Komentar Pengerjaan
                        </h6>
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
                        <?php if ($notif == null) : ?>
                            <span class="dropdown-item text-center small text-gray-500">Tidak Ada Notifikasi</span>
                        <?php else : ?>
                            <a class="dropdown-item text-center small text-gray-500" href="<?= base_url() ?>/admin/user/userNotification">Tampilkan semua</a>
                        <?php endif; ?>
                    </div>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'] ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url() ?>image/profile/<?= $user['image'] ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url() ?>admin/user">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url() ?>auth/logout" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->