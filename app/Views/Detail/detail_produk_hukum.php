<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>DETAIL PRODUK HUKUM</h3>
    </div>
</div>
<div class="clearfix"></div>
<a href="/ProdukHukum/update/<?= md5($prohum['id_produk']) ?>" class="btn btn-success mb-4"><i class="fa fa-pencil">&ensp;<b> EDIT</b></i></a>
<a href="/ProdukHukum/delete/<?= md5($prohum['id_produk']) ?>" class="btn btn-danger mb-4 tombol-hapus"><i class="fa fa-trash">&ensp;<b> HAPUS</b></i></a>

<div class="row">
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DOKUMEN PRODUK HUKUM</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <iframe src="/upload/produk/<?= $prohum['file']; ?>" width="100%" height="750" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DETAIL PRODUK HUKUM</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
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
                            <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prohum['judul']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonJudul">
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
</div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Galleri</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= session()->getflashdata('message'); ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('upload'); ?>"></div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" id="tombolTambahMedia" class="btn rounded btn-primary shadow tombolTambahMedia" data-toggle="modal" title="Tambah Media" data-target="#modalMedia">
                            <i class="fa fa-plus"></i>&ensp;
                            Tambah Media
                        </button>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="row">
                            <?php if ($galeri != null) { ?>
                                <?php foreach ($galeri[0] as $row) { ?>
                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img style="width: 100%; display: block;" src="/upload/galeri/<?= $row['file']; ?>" alt="image" />
                                                <div class="mask no-caption">
                                                    <div class="tools tools-bottom">
                                                        <a href="/ProdukHukum/delete_media/<?= md5($row['id_galeri']); ?>" class="tombol-hapus"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Media -->
<div class="modal fade" id="modalMedia" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/ProdukHukum/<?= ($galeri != null) ? 'tambah_media' : 'save_media' ?>" method="POST" enctype="multipart/form-data" class="form-tambah-media">
                    <input type="hidden" id="id" name="id" value="<?= ($galeri != null) ? $galeri['id_upload'] : ''; ?>">
                    <input type="hidden" id="ket" name="ket" value="<?= $prohum['judul']; ?>">
                    <input type="hidden" id="id_produk" name="id_produk" value="<?= $prohum['id_produk']; ?>">
                    <input type="hidden" id="id_unit" name="id_unit" value="<?= $prohum['id_unit_produk']; ?>">
                    <div class="row form-group mt-3">
                        <label class="col-form-label col-md-2 col-sm-2">Media</label>
                        <div class="col-md col-sm">
                            <input type="file" multiple name="media[]" /> <br>
                            <font color="red"><?= $validation->getError('media'); ?></font>
                        </div>
                    </div>
                    <div class="row form-group mt-3">
                        <div class="input-group">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Media</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>