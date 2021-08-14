<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>DATA UNIT</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DATA UNIT</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" id="tombolTambahUnit" class="btn btn-primary tombolTambahUnit" data-toggle="modal" data-target="#modalUnit" style="float: right">
                            <i class="fas fa-plus"></i>
                            Tambah Unit
                        </button>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <?= session()->getFlashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('unit'); ?>"></div>
                                <?php if (session()->getFlashdata('unit')) : ?>
                                <?php endif; ?>
                                <br><br><br>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Unit</th>
                                        <th class="text-center">Singkat</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($unit as $val) { ?>
                                        <tr>
                                            <td>
                                                <center><?= $i++; ?></center>
                                            </td>
                                            <td><?= $val['nama_unit']; ?></td>
                                            <td><?= $val['nama_singkat']; ?></td>
                                            <td>
                                                <center>
                                                    <button type="button" name="ubah" data-toggle="modal" data-target="#modalUnit" id="tombolUbahUnit" class="btn btn-success btn-sm tombolUbahUnit" data-id="<?= $val['id_unit']; ?>"><i class="fas fa-edit"></i></button>
                                                    <button href="/Unit/delete/<?= md5($val['id_unit']) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></button>
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


<!-- Modal -->
<div class="modal fade" id="modalUnit" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Unit" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Unit<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="unit" id="unit" placeholder="Masukkan nama unit" required="required" value="<?= old('unit'); ?>" />
                            <font color="red"><?= $validation->getError('unit'); ?></font>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Singkatan Unit<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="singkatan" id="singkatan" placeholder="Masukkan nama singkatan" required="required" value="<?= old('singkatan'); ?>" />
                            <font color="red"><?= $validation->getError('singkatan'); ?></font>
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
    //UPDATE UNIT
    $('.tombolUbahUnit').on('click', function() {
        $('#judulModal').html('Update Data Unit');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', '/Unit/save_update');

        const id = $(this).data('id');

        $.ajax({
            url: '/Unit/update_unit',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id_unit);
                $('#unit').val(data.nama_unit);
                $('#singkatan').val(data.nama_singkat);
            }
        });
    });
</script>
<?= $this->endSection('content'); ?>