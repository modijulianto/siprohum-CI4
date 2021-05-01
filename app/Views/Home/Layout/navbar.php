<div class="row shadow mb-5">
    <div class="col-md-12 bg-color-custom">
        <div class="row bg-image">
            <div class="col-md-12">
                <div class="container">
                    <img src="/images/new-LOGO.png" class="img-fluid brand-logo navbar-brand float-left" alt="Responsive image">
                    <h2 class="float-right pt-3" style="font-family:sans-serif">BERANDA</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light  shadow  navbar-custom">
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
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>