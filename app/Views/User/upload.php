<?= $this->extend('Layouts/admin'); ?>
<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3> Galleri </h3>
    </div>
</div>

<div class="clearfix"></div>

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
                    <!-- <div class="col-12">
                        <button type="button" id="tombolTambahGaleri" class="btn btn-primary tombolTambahGaleri" data-toggle="modal" data-target="#modalGaleri" style="float: right">
                            <i class="fas fa-plus"></i>
                            Tambah Galeri
                        </button>
                    </div> -->
                    <div class="col-12 mt-4">
                        <?php foreach ($galeri as $row) { ?>
                            <div class="row">
                                <div class="col-12">
                                    <h4><?= $row['ket']; ?> &emsp;
                                        <button type="button" id="tombolTambahMedia" data-id="<?= $row['id_upload']; ?>" class="btn btn-sm rounded btn-transparent border-primary shadow tombolTambahMedia" data-toggle="modal" title="Tambah Media" data-target="#modalMedia">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                        <button href="/Upload/delete/<?= $row['id_upload'] ?>" type="button" class="btn btn-transparent border-danger btn-sm shadow tombol-hapus" title="Hapus Galeri"><i class="fas fa-trash"></i></button>
                                    </h4>

                                </div>
                                <div class="col">
                                    <hr>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-sm btn-transparent button-collapse" type="button" data-toggle="collapse" data-target="#collapse<?= $row['id_upload']; ?>" aria-expanded="false" aria-controls="collapse<?= $row['id_upload']; ?>">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <div class="collapse" id="collapse<?= $row['id_upload']; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if ($row[0] != '') { ?>
                                                    <div class="row">
                                                        <?php foreach ($row[0] as $vid) { ?>
                                                            <div class="col-md-4 mb-4">
                                                                <div class="row">
                                                                    <div class="col-12 text-center"><iframe src="<?= $vid['file']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                                                                    <div class="col-12 text-center"><a href="/Upload/single_delete/<?= md5($vid['id_galeri']); ?>" class="btn btn-sm btn-danger tombol-hapus" style="width: 100%;"><i class="fas fa-trash"></i></a></div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-12">
                                                <?php if ($row[1] != '') { ?>
                                                    <div class="row">
                                                        <?php foreach ($row[1] as $gal) { ?>
                                                            <div class="col-md-55">
                                                                <div class="thumbnail">
                                                                    <div class="image view view-first">
                                                                        <img style="width: 100%; display: block;" src="/upload/galeri/<?= $gal['file']; ?>" alt="image" />
                                                                        <div class="mask no-caption">
                                                                            <div class="tools tools-bottom">
                                                                                <a href="/Upload/single_delete/<?= md5($gal['id_galeri']); ?>" class="tombol-hapus"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Galeri -->
<!-- <div class="modal fade" id="modalGaleri" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Galeri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Upload/save" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Keterangan<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="keterangan" id="keterangan" required="required" value="<?= old('keterangan'); ?>" />
                            <font color="red"><?= $validation->getError('keterangan'); ?></font>

                        </div>
                    </div>
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
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

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
                <form action="/Upload/tambah_media" method="POST" enctype="multipart/form-data" class="form-tambah-media">
                    <input type="hidden" id="id" name="id">
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

<script>
    // $('.button-collapse').click(function() {
    //     if ($(this).val() == "0") {
    //         $(this).val("1")
    //         $(this).html('<i class="fas fa-chevron-up"></i>');
    //     } else {
    //         $(this).val("0")
    //         $(this).html('<i class="fas fa-chevron-down"></i>');
    //     }
    // });
    $('.tombolTambahMedia').click(function() {
        const id = $(this).data('id');
        $('.form-tambah-media').attr('action', '/Upload/tambah_media/' + id);
    });
</script>
<?= $this->endSection(); ?>