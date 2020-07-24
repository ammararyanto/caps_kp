<!-- start hero area -->
<section id="hero-area">
    <div class="bg-grey-trans">
        <div class="container">
            <div class="row txt-sm-center">
                <div class="col-md-5 m-auto">
                    <img src="<?= base_url() ?>image/caps_logo.svg" class="img-fluid wow zoomIn">
                </div>
                <div class="col-md-7 m-auto">
                    <h2 class="txt-grey wow fadeInUp" data-wow-delay="1s">
                        Cek Status <span class="txt-blue">Servis Device Anda</span><br>
                    </h2>
                    <form action="<?= base_url() ?>user/CekServis" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" id="cari_nota" name="cari_nota" placeholder="ID Transaksi Untuk mengecek">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php $no = 0; ?>
                    <?php foreach ($detail as $nt) {
                        $no = $no + 1;
                    } ?>

                    <?php if ($no == 0) : ?>
                        <h2 class="mt-3 txt-grey text-left">Tidak Ada Data</h2>
                    <?php else : ?>
                        <h2 class="mt-3 txt-grey text-left">Nama : <?= $transaksi['nama_pelanggan'] ?></h2>
                        <table class="table table-responsive txt-grey text-left" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Tangal</th>
                                    <th>Jam</th>
                                    <th>Status&nbspPengerjan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detail as $nt) : ?>
                                    <?php
                                    if ($nt['sPengerjaan'] == 1) {
                                        $kata = 'Sedang dalam pengecekan oleh ' . $nt['name'];
                                    } elseif ($nt['sPengerjaan'] == 2) {
                                        $kata = 'Menunggu konfirmasi anda untuk melakukan perbaikan';
                                    } elseif ($nt['sPengerjaan'] == 3) {
                                        $kata = 'Konfirmasi anda telah kami terima, proses perbaikan akan segera dikerjakan';
                                    } elseif ($nt['sPengerjaan'] == 4) {
                                        $kata = 'Sedang dalam proses perbaikan oleh ' . $nt['name'];
                                    } elseif ($nt['sPengerjaan'] == 5) {
                                        $kata = 'Proses perbaikan telah selesai, silahkan menyelesaikan pembayaran untuk mengambil gawai anda';
                                    } elseif ($nt['sPengerjaan'] == 6) {
                                        $kata = 'Proses perbaikan telah dibatalkan, silahkan datang ke Counter untuk mengambil gawai anda';
                                    } elseif ($nt['sPengerjaan'] == 7) {
                                        $kata = 'Pembayaran telah selesai dan Gawai sudah di terima oleh pemilik';
                                    } elseif ($nt['sPengerjaan'] == 8) {
                                        $kata = 'Gawai telah diterima oleh pemilik';
                                    } else {
                                        $kata = '';
                                    }

                                    ?>
                                    <?php if ($nt['sPengerjaan'] == 5 && $nt['sPembayaran'] >= 2) : ?>

                                    <?php else : ?>
                                        <tr>
                                            <td>
                                                <?php $date = date('Y-m-d', $nt['datetime']);
                                                echo longdate_indo($date);
                                                ?>
                                            </td>
                                            <td><?= date('H:i', $nt['datetime']); ?></td>
                                            <td><?= $kata ?></td>
                                        </tr>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>