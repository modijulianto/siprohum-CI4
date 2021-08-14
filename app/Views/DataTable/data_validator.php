<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3>DATA VALIDATOR</h3>
    </div>
</div>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DATA VALIDATOR</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="/Export/excel_validator" class="btn btn-primary" style="float: left">
                            <i class="fas fa-download"></i>
                            Excel
                        </a>
                        <a href="/Export/pdf_validator" class="btn btn-primary" style="float: left">
                            <i class="fas fa-download"></i>
                            PDF
                        </a>
                        <button type="button" id="tombolTambahValidator" class="btn btn-primary tombolTambahValidator" data-toggle="modal" data-target="#modalValidator" style="float: right">
                            <i class="fas fa-plus"></i>
                            Tambah Validator
                        </button>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <?= session()->getflashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('validator'); ?>"></div>
                                <br><br><br>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Validator</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($validator as $val) { ?>
                                        <tr>
                                            <td>
                                                <center><?= $i++; ?></center>
                                            </td>
                                            <td><?= $val['name']; ?></td>
                                            <td><?= $val['nama_unit']; ?></td>
                                            <td><?= $val['email']; ?></td>
                                            <td class="text-center">
                                                <figure img src="upload/<?= $val['image'] ?>" class="gal"><img src="upload/<?= $val['image'] ?>" alt="" width="50px"></figure>
                                            </td>
                                            <td>
                                                <center>
                                                    <button type="button" name="ubah" data-toggle="modal" data-target="#modalValidator" id="tombolUbahValidator" class="btn btn-success btn-sm tombolUbahValidator" data-id="<?= $val['id']; ?>"><i class="fas fa-edit"></i></button>
                                                    <button href="Validator/delete/<?= md5($val['id']) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash"></i></button>
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
<div class="modal fade" id="modalValidator" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $validation->getError(); ?>
                <form action="/Validator" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Name<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="nama" id="nama" required="required" value="<?= old('nama'); ?>" />
                            <font color="red"><?= $validation->getError('nama'); ?></font>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Unit<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <select type="text" class="form-control" name="id_unit" id="id_unit" required="required">
                                <?php foreach ($unit as $row) { ?>
                                    <option value="<?= $row['id_unit']; ?>"><?= $row['nama_unit']; ?></option>
                                <?php } ?>
                            </select>
                            <font color="red"><?= $validation->getError('id_unit'); ?></font>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Image</label>
                        <div class="col-md col-sm">
                            <input type="file" name="validator" /> <br>
                            <font color="red"><?= $validation->getError('validator'); ?></font>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="old_image" id="old_image">
                    <div class="row form-group">
                        <label id="labelEmailValidator" class="col-form-label col-md-2 col-sm-2">Email<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="email" class="form-control" name="email" id="emailValidator" required="required" value="<?= old('email'); ?>" />
                            <font color="red"><?= $validation->getError('email'); ?></font>

                        </div>
                    </div>
                    <input type="hidden" name="old_pass" id="old_pass">
                    <div class="row form-group">
                        <label id="labelPasswordValidator" class="col-form-label col-md-2 col-sm-2">Password<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input class="form-control" type="password" name="password" id="passwordValidator" data-validate-length="6,8" />
                            <font color="red"><?= $validation->getError('password'); ?></font>

                        </div>
                    </div>

                    <div class="row form-group">
                        <label id="labelRetypePasswordValidator" class="col-form-label col-md-2 col-sm-2">Retype Password<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input class="form-control" type="password" name="retypePassword" id="retypePasswordValidator" data-validate-length="6,8" />
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
    //UPDATE VALIDATOR
    $('.tombolUbahValidator').on('click', function() {
        $('#judulModal').html('Update Data Validator');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', '/Validator/save_update');


        // hide form input
        $('#labelPasswordValidator').hide();
        $('#passwordValidator').hide();
        $('#labelRetypePasswordValidator').hide();
        $('#retypePasswordValidator').hide();
        $('#labelEmailValidator').hide();
        $('#emailValidator').hide();

        const id = $(this).data('id');

        $.ajax({
            url: '/Validator/update_validator',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#nama').val(data.name);
                $('#id_unit').val(data.id_unit);
                $('#emailValidator').val(data.email);
                $('#old_image').val(data.image);
                $('#old_pass').val(data.password);
                $('#passwordValidator').val(data.password);
            }
        });
    });
</script>

<?= $this->endSection('content'); ?>