<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="icon" type="image/png" href="/images/Undiksha.ico" style="width:16px; height:16px">

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="/build/css/custom-home.css" rel="stylesheet">

</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-dark text-light pt-2 pb-2 pl-5 ">Informasi dan Layanan &ensp; <i class="fa fa-phone"></i> (0362) 22570 &ensp; <i class="fa fa-envelope-o"> humas@undiksha.ac.id</i></div>
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
                                <a class="dropdown-item" href="">FTK</a>
                                <a class="dropdown-item" href="">FOK</a>
                                <a class="dropdown-item" href="">FMIPA</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/statistik">Statistik</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/Dashboard" class="nav-link">Dashboard</a>
                        </li>
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
        <div class="row bg-white rounded-lg shadow">
            <div class="col-md-8">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div id="carouselExampleIndicators" class="carousel slide mt-3 mb-3" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/FTK.jpg" class="d-block w-100 rounded-lg" alt="..." style="background-size: cover; max-height:453px;">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/FTK.jpg" class="d-block w-100 rounded-lg" alt="..." style="background-size: cover; max-height: 453px;">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/FTK.jpg" class="d-block w-100 rounded-lg" alt="..." style="background-size: cover; max-height: 453px;">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 text-dark">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title pb-2">Cari Produk Hukum</h5>
                        <hr>
                        <form action="">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input type="text" class="form-control" id="prohum" name="prohum" placeholder="Cari produk hukum" autocomplete="off">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="no">Nomor</label>
                                        <input type="text" class="form-control" id="no" name="no" placeholder="Nomor">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select name="tahun" id="tahun" class="form-control custom-select">
                                            <option value="">Semua</option>
                                            <option value="">2021</option>
                                            <option value="">2020</option>
                                            <option value="">ntahlah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="id_unit">Unit</label>
                                        <select name="id_unit" id="id_unit" class="form-control custom-select">
                                            <option value="">Semua</option>
                                            <option value="">Fakultas Teknik dan Kejuruan (FTK)</option>
                                            <option value="">Fakultas Olahraga dan Kesehatan (FOK)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori</label>
                                        <select name="id_kategori" id="id_kategori" class="form-control custom-select">
                                            <option value="">Semua</option>
                                            <option value="">Semua</option>
                                            <option value="">Semua</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control custom-select">
                                            <option value="">Semua</option>
                                            <option value="">Berlaku</option>
                                            <option value="">Tidak Berlaku</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn text-white" style=" padding: 5px 15px 5px 15px; background: #288ACB">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 text-secondary">
                        <p class="pl-3"><i class="fa fa-book"></i>&ensp; PRODUK HUKUM TERBARU <a href="" class="float-right">Lihat semua</a></p>
                        <hr style="background-color: #288ACB; border-color: #288ACB; border-width: 2px;">
                    </div>
                    <div class="col-md-12">
                        <div class="card prohum mb-3">
                            <div class="media position-relative">
                                <!-- <img src="/images/FTK.jpg" class="card-img p-3 rounded-lg" style="max-width: 200px;" alt="..."> -->
                                <i class="fa fa-book card-img p-3 text-center align-middle" style="max-width: 200px; font-size: 50px;"></i>
                                <div class="media-body">
                                    <h5 class="mt-0">JUDUL</h5>
                                    <p>Cras sit amet nibh libero, </p>
                                    <p>UNIT</p>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card prohum mb-3">
                            <div class="media position-relative">
                                <!-- <img src="/images/FTK.jpg" class="card-img p-3 rounded-lg" style="max-width: 200px;" alt="..."> -->
                                <i class="fa fa-book card-img p-3 text-center align-middle" style="max-width: 200px; font-size: 50px;"></i>
                                <div class="media-body">
                                    <h5 class="mt-0">JUDUL</h5>
                                    <p>Cras sit amet nibh libero, </p>
                                    <p>UNIT</p>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 text-secondary">
                        <p class="pl-3"><i class="fa fa-institution"></i>&ensp; UNIT</p>
                        <hr style="background-color: #288ACB; border-color: #288ACB; border-width: 2px;">
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="unit list-group-item"><span class="span-unit"></span><i class="fa fa-institution"></i>&ensp; Universitas Pendidikan Genesha <span class="badge badge-info float-right">2</span> <a href="/Jdih/unit/c4ca4238a0b923820dcc509a6f75849b" class="stretched-link"></a></li>
                                <li class="unit list-group-item"><span class="span-unit"></span><i class="fa fa-institution"></i>&ensp; Fakultas Teknik dan Kejuruan <span class="badge badge-info float-right">2</span> <a href="/Jdih/unit/c4ca4238a0b923820dcc509a6f75849b" class="stretched-link"></a></li>
                                <li class="unit list-group-item"><span class="span-unit"></span><i class="fa fa-institution"></i>&ensp; Fakultas Olahraga dan Kesehatan <span class="badge badge-info float-right">2</span> <a href="/Jdih/unit/c4ca4238a0b923820dcc509a6f75849b" class="stretched-link"></a></li>
                                <li class="unit list-group-item"><span class="span-unit"></span><i class="fa fa-institution"></i>&ensp; Fakultas Bahasa dan Seni <span class="badge badge-info float-right">2</span> <a href="/Jdih/unit/c4ca4238a0b923820dcc509a6f75849b" class="stretched-link"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br><br>
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
                            <li style="line-height: 5px;" class="mb-3"><a class="text-light" href="#"></a>FTK</a></li>
                            <li style="line-height: 5px;" class="mb-3"><a class="text-light" href="#"></a>FOK</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Style -->
    <script src="/build/js/custom-home.js"></script>
</body>

</html>