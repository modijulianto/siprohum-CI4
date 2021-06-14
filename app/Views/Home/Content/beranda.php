<?= $this->extend('Home/Layout/layout'); ?>

<?= $this->section('content'); ?>
<div class="row bg-white rounded-lg shadow">
    <div class="col-md-8">
        <?= $this->include('Home/Components/carousel') ?>
    </div>
    <div class="col-md-4 text-dark">
        <?= $this->include('Home/Components/cari') ?>
    </div>
</div>

<div class="row mt-5 mb-4">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 text-secondary">
                <p class="pl-3"><i class="fa fa-book"></i>&ensp; PRODUK HUKUM TERBARU</p>
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
                <?= $this->include('Home/Components/list_unit'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>