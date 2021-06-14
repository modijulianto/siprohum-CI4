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
    <!-- Lightbox 2 -->
    <link href="/lightbox2-2.11.3/src/css/lightbox.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>

</head>

<body class="bg-light">
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
                                <li class="mb-0"><a class="text-light" href="/Jdih/unit/<?= md5($row['id_unit']); ?>"><?= $row['nama_unit']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </footer>
    </div>

    <!-- Lightbox2 -->
    <script src="/lightbox2-2.11.3/src/js/lightbox.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Style -->
    <script src="/build/js/custom-home.js"></script>
</body>

</html>