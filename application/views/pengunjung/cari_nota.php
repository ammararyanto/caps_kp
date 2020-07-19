<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Tracking Nota</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= base_url() ?>">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Tracking</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                    <img src="<?= base_url() ?>image/assets/caps.jpg" alt="candra apple solution" title="candra apple solution">
                </div>
            </div>
            <div class="col-md-9 col-sm-6">
                <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                    <h2>Tracking Nota Servis</h2>
                    <form action="cari_nota" method="post" class="searchform" style="width:50%;" role="search">
                        <div class="input-group">
                            <input name="cari_nota" type="text" class="form-control" placeholder="Tracking Nota Anda">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"> <i class="ion-search"></i> </button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                </div>
            </div>


        </div>
        <div class="row block">
            <?php $no = 0; ?>
            <?php foreach ($detail as $nt) {
                $no = $no + 1;
            }  ?>

            <?php if ($no == 0) : ?>
                <div class="col-md-8">
                    <h2>Tidak Ada Data</h2>
                </div>
            <?php else : ?>
                <div class="col-md-8">
                    <h2>Nama : <?= $transaksi['nama_pelanggan'] ?></h2>
                    <table class="table table-responsive" style="width:100%;">
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
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>