<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>CHANGE PASSWORD</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>CHANGE PASSWORD</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?= session()->get('message'); ?>
                    <form action="/ChangePassword/save" method="POST">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-2 col-sm-2" for="current_password">Current Password <font color="red">*</font></label>
                            <div class="col-md-5 col-sm-5">
                                <input class="form-control" type="password" name="current_password" id="current_password" data-validate-length="6,8" required='required' />
                                <font color="red"><?= $validation->getError('password'); ?></font>
                            </div>
                        </div>
                        <br>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-2 col-sm-2" for="new_password1">New Password <font color="red">*</font></label>
                            <div class="col-md-5 col-sm-5">
                                <input class="form-control" type="password" name="new_password1" id="new_password1" data-validate-length="6,8" required='required' />
                                <font color="red"><?= $validation->getError('new_password1'); ?></font>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-2 col-sm-2" for="new_password2">Repeat Password <font color="red">*</font></label>
                            <div class="col-md-5 col-sm-5">
                                <input class="form-control" type="password" name="new_password2" id="new_password2" data-validate-length="6,8" required='required' />
                                <font color="red"><?= $validation->getError('new_password2'); ?></font>
                            </div>
                        </div>
                        <hr>
                        <div class="field item form-group">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>