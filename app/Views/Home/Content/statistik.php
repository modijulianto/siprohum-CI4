<?= $this->extend('Home/Layout/layout'); ?>

<?= $this->section('content'); ?>
<script language="JavaScript" type="text/javascript" src="/build/js/highcharts/highcharts.js"></script>
<script language="JavaScript" type="text/javascript" src="/build/js/highcharts/jquery.highchartTable-min.js"></script>
<script>
    $(document).ready(function() {
        $('table.highchart').highchartTable();
    });
</script>
<div class="row">
    <div class="col-md-6">
        <div class="card text-black mt-4 mb-3" style="max-width: 100%;">
            <div class="card-header text-white" style="background: #288ACB;">
                <h6 class="m-0"><b><i class="fa fa-book"></i>&emsp; Statistik Jenis Produk Hukum</b></h6>
            </div>
            <div class="card-body">
                <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                    <thead>
                        <tr>
                            <th></th>
                            <th data-graph-stack-group="1">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jenis as $jen) { ?>
                            <tr>
                                <td><?= $jen['nama_jenis']; ?></td>
                                <td><?= $jen['berlaku']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-black mt-4 mb-3" style="max-width: 100%;">
            <div class="card-header text-white" style="background: #288ACB;">
                <h6 class="m-0"><b><i class="fa fa-book"></i>&emsp; Statistik Kategori Produk Hukum</b></h6>
            </div>
            <div class="card-body">
                <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                    <thead>
                        <tr>
                            <th></th>
                            <th data-graph-stack-group="1">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $kat) { ?>
                            <tr>
                                <td><?= $kat['nama_kategori']; ?></td>
                                <td><?= $kat['berlaku']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card text-black mt-4 mb-3" style="max-width: 100%;">
            <div class="card-header text-white" style="background: #288ACB;">
                <h6 class="m-0"><b><i class="fa fa-book"></i>&emsp; Statistik Produk Hukum per Tahun </b></h6>
            </div>
            <div class="card-body">
                <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                    <thead>
                        <tr>
                            <th></th>
                            <th data-graph-stack-group="1">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tahun as $thn) { ?>
                            <tr>
                                <td><?= $thn['tahun']; ?></td>
                                <td><?= $thn['berlaku']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>