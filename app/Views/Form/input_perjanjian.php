<?= $this->extend('Layouts/admin'); ?>
<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>TAMBAH DATA PERJANJIAN</h3>
    </div>
</div>
<div class="clearfix"></div>
<?= session()->getFlashdata('message'); ?>
<form action="/ProdukHukum/save_perjanjian" method="post" enctype="multipart/form-data">
    <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> SIMPAN</button>
    <div class="row">
        <div class="col-md-7 col-sm-7 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>TAMBAH DATA PERJANJIAN</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php $validation->getErrors(); ?>
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
                            <div class="row form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Keterangan</label>
                                <div class="col-md col-sm">
                                    <input type="text" class="form-control" autocomplete="off" name="keterangan" id="keterangan" placeholder="Masukkan keterangan produk hukum" value="<?= old('keterangan'); ?>" />
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
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-5 col-sm-5 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>PIHAK-PIHAK YANG BERSANGKUTAN</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target=".modalPihak"><i class="fas fa-plus"></i> Tambah Pihak</button>
                        </div>
                        <div class="col-sm-12 pihaks">
                            <div class="pihak-pihak"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>PDF VIEWER</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <!-- <h2 class="label-filePdf" hidden>~ PDF VIEWER ~</h2><br> -->
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

<!-- Large Modal Pihak -->
<div class="modal fade bs-example-modal-lg modalPihak" id="modalPihak" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Tambah Pihak Baru</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <label class="col-form-label col-md-2 col-sm-2">Nama<font color="red">*</font></label>
                    <div class="col-md col-sm">
                        <input name="penandatangan" class="form-control" id="penandatangan" required placeholder="Masukkan nama penandatangan">
                        <div class="validasiPenandatangan text-danger"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-md-2 col-sm-2">Lembaga<font color="red">*</font></label>
                    <div class="col-md col-sm">
                        <input name="lembaga" class="form-control" id="lembaga" required placeholder="e.g. Undiksha">
                        <div class="validasiLembaga text-danger"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-md-2 col-sm-2">Bagian</label>
                    <div class="col-md col-sm">
                        <input name="bagian" class="form-control" id="bagian" placeholder="e.g. Fakultas Teknik dan Kejuruan">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-md-2 col-sm-2">Jabatan</label>
                    <div class="col-md col-sm">
                        <input name="jabatan_penandatangan" class="form-control" id="jabatan_penandatangan" placeholder="e.g. Rektor">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-form-label col-md-2 col-sm-2">Alamat</label>
                    <div class="col-md col-sm">
                        <input name="alamat" class="form-control" id="alamat" placeholder="Masukan alamat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnSimpanPihak" id="btnSimpanPihak">Tambah Pihak</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.btnSimpanPihak').click(function() {
            var penandatangan = $('#penandatangan').val();
            var lembaga = $('#lembaga').val();
            var bagian = $('#bagian').val();
            var jabatan_penandatangan = $('#jabatan_penandatangan').val();
            var alamat = $('#alamat').val();
            $.ajax({
                url: "/Pihak/tambah",
                data: {
                    penandatangan: penandatangan,
                    lembaga: lembaga,
                    bagian: bagian,
                    jabatan_penandatangan: jabatan_penandatangan,
                    alamat: alamat,
                },
                method: "POST",
                dataType: 'json',
                beforeSend: function() {
                    $('.btnSimpanPihak').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                success: function(response) {
                    if (response.gagal != null) {
                        if (response.penandatangan != null) {
                            $('.validasiPenandatangan').html(response.penandatangan)
                        }
                        if (response.lembaga != null) {
                            $('.validasiLembaga').html(response.lembaga)
                        }
                        // console.log(response);
                        // console.log("gagal boss");
                    } else {
                        $('.validasiPenandatangan').html("")
                        $('.validasiLembaga').html("")
                        $('#modalPihak').modal('hide');
                        $('#penandatangan').val("");
                        $('#lembaga').val("");
                        $('#bagian').val("");
                        $('#jabatan_penandatangan').val("");
                        $('#alamat').val("");
                    }
                    $('.pihak-pihak').html(response);
                    $('.btnSimpanPihak').html('Tambah Pihak');
                },
            });
        });

        $('.pihak-pihak').load("/Pihak/load_pihak");
    });
</script>
<?= $this->endSection(); ?>