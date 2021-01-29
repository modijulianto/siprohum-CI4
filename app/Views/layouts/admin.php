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

    <!-- SIDEBAR -->
    <?= $this->renderSection('sidebar'); ?>


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
                url: "<?php echo base_url(); ?>Produk_hukum/find_tentang",
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