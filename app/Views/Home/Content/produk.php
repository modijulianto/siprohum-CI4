<?= $this->extend('/Home/Layout/layout'); ?>
<?= $this->section('content'); ?>
<div class="row bg-white rounded-lg shadow">
    <div class="col-md-8">
        <?= $this->include('Home/Components/carousel') ?>
    </div>
    <div class="col-md-4 text-dark">
        <?= $this->include('Home/Components/cari') ?>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6 mt-5">
        <div class="row">
            <div class="col-md-12 text-secondary">
                <p class="pl-3"><i class="fa fa-book"></i>&ensp;<b> DOKUMEN PRODUK HUKUM </b></p>
                <hr style="background-color: #288ACB; border-color: #288ACB; border-width: 2px;">
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <iframe src="/upload/produk/<?= $prohum['file']; ?>" width="100%" height="750" frameborder="0"></iframe>
                    </div>
                </div>
                <?php if ($prohum == null) { ?>
                    <div class="card mb-3 bg-transparent">
                        <div class="media position-relative">
                            <i class="fa fa-times text-center align-middle text-secondary" style="max-width: 200px; font-size: 50px; padding: 20px 20px 20px 20px;"></i>
                            <div class="media-body pt-2">
                                <div class="text-secondary mt-4">
                                    <font size="5">
                                        Produk Hukum Tidak Ditemukan
                                    </font>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <div class="row mb-5">
            <div class="col-md-12 text-secondary">
                <p class="pl-3"><i class="fa fa-book"></i>&ensp;<b> DETAIL PRODUK HUKUM </b></p>
                <hr style="background-color: #288ACB; border-color: #288ACB; border-width: 2px;">
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <b>
                            <font size="3">Nomor</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonNo">#</div>
                            </div>
                            <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prohum['no']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonNo">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Tahun</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonTahun"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prohum['tahun']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonTahun">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Judul</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonJudul"><i class="fa fa-bookmark"></i></div>
                            </div>
                            <textarea name="" id="" class="form-control" style="background: rgba(233, 236, 239, 0.307);" aria-label="Input group example" rows="2" aria-describedby="btnGroupAddonTentang" readonly><?= $prohum['judul']; ?></textarea>
                        </div>
                        <hr>
                        <b>
                            <font size="3">Tentang</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonTentang"><i class="fa fa-quote-right"></i></div>
                            </div>
                            <textarea name="" id="" class="form-control" style="background: rgba(233, 236, 239, 0.307);" aria-label="Input group example" rows="5" aria-describedby="btnGroupAddonTentang" readonly><?= $prohum['nama_tentang']; ?></textarea>
                        </div>
                        <hr>
                        <b>
                            <font size="3">Jenis</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonJenis"><i class="fa fa-quote-right"></i></div>
                            </div>
                            <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_jenis']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonJenis">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Kategori</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonKategori"><i class="fa fa-quote-right"></i></div>
                            </div>
                            <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_kategori']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonKategori">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Unit</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonUnit"><i class="fa fa-bank"></i></div>
                            </div>
                            <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_unit']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonUnit">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Dokumen</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonDokumen"><i class="fa fa-file-pdf-o"></i></div>
                            </div>
                            <a href="/upload/produk/<?= $prohum['file']; ?>" download="<?= $prohum['file']; ?>" class="form-control" style="background: rgba(233, 236, 239, 0.307);">
                                <font size="3" color="black">Download</font>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-md-12 text-secondary">
                <p class="pl-3"><i class="fa fa-book"></i>&ensp;<b> GALERI </b></p>
                <hr style="background-color: #288ACB; border-color: #288ACB; border-width: 2px;">
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <?php if (isset($galeri[0]) != '') { ?>
                                    <div class="row">
                                        <?php foreach ($galeri[0] as $vid) { ?>
                                            <div class="col-md-4 mb-4">
                                                <iframe style="width: max-content;" src="<?= $vid['file']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <?php if (isset($galeri[1]) != '') { ?>
                                    <div class="card-columns">
                                        <?php foreach ($galeri[1] as $gal) { ?>
                                            <div class="card">
                                                <a href="/upload/galeri/<?= $gal['file']; ?>" data-lightbox="roadtrip" alt="..."><img src="/upload/galeri/<?= $gal['file']; ?>" data-lightbox="roadtrip" class="img-thumbnail" alt="..."></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>