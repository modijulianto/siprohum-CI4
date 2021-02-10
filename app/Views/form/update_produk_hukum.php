<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>INPUT DATA PRODUK HUKUM</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>INPUT DATA PRODUK HUKUM</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/ProdukHukum/save_update/<?= md5($prohum['id_produk']) ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id" value="<?= $prohum['id_produk']; ?>">
                            <input type="hidden" id="id_unit" name="id_unit" value="<?= $prohum['id_unit_produk']; ?>">
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Nomor<font color="red">*</font></label>
                                <div class="col-md col-sm">
                                    <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Masukkan nomor produk hukum" required="required" value="<?= $prohum['no']; ?>" />
                                    <div class="text-danger">
                                        <?= $validation->getError('nomor'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Tahun<font color="red">*</font></label>
                                <div class="col-md col-sm">
                                    <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Masukkan tahun produk hukum" required="required" value="<?= $prohum['tahun']; ?>" />
                                    <div class="text-danger">
                                        <?= $validation->getError('tahun'); ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Judul<font color="red">*</font></label>
                                <div class="col-md col-sm">
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul produk hukum" required="required" value="<?= $prohum['judul']; ?>" />
                                    <div class="text-danger">
                                        <?= $validation->getError('judul'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Tentang<font color="red">*</font></label>
                                <div class="col-md-8 col-sm-8">
                                    <select class="form-control" name="tentang" id="tentang"></select>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modalTentangBaru"><i class="fa fa-plus"></i> Tentang Baru</button>
                                </div>
                            </div>
                            <input type="hidden" name="old_tentang" id="old_tentang" value="<?= $prohum['id_tentang']; ?>">
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2"></label>
                                <div class="col-md col-sm">
                                    <textarea class="form-control" name="view-tentang" id="view-tentang" cols="30" style="width:100%" rows="5" readonly><?= $prohum['nama_tentang']; ?></textarea>
                                </div>
                            </div><br><br>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2">Kategori</label>
                                <div class="col-md col-sm ">
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <?php foreach ($kat as $val) { ?>
                                            <option <?= ($prohum['id_kategori'] == $val['id_kategori']) ? 'selected' : ''; ?> value="<?= ($val['id_kategori']); ?>"><?= $val['nama_kategori']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Keterangan<font color="red">*</font></label>
                                <div class="col-md col-sm">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan produk hukum" required="required" value="<?= (isset($prohum['keterangan'])) ? $prohum['keterangan'] : set_value('keterangan'); ?>" />
                                    <div class="text-danger">
                                        <?= $validation->getError('keterangan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2">Status</label>
                                <div class="col-md col-sm ">
                                    <input type="radio" class="flat" <?= ($prohum['status'] == 'Berlaku') ? 'checked' : ''; ?> name="status" value="Berlaku"> Berlaku <br>
                                    <input type="radio" class="flat" <?= ($prohum['status'] == 'Tidak Berlaku') ? 'checked' : ''; ?> name="status" value="Tidak Berlaku"> Tidak Berlaku
                                </div>
                            </div>
                            <div class="custom-file">
                                <div class="row form-group">
                                    <label class="col-form-label col-md-2 col-sm-2">File</label>
                                    <div class="col-md col-sm">
                                        <input type="file" id="produk" name="produk" onchange="previewFile()" class="custom-file-input">
                                        <label for="produk" class="custom-file-label"><?= $prohum['file']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="old_produk" id="old_produk" value="<?= $prohum['file']; ?>">
                            <br><br>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2"></label>
                                <div class="col-md col-sm ">
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <center>
                    <h2 class="label-filePdf">~ PDF VIEWER ~</h2><br>
                    <embed type="application/pdf" src="/upload/produk/<?= $prohum['file']; ?>" width="800" height="500" class="file-preview"></embed>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- Large Modal Tentang -->
<div class="modal fade bs-example-modal-lg modalTentangBaru" id="modalTentangBaru" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Input Data</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/ProdukHukum/save_tentang_baru" id="form-tentangBaru" method="POST" class="form-tentang form-tentangBaru">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Tentang<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <textarea name="tentangBaru" id="tentangBaru" placeholder="Masukkan Tentang" style="width: 100%;" rows="5"></textarea>
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