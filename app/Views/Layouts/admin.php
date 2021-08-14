<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= (isset($title)) ? $title : ""; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= (isset($meta)) ? $meta : ""; ?>">
    <meta name="author" content="Akamana Coffee">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" type="image/png" href="/images/Undiksha.ico" style="width:16px; height:16px">

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- Datatables -->
    <link href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/fontawesome/css/all.css" rel="stylesheet">
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />
    <!-- Switchery -->
    <link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
    <script language="JavaScript" type="text/javascript" src="/build/js/google_chart/loader.js"></script>

    <!-- Select2 -->
    <link href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- <script language="JavaScript" type="text/javascript" src="/build/js/jquery-3.5.1.min.js"></script> -->
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>


</head>

<body class="nav-md">

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
                            <span>
                                <?php if ($akun['role_id'] == 1) { ?>
                                    Administrator
                                <?php } elseif ($akun['role_id'] == 3) { ?>
                                    Validator
                                <?php } else { ?>
                                    Operator
                                <?php } ?>
                            </span>
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
                                <li><a href="/Dashboard"><i class="fas fa-chart-bar"></i> DASHBOARD </a></li>
                                <?php if ($akun['role_id'] == 1) { ?>
                                    <li><a href="/Admin"><i class="fas fa-user"></i> DATA ADMIN </a></li>
                                    <li><a href="/Validator"><i class="fas fa-user"></i> DATA VALIDATOR </a></li>
                                    <li><a href="/Unit"><i class="fas fa-building"></i> DATA UNIT </a></li>
                                    <li><a><i class="fas fa-file-alt"></i> PRODUK HUKUM <span class="glyphicon glyphicon-chevron-down float-right"></span></a>
                                        <ul class="nav child_menu">
                                            <?php foreach ($unit as $val) { ?>
                                                <li><a href="/ProdukHukum/<?= md5($val['id_unit']) ?>"><?= $val['nama_unit']; ?> </a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a><i class="fas fa-list-alt"></i> MASTER DATA <span class="glyphicon glyphicon-chevron-down float-right"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="/MasterData/jenis">Jenis Produk </a></li>
                                            <li><a href="/MasterData/kategori">Kategori Produk </a></li>
                                            <li><a href="/MasterData/tentang">Tentang </a></li>
                                        </ul>
                                    </li>
                                <?php } else { ?>
                                    <?php if ($akun['role_id'] == 3) { ?>
                                        <li><a href="/Operator"><i class="fas fa-user"></i> DATA OPERATOR </a></li>
                                    <?php } ?>
                                    <li><a href="/ProdukHukum"><i class="fas fa-file-alt"></i> DATA PRODUK HUKUM </a></li>
                                    <li><a href="/Tentang"><i class="fas fa-comment-alt"></i> Tentang </a></li>
                                <?php } ?>
                                <li><a href="/Upload"><i class="fas fa-image"></i> GALERI </a></li>
                                <li><a href="/Profile"><i class="fas fa-user-circle"></i> MY PROFILE </a></li>
                                <li><a href="/ChangePassword"><i class="fa fa-key"></i> CHANGE PASSWORD </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="fas fa-gears" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="fas fa-arrows-alt" aria-hidden="true"></span>
                    </a> -->
                        <a data-toggle="tooltip" data-placement="top" title="Back to Front" href="/" style="width: 50%;">
                            <span class="fa fa-mail-reply" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="/Auth/logout" style="width: 50%;">
                            <span class="fas fa-sign-out-alt" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fas fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="/upload/<?= $akun['image'] ?>" alt=""><?= $akun['name'] ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/User/my_profile"> Profile</a>
                                    <a class="dropdown-item" href="/Auth/logout"><i class="fas fa-sign-out pull-right"></i> Log Out</a>
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

                    <!-- CONTENT -->
                    <?= $this->renderSection('content'); ?>
                    <!-- END CONTENT -->

                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Copyright &copy; Gentelella | Made with <i class="fas fa-heart"></i> <?= date('Y'); ?>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script src="/vendors/validator/multifield.js"></script>
    <script src="/vendors/validator/validator.js"></script>

    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- gauge.js -->
    <script src="/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/vendors/skycons/skycons.js"></script>
    <!-- morris.js -->
    <script src="/vendors/raphael/raphael.min.js"></script>
    <script src="/vendors/morris.js/morris.min.js"></script>
    <!-- Flot -->
    <script src="/vendors/Flot/jquery.flot.js"></script>
    <script src="/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/vendors/moment/min/moment.min.js"></script>
    <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- jQuery custom content scroller -->
    <script src="/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Switchery -->
    <script src="/vendors/switchery/dist/switchery.min.js"></script>
    <!-- PNotify -->
    <script src="/vendors/pnotify/dist/pnotify.js"></script>
    <script src="/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="/vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
    <script type="text/javascript" src="/build/js/dst/jquery.mask.min.js"></script>

    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>


    <!-- SweatAlert -->
    <script language="JavaScript" type="text/javascript" src="/build/js/dist/sweetalert2.all.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/build/js/dist/myscript.js"></script>

    <script language="JavaScript" type="text/javascript" src="/build/js/script.js"></script>

    <script language="JavaScript" type="text/javascript" src="/vendors/select2/dist/js/select2.min.js"></script>


    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });


        $("#tentang").select2({
            minimumInputLength: 3,
            allowClear: true,
            placeholder: 'masukkan tentang',
            ajax: {
                url: "/ProdukHukum/find_tentang",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        tentang: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });

        function previewFile() {
            const produk = document.querySelector('#produk');
            const produkLabel = document.querySelector('.custom-file-label');
            const filePreview = document.querySelector('.file-preview');

            produkLabel.textContent = produk.files[0].name;

            const fileproduk = new FileReader();
            fileproduk.readAsDataURL(produk.files[0]);

            fileproduk.onload = function(e) {
                $('.label-filePdf').removeAttr('hidden');
                $('.file-preview').removeAttr('hidden');
                filePreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>