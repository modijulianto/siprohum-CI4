<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title><?= (isset($title) ? $title : ''); ?></title>
    <link rel="icon" type="image/png" href="/images/Undiksha.ico" style="width:16px; height:16px">

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="/build/css/custom-home.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>

</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-dark text-light pt-2 pb-2 pl-5 ">
                Informasi dan Layanan &emsp;
                <i class="fa fa-phone">&ensp; (0362) 22570</i> &emsp;
                <i class="fa fa-envelope-o">&ensp; humas@undiksha.ac.id</i>
            </div>
        </div>
    </div>
    <?= $this->include('Home/Components/navbar'); ?>

    <div class="container-fluid">
        <?= $this->renderSection('content'); ?>
    </div>


    <div class="col col-lg-12 bg-dark">
        <footer class="footer mt-auto py-3">
            <div class="row">
                <div class="col-md-5">
                    <img src="/images/Logo-Website-Undiksha.png" alt=""><br><br>
                    <div class="text-light">
                        <b>Jaringan Dokumentasi dan Informasi Hukum</b> <br>
                        Jalan Udayana No.11 Singaraja - Bali 81116 <br>
                        Telephone (0362) 22570, Fax (0362) 25735, Email : humas@undiksha.ac.id
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-light mb-auto" style="margin-top: 10px;">
                        <b>&emsp; UNIT</b>
                        <hr color="white">
                        <ul>
                            <?php foreach ($unit as $row) { ?>
                                <li style="line-height: 5px;" class="mb-3"><a class="text-light" href="/Jdih/unit/<?= md5($row['id_unit']); ?>"><?= $row['nama_unit']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Style -->
    <script src="/build/js/custom-home.js"></script>


    <!-- font aksara bali -->
    <!-- <script src='https://s.keyman.com/kmw/engine/14.0.271/keymanweb.js'></script>
    <script src='https://s.keyman.com/kmw/engine/14.0.271/kmwuitoggle.js'></script>
    <script>
        (function(kmw) {
            kmw.init({
                attachType: 'auto'
            });
            // kmw.addKeyboards('@en'); // Loads default English keyboard from Keyman Cloud (CDN)
            // kmw.addKeyboards('@th'); // Loads default Thai keyboard from Keyman Cloud (CDN)
            kmw.addKeyboards('@ban-bali'); // Loads default Thai keyboard from Keyman Cloud (CDN)
        })(keyman);
    </script> -->
    <!-- end font aksara bali -->
</body>

</html>