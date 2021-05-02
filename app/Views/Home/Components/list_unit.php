<div class="card">
    <ul class="list-group list-group-flush">
        <?php

        use App\Models\M_home;

        foreach ($unit as $row) { ?>
            <?php
            $this->m_home = new M_home();
            $jml = $this->m_home->get_jml_produk_by_unit($row['id_unit']);
            ?>
            <li class="unit list-group-item">
                <span class="span-unit"></span>
                <div class="row">
                    <div class="col-1 ">
                        <i class="fa fa-institution float-left"></i>
                    </div>
                    <div class="col-10 ">
                        <?= $row['nama_unit']; ?>
                    </div>
                    <div class="col-1">
                        <span class="badge badge-info float-right"><?= $jml; ?></span>
                    </div>
                </div>
                <a href="/Jdih/unit/<?= md5($row['id_unit']); ?>" class="stretched-link"></a>
            </li>
        <?php } ?>
    </ul>
</div>