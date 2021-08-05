<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="col-md-12 col-sm-12 ">
    <div class="page-title">
        <div class="title_left">
            <h3>DATA JENIS PRODUK</h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DATA JENIS PRODUK</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" id="tombolTambahJenis" class="btn btn-primary tombolTambahJenis" data-toggle="modal" data-target="#modalJenis" style="float: right">
                            <i class="fa fa-plus"></i>
                            Tambah Jenis
                        </button>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <?= session()->getflashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('jenis'); ?>"></div>

                                <br><br><br>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Jenis Produk</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($jenis as $val) { ?>
                                        <tr>
                                            <td>
                                                <center><?= $i++; ?></center>
                                            </td>
                                            <td><?= $val['nama_jenis']; ?></td>
                                            <td>
                                                <center>
                                                    <button type="button" name="ubah" data-toggle="modal" data-target="#modalJenis" id="tombolUbahJenis" class="btn btn-success btn-sm tombolUbahJenis" data-id="<?= $val['id_jenis']; ?>"><i class="fa fa-pencil"></i></button>
                                                    <button href="/MasterData/delete_jenis/<?= md5($val['id_jenis']) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Jenis Produk -->
<div class="modal fade" id="modalJenis" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/MasterData/save_jenis" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Jenis<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="jenis" id="jenis" required="required" value="<?= old('nama'); ?>" />
                            <font color="red"><?= $validation->getError('jenis'); ?></font>
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
</div>

<script>
    //UPDATE JENIS
    $('.tombolUbahJenis').on('click', function() {
        $('#judulModal').html('Update Data Jenis Produk');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', '/MasterData/save_update_jenis');

        const id = $(this).data('id');

        $.ajax({
            url: '/MasterData/update_jenis',
            data: {
                id: id,
                table: 'tb_jenis_produk',
                primaryKey: 'id_jenis'
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id_jenis);
                $('#jenis').val(data.nama_jenis);
            }
        });
    });
</script>
<?= $this->endSection('content'); ?>