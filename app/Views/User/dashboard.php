<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<script language="JavaScript" type="text/javascript" src="/build/js/highcharts/highcharts.js"></script>
<script language="JavaScript" type="text/javascript" src="/build/js/highcharts/jquery.highchartTable-min.js"></script>
<script>
    $(document).ready(function() {
        $('table.highchart').highchartTable();
    });
</script>

<div class="row">
    <div class="animated flipInY col-6">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-book"></i></div>
            <div class="count">
                <font size="5">Produk Hukum Berlaku</font>
            </div>
            <h4 style="margin-left: 10px">Total : <?= $berlaku['jumlah']; ?></h4>
        </div>
    </div>
    <div class="animated flipInY col-6">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-book"></i></div>
            <div class="count">
                <font size="5">Produk Hukum Tidak Berlaku</font>
            </div>
            <h4 style="margin-left: 10px">Total : <?= $tidak_berlaku['jumlah']; ?></h4>
        </div>
    </div>
</div>

<div class="row">
    <?php if ($akun['role_id'] == 1) { ?>
        <div class="animated flipInY  col-lg-4 col-md-4 col-sm-6">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="count">
                    <font size="5">Admin</font>
                </div>
                <h4 style="margin-left: 10px"><?= $jmlAdm; ?></h4>
            </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count">
                    <font size="5">Operator</font>
                </div>
                <h4 style="margin-left: 10px"><?= $jmlOpr; ?></h4>
            </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-remove"></i></div>
                <div class="count">
                    <font size="5">Belum Tervalidasi</font>
                </div>
                <h4 style="margin-left: 10px"><?= $blmValidasi; ?></h4>
            </div>
        </div>
    <?php } ?>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Statistik Produk Hukum Per Tahun</h2>
                <div class="clearfix"></div>
            </div>
            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                <thead>
                    <tr>
                        <th></th>
                        <th data-graph-stack-group="1">Berlaku</th>
                        <th data-graph-stack-group="1">Tidak Berlaku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tahun as $thn) { ?>
                        <tr>
                            <td><?= $thn['tahun']; ?></td>
                            <td><?= $thn['berlaku']; ?></td>
                            <td><?= $thn['tidak_berlaku']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Statistik Unit Produk Hukum</h2>
                <div class="clearfix"></div>
            </div>
            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                <thead>
                    <tr>
                        <th></th>
                        <th data-graph-stack-group="1">Berlaku</th>
                        <th data-graph-stack-group="1">Tidak Berlaku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chartUnit as $unit) { ?>
                        <tr>
                            <td><?= $unit['nama_unit']; ?></td>
                            <td><?= $unit['berlaku']; ?></td>
                            <td><?= $unit['tidak_berlaku']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Statistik Jenis Produk Hukum</h2>
                <div class="clearfix"></div>
            </div>
            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                <thead>
                    <tr>
                        <th></th>
                        <th data-graph-stack-group="1">Berlaku</th>
                        <th data-graph-stack-group="1">Tidak Berlaku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jenis as $jen) { ?>
                        <tr>
                            <td><?= $jen['nama_jenis']; ?></td>
                            <td><?= $jen['berlaku']; ?></td>
                            <td><?= $jen['tidak_berlaku']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Statistik Kategori Produk Hukum</h2>
                <div class="clearfix"></div>
            </div>
            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                <thead>
                    <tr>
                        <th></th>
                        <th data-graph-stack-group="1">Berlaku</th>
                        <th data-graph-stack-group="1" data-graph-datalabels-color="blue">Tidak Berlaku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($katProduk as $kat) { ?>
                        <tr>
                            <td><?= $kat['nama_kategori']; ?></td>
                            <td><?= $kat['berlaku']; ?></td>
                            <td><?= $kat['tidak_berlaku']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>