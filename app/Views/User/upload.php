<?= $this->extend('Layouts/admin'); ?>
<?= $this->section('content'); ?>
<div class="page-title">
    <div class="title_left">
        <h3> Media Gallery <small> gallery design</small> </h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Media Gallery <small> gallery design </small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= session()->getflashdata('message'); ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('upload'); ?>"></div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" id="tombolTambahMedia" class="btn btn-primary tombolTambahMedia" data-toggle="modal" data-target="#modalMedia" style="float: right">
                            <i class="fa fa-plus"></i>
                            Tambah Media
                        </button>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                                        <div class="mask no-caption">
                                            <div class="tools tools-bottom">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                                <a href="#"><i class="fa fa-pencil"></i></a>
                                                <a href="#"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p><strong>Image Name</strong>
                                        </p>
                                        <p>Snow and Ice Incoming</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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
</div>

<?= $this->endSection(); ?>