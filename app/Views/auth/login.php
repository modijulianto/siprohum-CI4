<?= $this->extend('auth/template'); ?>

<?= $this->section('content'); ?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-20 p-b-55">
            <?php if (session()->getFlashdata('registered')) : ?>
                <?= session()->getFlashdata('registered'); ?>
            <?php endif; ?>
            <form action="/Auth/login" method="POST" class="login100-form validate-form flex-sb flex-w">
                <span class="login100-form-title p-b-32">
                    <center><a href="/Jdih"><img src="/images/Undiksha.png" width="200px"></a></center>
                    <center class="p-t-10">LOGIN</center>
                </span>

                <span class="txt1 p-b-10">
                    Email
                </span>
                <div class="wrap-input100 validate-input m-b-12" data-validate="Email is required">
                    <input class="input100" type="email" name="email" id="email" value="<?= old('email'); ?>">
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-10">
                    Password
                </span>
                <div class="wrap-input100 validate-input m-b-30" data-validate="Password is required">
                    <span class="btn-show-pass">
                        <i class="fa fa-eye"></i>
                    </span>
                    <input class="input100" type="password" name="password" id="password">
                    <span class="focus-input100"></span>
                </div>

                <div class="login100-form-title">
                    <center><button class="login100-form-btn" type="submit">Login</button></center>
                    <hr>
                    <center>
                        <!-- <a class="txt1" href="<?= base_url() ?>auth/registration">
							Create an account?
						</a>&ensp; -->
                        <a class="txt1" href="/auth/forgotPassword">
                            Forgot Password?
                        </a>
                    </center>
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>