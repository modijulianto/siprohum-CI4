<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>DETAIL PRODUK HUKUM</h3>
    </div>
</div>
<div class="clearfix"></div>
<a href="/ProdukHukum/update/<?= md5($prohum['id_produk']) ?>" class="btn btn-success mb-4"><i class="fas fa-pencil">&ensp;<b> EDIT</b></i></a>
<a href="/ProdukHukum/delete/<?= md5($prohum['id_produk']) ?>" class="btn btn-danger mb-4 tombol-hapus"><i class="fas fa-trash">&ensp;<b> HAPUS</b></i></a>
<?php if ($prohum['validasi'] == 0) { ?>
    <button data-toggle="modal" title="Tambah Pesan" data-target="#modalPesan" class="btn btn-info mb-4"><i class="fas fa-comment">&ensp;<b> <?= ($akun['role_id'] == 3) ? 'TAMBAH PESAN' : 'LIHAT PESAN'; ?></b></i></button>
<?php } ?>

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
                                <div class="input-group-text" id="btnGroupAddonTahun"><i class="fas fa-calendar"></i></div>
                            </div>
                            <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prohum['tahun']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonTahun">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Judul</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonJudul"><i class="fas fa-bookmark"></i></div>
                            </div>
                            <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prohum['judul']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonJudul">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Tentang</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonTentang"><i class="fas fa-quote-right"></i></div>
                            </div>
                            <textarea name="" id="" class="form-control" style="background: rgba(233, 236, 239, 0.307);" aria-label="Input group example" rows="5" aria-describedby="btnGroupAddonTentang" readonly><?= $prohum['nama_tentang']; ?></textarea>
                        </div>
                        <hr>
                        <b>
                            <font size="3">Jenis</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonJenis"><i class="fas fa-quote-right"></i></div>
                            </div>
                            <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_jenis']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonJenis">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Kategori</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonKategori"><i class="fas fa-quote-right"></i></div>
                            </div>
                            <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_kategori']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonKategori">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Unit</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonUnit"><i class="fas fa-university"></i></div>
                            </div>
                            <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_unit']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonUnit">
                        </div>
                        <hr>
                        <b>
                            <font size="3">Dokumen</font>
                        </b>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddonDokumen"><i class="fas fa-file-alt"></i></div>
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
                        <?php if ($prohum['validasi'] == 0) { ?>
                            <button type="button" id="tombolTambahMedia" class="btn rounded btn-primary shadow tombolTambahMedia" data-toggle="modal" title="Tambah Media" data-target="#modalMedia">
                                <i class="fas fa-plus"></i>&ensp;
                                Tambah Media
                            </button>
                        <?php } ?>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="row">
                            <?php if ($galeri != null) { ?>
                                <div class="col-lg-12 col-md-12 mb-5">
                                    <div class="row">
                                        <!-- VIDEO -->
                                        <div class="col-12">
                                            <h4>VIDEO</h4>

                                        </div>
                                        <div class="col">
                                            <hr>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-sm btn-transparent button-collapse" type="button" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="false" aria-controls="collapseVideo">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <div class="collapse" id="collapseVideo">
                                                <div class="row">
                                                    <?php foreach ($galeri[0] as $row) { ?>
                                                        <?php if ($row['jenis'] == "video") { ?>
                                                            <div class="col-md-4 mb-4">
                                                                <div class="row">
                                                                    <div class="col-12 text-center"><iframe src="<?= $row['file']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                                                                    <div class="col-12 text-center"><a href="/ProdukHukum/delete_media/<?= md5($row['id_galeri']); ?>" class="btn btn-sm btn-danger tombol-hapus" style="width: 100%;"><i class="fas fa-trash"></i></a></div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END VIDEO -->
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <!-- GAMBAR -->
                                        <div class="col-12">
                                            <h4>GAMBAR</h4>

                                        </div>
                                        <div class="col">
                                            <hr>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-sm btn-transparent button-collapse" type="button" data-toggle="collapse" data-target="#collapseGambar" aria-expanded="false" aria-controls="collapseGambar">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <div class="collapse" id="collapseGambar">
                                                <div class="row">
                                                    <?php foreach ($galeri[0] as $row) { ?>
                                                        <?php if ($row['jenis'] == "gambar") { ?>
                                                            <div class="col-md-55">
                                                                <div class="thumbnail">
                                                                    <div class="image view view-first">
                                                                        <img style="width: 100%; display: block;" src="/upload/galeri/<?= $row['file']; ?>" alt="image" />
                                                                        <div class="mask no-caption">
                                                                            <div class="tools tools-bottom">
                                                                                <a href="/ProdukHukum/delete_media/<?= md5($row['id_galeri']); ?>" class="tombol-hapus"><i class="fas fa-trash"></i></a>
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
                                        <!-- END GAMBAR -->
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($prohum['validasi'] == 0) { ?>
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
                    <div class="alert alert-primary mb-3" role="alert">
                        <div class="row">
                            <div class="col-1 text-center align-middle"><i class="fas fa-info" style="font-size: 35px;"></i></div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-12">Silahkan upload foto berformat <i>.jpg, .jpeg, .gif, .png</i></div>
                                    <div class="col-12">Silahkan upload link video yang berasal dari YouTube</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <form action="/ProdukHukum/<?= ($galeri != null) ? 'tambah_media' : 'save_media' ?>" method="POST" enctype="multipart/form-data" class="form-tambah-media">
                        <input type="hidden" id="id" name="id" value="<?= ($galeri != null) ? $galeri['id_upload'] : ''; ?>">
                        <input type="hidden" id="ket" name="ket" value="<?= $prohum['judul']; ?>">
                        <input type="hidden" id="id_produk" name="id_produk" value="<?= $prohum['id_produk']; ?>">
                        <input type="hidden" id="id_unit" name="id_unit" value="<?= $prohum['id_unit_produk']; ?>">
                        <div class="row form-group mt-3">
                            <label class="col-form-label col-md-2 col-sm-2">Foto</label>
                            <div class="col-md col-sm">
                                <input type="file" multiple name="media[]" /> <br>
                                <font color="red"><?= $validation->getError('media'); ?></font>
                            </div>
                        </div>
                        <div class="row form-group mt-3 fieldGroup">
                            <label class="col-form-label col-md-2 col-sm-2">Link Video</label>
                            <div class="input-group col-md-10 col-sm-10">
                                <input type="text" name="video[]" autocomplete="off" class="form-control" placeholder="Masukkan link video" />
                                <a href="javascript:void(0)" class="btn btn-success addMore ml-1"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Media</button>
                        </div>
                    </form>
                    <div class="row form-group fieldGroupCopy mt-3" style="display: none;">
                        <label class="col-form-label col-md-2 col-sm-2"></label>
                        <div class="input-group col-md-10 col-sm-10">
                            <input type="text" name="video[]" autocomplete="off" class="form-control" placeholder="Masukkan link video" />
                            <a href="javascript:void(0)" class="btn btn-danger remove ml-1"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Tambah Pesan -->
<div class="modal fade" id="modalPesan" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($akun['role_id'] == 3) { ?>
                    <div class="alert alert-primary mb-3" role="alert">
                        <div class="row">
                            <div class="col-1"><i class="fas fa-info"></i> &emsp;</div>
                            <div class="col">Kirim pesan kepada Operator jika ada kesalahan dalam penulisan atau data produk hukum tidak valid.</div>
                        </div>
                    </div>
                    <hr>
                    <div class="alert-pesan"></div>
                    <div class="row form-group mt-3">
                        <label class="col-form-label col-md-2 col-sm-2">Pesan</label>
                        <div class="col-md col-sm">
                            <textarea name="pesan" id="pesan" cols="30" rows="5" class="form-control"><?= $prohum['pesan']; ?></textarea>
                        </div>
                    </div>
                <?php } elseif ($akun['role_id'] == 2) { ?>
                    <h6>Pesan dari validator :</h6>
                    <textarea name="pesan" id="pesan" cols="30" readonly rows="5" class="form-control"><?= $prohum['pesan']; ?></textarea>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if ($akun['role_id'] == 3) { ?>
                    <button type="button" class="btn btn-primary tombol-pesan" data-id="<?= $prohum['id_produk']; ?>">Tambah Pesan</button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // membatasi jumlah inputan
        var maxGroup = 5;

        //melakukan proses multiple input 
        $(".addMore").click(function() {
            if ($('body').find('.fieldGroup').length < maxGroup) {
                var fieldHTML = '<div class="fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            } else {
                alert('Maximum ' + maxGroup + ' groups are allowed.');
            }
        });

        //remove fields group
        $("body").on("click", ".remove", function() {
            $(this).parents(".fieldGroup").remove();
        });

        $('.tombol-pesan').on('click', function() {
            const id = $(this).data('id');
            var pesan = $('#pesan').val();

            $.ajax({
                url: '/ProdukHukum/tambah_pesan',
                data: {
                    id: id,
                    pesan: pesan
                },
                dataType: 'json',
                method: 'post',
                beforeSend: function() {
                    $('.tombol-pesan').html('<i class="fas fa-spin fa-spinner"></i>')
                    $('.tombol-pesan').attr("disabled");
                },
                success: function(data) {
                    if (data.msg == 'sukses') {
                        $('.alert-pesan').html('<div class="alert alert-success mb-3" role="alert">Pesan berhasil dikirim</div>');
                    } else {
                        $('.alert-pesan').html('<div class="alert alert-danger mb-3" role="alert">Pesan gagal dikirim</div>');
                    }
                },
                complete: function() {
                    $('.tombol-pesan').removeAttr("disabled");
                    $('.tombol-pesan').html('Tambah Pesan')
                },
            });
        });
    });
</script>
<?= $this->endSection('content'); ?>