<!-- start hero area -->
<section id="hero-area">
    <div class="bg-grey-trans">
        <div class="container">
            <div class="row txt-sm-center">
                <div class="col-md-6 m-auto">
                    <img src="<?= base_url() ?>image/caps_logo.svg" class="img-fluid wow zoomIn">
                </div>
                <div class="col-md-6 m-auto">
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
                                    <tr>
                                        <td>
                                            <?php $date = date('Y-m-d', $nt['datetime']);
                                            echo longdate_indo($date);
                                            ?>
                                        </td>
                                        <td><?= date('H:i', $nt['datetime']); ?></td>
                                        <td><?= $nt['sPengerjaan'] ?> diproses oleh <?= $nt['name'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>