<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>DATA OPERATOR</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DATA OPERATOR</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= base_url("Export/excel_operator") ?>" class="btn btn-primary" style="float: left">
                            <i class="fas fa-download"></i>
                            Excel
                        </a>
                        <a href="<?= base_url("Export/pdf_operator") ?>" class="btn btn-primary" style="float: left">
                            <i class="fas fa-download"></i>
                            PDF
                        </a>
                        <button type="button" id="tombolTambahOperator" class="btn btn-primary tombolTambahOperator" data-toggle="modal" data-target="#modalOperator" style="float: right">
                            <i class="fas fa-plus"></i>
                            Tambah Operator
                        </button>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <?= session()->getFlashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('operator'); ?>"></div>
                                <?php if (session()->getFlashdata('operator')) : ?>
                                <?php endif; ?>
                                <br><br><br>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Operator</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Aktif</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($opr as $val) { ?>
                                        <tr>
                                            <td>
                                                <center><?= $i++; ?></center>
                                            </td>
                                            <td><?= $val['name']; ?></td>
                                            <td><?= $val['email']; ?></td>
                                            <td class="text-center">
                                                <figure img src="upload/<?= $val['image'] ?>" class="gal"><img src="upload/<?= $val['image'] ?>" alt="" width="50px"></figure>
                                            </td>
                                            <td><?= $val['nama_unit']; ?></td>
                                            <td>
                                                <center><input type="checkbox" class="js-switch activate" data-id="<?= $val['id']; ?>" <?= ($val['is_active'] == 1) ? 'checked' : ''; ?> /></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <button type="button" name="ubah" data-toggle="modal" data-target="#modalOperator" id="tombolUbahOperator" class="btn btn-success btn-sm tombolUbahOperator" data-id="<?= $val['id']; ?>"><i class="fas fa-edit"></i></button>
                                                    <a href="/Operator/delete/<?= md5($val['id']) ?>"><button href="/Operator/delete/<?= md5($val['id']) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></button></a>
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
<div class="modal fade" id="modalOperator" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Operator" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Name<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="nama" id="nama" required="required" value="<?= old('nama'); ?>" />
                            <font color="red"><?= $validation->getError('nama'); ?></font>

                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Image</label>
                        <div class="col-md col-sm">
                            <input type="file" name="operator" /> <br>
                            <font color="red"><?= $validation->getError('operator'); ?></font>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="old_image" id="old_image">
                    <div class="row form-group">
                        <label id="labelEmailOperator" class="col-form-label col-md-2 col-sm-2">Email<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="email" class="form-control" name="email" id="emailOperator" required="required" value="<?= old('email'); ?>" />
                            <font color="red"><?= $validation->getError('email'); ?></font>

                        </div>
                    </div>
                    <input type="hidden" name="old_pass" id="old_pass">
                    <div class="row form-group">
                        <label id="labelPasswordOperator" class="col-form-label col-md-2 col-sm-2">Password<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input class="form-control" type="password" name="password" id="passwordOperator" data-validate-length="6,8" />
                            <font color="red"><?= $validation->getError('password'); ?></font>

                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="labelRetypePasswordOperator" class="col-form-label col-md-2 col-sm-2">Retype Password<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input class="form-control" type="password" name="retypePassword" id="retypePasswordOperator" data-validate-length="6,8" />
                            <font color="red"><?= $validation->getError('retypePassword'); ?></font>

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
    //UPDATE OPERATOR
    $('.tombolUbahOperator').on('click', function() {
        $('#judulModal').html('Update Data Operator');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', '/Operator/save_update');


        // hide form input
        $('#labelPasswordOperator').hide();
        $('#passwordOperator').hide();
        $('#labelRetypePasswordOperator').hide();
        $('#retypePasswordOperator').hide();
        $('#labelEmailOperator').hide();
        $('#emailOperator').hide();

        const id = $(this).data('id');

        $.ajax({
            url: '/Operator/update_operator',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#nama').val(data.name);
                $('#id_unit').val(data.id_unit);
                $('#emailOperator').val(data.email);
                $('#old_image').val(data.image);
                $('#old_pass').val(data.password);
                $('#passwordOperator').val(data.password);
            }
        });
    });

    $('.activate').on('change', function() {
        // alert($(this).data('id'));
        // $('#activate').attr('disabled');

        const id = $(this).data('id');

        $.ajax({
            url: '/Operator/activate',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            beforeSend: function() {
                $($(this).data('id')).attr('disabled');
            },
            success: function(response) {
                $($(this).data('id')).removeAttr('disabled');
                if (response.aktif) {
                    new PNotify({
                        title: "Diaktifkan",
                        text: "Akun operator berhasil diaktifkan",
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                } else {
                    new PNotify({
                        title: "Dinonaktifkan",
                        text: "Akun operator berhasil dinonaktifkan",
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                }
            }
        });
    });
</script>
<?= $this->endSection('content'); ?>