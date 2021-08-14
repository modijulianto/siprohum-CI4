<div class="card">
    <ul class="list-group list-group-flush">
        <?php

        use App\Models\M_home;

        foreach ($kategori as $row) { ?>
            <li class="unit list-group-item">
                <span class="span-unit"></span>
                <div class="row">
                    <div class="col-1">
                        <center>
                            <i class="fas fa-th-large"></i>
                        </center>
                    </div>
                    <div class="col-9">
                        <?= $row['nama_kategori']; ?>
                    </div>
                    <div class="col-2">
                        <?php
                        $this->m_home = new M_home();
                        $jml = $this->m_home->get_jml_produk_by_kategori($row['id_kategori']);
                        ?>
                        <center>
                            <span class="badge badge-info float-right"><?= $jml; ?></span>
                        </center>
                    </div>
                </div>
                <a href="/Jdih/kategori/<?= md5($row['id_kategori']); ?>" class="stretched-link"></a>
            </li>
        <?php } ?>
    </ul>
</div>