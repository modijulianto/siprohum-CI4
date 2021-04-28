<?= $this->extend('home/layout'); ?>

<?= $this->section('content'); ?>
<div class="row bg-white rounded-lg shadow">
    <div class="col-md-8">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div id="carouselExampleIndicators" class="carousel slide mt-3 mb-3" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/FTK.jpg" class="d-block w-100 rounded-lg" alt="..." style="background-size: cover; max-height:453px;">
                </div>
                <div class="carousel-item">
                    <img src="/images/FTK.jpg" class="d-block w-100 rounded-lg" alt="..." style="background-size: cover; max-height: 453px;">
                </div>
                <div class="carousel-item">
                    <img src="/images/FTK.jpg" class="d-block w-100 rounded-lg" alt="..." style="background-size: cover; max-height: 453px;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-md-4 text-dark">
        <?= $this->include('home/cari') ?>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 text-secondary">
                <p class="pl-3"><i class="fa fa-book"></i>&ensp; PRODUK HUKUM TERBARU <a href="" class="float-right">Lihat semua</a></p>
                <hr style="background-color: #288ACB; border-color: #288ACB; border-width: 2px;">
            </div>
            <div class="col-md-12">
                <?php foreach ($baru as $row) { ?>
                    <div class="card prohum mb-3">
                        <div class="media position-relative">
                            <i class="fa fa-book text-center align-middle" style="max-width: 200px; font-size: 50px; padding: 30px 20px 20px 20px;"></i>
                            <div class="media-body pt-2">
                                <b><?= $row['judul']; ?> Nomor <?= $row['no']; ?> Tahun <?= $row['tahun']; ?></b>
                                <div class="text-secondary">
                                    <font size="2">
                                        <?= (str_word_count($row['nama_tentang'])) > 10 ? substr($row['nama_tentang'], 0, 100) . " [..]" : $row['nama_tentang']; ?>
                                    </font>
                                </div>
                                <div class="text-left text-secondary">
                                    Unit : <div class="badge badge-secondary"><?= $row['nama_unit']; ?></div>
                                </div>
                                <a href="/Jdih/produk/<?= md5($row['id_produk']); ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12 text-secondary">
                <p class="pl-3"><i class="fa fa-institution"></i>&ensp; UNIT</p>
                <hr style="background-color: #288ACB; border-color: #288ACB; border-width: 2px;">
            </div>
            <div class="col-md-12">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($unit as $row) { ?>
                            <li class="unit list-group-item">
                                <span class="span-unit"></span>
                                <div class="row">
                                    <div class="col-md-1">
                                        <center>
                                            <i class="fa fa-institution"></i>
                                        </center>
                                    </div>
                                    <div class="col-md-9">
                                        <?= $row['nama_unit']; ?>
                                    </div>
                                    <div class="col-md-2">
                                        <center>
                                            <span class="badge badge-info float-right">2</span>
                                        </center>
                                    </div>
                                </div>
                                <a href="/Jdih/unit/<?= md5($row['id_unit']); ?>" class="stretched-link"></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br>
<?= $this->endSection(); ?>