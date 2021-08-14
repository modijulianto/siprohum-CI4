<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>TAMBAH DATA PRODUK HUKUM</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>TAMBAH DATA PRODUK HUKUM</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/ProdukHukum/save" method="POST" enctype="multipart/form-data">
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Nomor<font color="red">*</font></label>
                                <div class="col-md col-sm">
                                    <input type="text" class="form-control" autocomplete="off" name="nomor" id="nomor" placeholder="Masukkan nomor produk hukum" required value="<?= old('nomor'); ?>" />
                                    <div class="text-danger">
                                        <?= $validation->getError('nomor'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Tahun<font color="red">*</font></label>
                                <div class="col-md col-sm">
                                    <input type="number" class="form-control" autocomplete="off" name="tahun" id="tahun" placeholder="Masukkan tahun produk hukum" required value="<?= old('tahun'); ?>" />
                                    <div class="text-danger">
                                        <?= $validation->getError('tahun'); ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Judul<font color="red">*</font></label>
                                <div class="col-md col-sm">
                                    <textarea name="judul" id="judul" class="form-control" placeholder="Masukkan judul produk hukum" rows="5" required><?= old('judul'); ?></textarea>
                                    <div class="text-danger">
                                        <?= $validation->getError('judul'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-form-label col-2">Tentang<font color="red">*</font></label>
                                <div class="col-8">
                                    <select class="form-control" name="tentang" id="tentang" required></select>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modalTentangBaru"><i class="fas fa-plus"></i> Tentang Baru</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2">Kategori</label>
                                <div class="col-md col-sm ">
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <?php foreach ($kat as $val) { ?>
                                            <option value="<?= $val['id_kategori']; ?>"><?= $val['nama_kategori']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Keterangan</label>
                                <div class="col-md col-sm">
                                    <input type="text" class="form-control" autocomplete="off" name="keterangan" id="keterangan" placeholder="Masukkan keterangan produk hukum" required value="<?= old('keterangan'); ?>" />
                                </div>
                            </div>

                            <div class="custom-file">
                                <div class="row form-group">
                                    <label class="col-form-label col-md-2 col-sm-2">File</label>
                                    <div class="col-md col-sm">
                                        <input type="file" id="produk" name="produk" onchange="previewFile()" class="custom-file-input">
                                        <label for="produk" class="custom-file-label">Pilih file...</label>
                                        <div class="text-danger">
                                            <?= $validation->getError('produk'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2"></label>
                                <div class="col-md col-sm ">
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <center>
                            <h2 class="label-filePdf" hidden>~ PDF VIEWER ~</h2><br>
                            <embed type="application/pdf" hidden src="" width="100%" height="500" class="file-preview"></embed>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Large Modal Tentang -->
<div class="modal fade bs-example-modal-lg modalTentangBaru" id="modalTentangBaru" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Tambah Tentang Baru</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/ProdukHukum/save_tentang_baru" id="form-tentangBaru" method="POST" class="form-tentang form-tentangBaru">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Tentang<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <textarea name="tentangBaru" id="tentangBaru" placeholder="Masukkan Tentang" style="width: 100%;" rows="5"><?= old('tentangBaru'); ?></textarea>
                            <div class="invalid-feedback errorTentang">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnSimpan" id="btnSimpan">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>