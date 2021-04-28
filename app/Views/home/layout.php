<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <i class="fa fa-phone"></i>&ensp; (0362) 22570 &emsp;
                <i class="fa fa-envelope-o"></i>&ensp; humas@undiksha.ac.id
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow p-3 mb-4 bg-white rounded">
        <div class="container-fluid">
            <img src="/images/new-LOGO.png" class="img-fluid brand-logo navbar-brand" alt="Responsive image">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="col-lg-10">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Unit
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php foreach ($unit as $row) { ?>
                                    <a class="dropdown-item" href="/Jdih/unit/<?= md5($row['id_unit']); ?>"><?= $row['nama_unit']; ?></a>
                                <?php } ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/statistik">Statistik</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <ul class="navbar-nav">
                        <?php if (session()->get('email')) { ?>
                            <li class="nav-item">
                                <a href="/Dashboard" class="nav-link">Dashboard</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <?php if (session()->get('email') == null) { ?>
                                <a href="/Auth" class="nav-link">Login</a>
                            <?php } else { ?>
                                <a href="/Auth/logout" class="nav-link">Logout</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

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