<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .font-trn {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <!-- KOP -->
    <?= $this->include('Export/Pdf/kop') ?>
    <!-- END KOP -->

    <hr height="2px">
    <h3 align="center" class="font-trn"><b>DATA PRODUK HUKUM</b></h3>
    <br><br>

    <table border="1" cellpadding="2">
        <thead>
            <tr>
                <th align="center" style="background-color:#44749D;"><b>#</b></th>
                <th align="center" style="background-color:#44749D;"><b>ID Produk</b></th>
                <th align="center" style="background-color:#44749D;"><b>No</b></th>
                <th align="center" style="background-color:#44749D;"><b>Tahun</b></th>
                <th align="center" style="background-color:#44749D;"><b>Judul</b></th>
                <th align="center" style="background-color:#44749D;"><b>Keterangan</b></th>
                <th align="center" style="background-color:#44749D;"><b>Tentang</b></th>
                <th align="center" style="background-color:#44749D;"><b>Unit</b></th>
                <th align="center" style="background-color:#44749D;"><b>Status</b></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $unit = "";
            $i = 1;
            foreach ($prohum as $val) { ?>
                <?php
                if ($unit != $val['nama_unit']) {
                    $unit = $val['nama_unit']; ?>
                    <tr>
                        <td colspan="9" style="background-color: rgb(175, 175, 175);"><?= $unit ?></td>
                    </tr>
                <?php } ?>

                <tr>
                    <td align="center"><?= $i++ ?></td>
                    <td align="center"><?= $val['id_produk'] ?></td>
                    <td align="center"><?= $val['no'] ?></td>
                    <td align="center"><?= $val['tahun'] ?></td>
                    <td align="justify"><?= $val['judul'] ?></td>
                    <td align="justify"><?= $val['keterangan'] ?></td>
                    <td align="justify"><?= $val['nama_tentang'] ?></td>
                    <td><?= $val['nama_unit'] ?></td>
                    <td align="center"><?= $val['status'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>