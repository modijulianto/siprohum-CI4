<?= $this->extend('/layouts/admin'); ?>

<?= $this->section('sidebar'); ?>
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/User" class=" site_title"><img src="/images/Undiksha.png" alt="" width="40px"> <span>
                            <font size="3"><b> SI PRODUK HUKUM</b></font>
                        </span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="/upload/<?= $akun['image'] ?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?= $akun['name'] ?></h2>
                        <span><?= ($akun['role_id'] == 1) ? 'Administrator' : 'Operator' ?></span>
                        <?php if ($akun['role_id'] != 1) { ?>
                            <span><?= $akun['nama_singkat'] ?></span>
                        <?php } ?>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="User"><i class="fa fa-bar-chart"></i> DASHBOARD </a></li>
                            <?php if ($akun['role_id'] == 1) { ?>
                                <li><a href="/Admin"><i class="fa fa-male"></i> DATA ADMIN </a></li>
                                <li><a href="/Operator"><i class="fa fa-users"></i> DATA OPERATOR </a></li>
                                <li><a href="/Unit"><i class="fa fa-institution"></i> DATA UNIT </a></li>
                                <li><a><i class="fa fa-book"></i> PRODUK HUKUM <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <?php foreach ($unit as $val) { ?>
                                            <li><a href="/Produk_hukum/data_prohum/<?= $val['id_unit'] ?>"><?= $val['nama_unit']; ?> </a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-th-list"></i> MASTER DATA <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/Master_data">Jenis Produk </a></li>
                                        <li><a href="/Master_data/data_kategori">Kategori Produk </a></li>
                                        <li><a href="/Tentang">Tentang </a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a href="/Produk_hukum/data_produkhukum"><i class="fa fa-book"></i> DATA PRODUK HUKUM </a></li>
                                <li><a href="/Tentang"><i class="fa fa-info"></i> Tentang </a></li>
                            <?php } ?>
                            <li><a href="/User/my_profile"><i class="fa fa-user"></i> MY PROFILE </a></li>
                            <li><a href="/User/changePassword"><i class="fa fa-key"></i> CHANGE PASSWORD </a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="fa fa-gears" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="fa fa-arrows-alt" aria-hidden="true"></span>
                    </a> -->
                    <a data-toggle="tooltip" data-placement="top" title="Back to Front" href="/Jdih" style="width: 50%;">
                        <span class="fa fa-mail-reply" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="/Auth/logout" style="width: 50%;">
                        <span class="fa fa-sign-out" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="/upload/<?= $akun['image'] ?>" alt=""><?= $akun['name'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/User/my_profile"> Profile</a>
                                <a class="dropdown-item" href="/Auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <!-- <div class="row"> -->
                <!-- <div class="col-md-12 col-sm-12 "> -->

                <!-- CONTENT -->
                <?= $this->renderSection('content'); ?>

                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Copyright &copy; Gentelella | Made with <i class="fa fa-heart"></i> <?= date('Y'); ?>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<?= $this->endSection('sidebar'); ?>