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
    <h3 align="center" class="font-trn"><b>DATA OPERATOR</b></h3>
    <br><br>

    <table border="1" cellpadding="2">
        <thead>
            <tr>
                <th align="center" style="background-color:#44749D;"><b>#</b></th>
                <th align="center" style="background-color:#44749D;"><b>ID</b></th>
                <th align="center" style="background-color:#44749D;"><b>Nama Operator</b></th>
                <th align="center" style="background-color:#44749D;"><b>Email</b></th>
                <th align="center" style="background-color:#44749D;"><b>Tanggal Terdaftar</b></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($operator as $val) { ?>
                <tr>
                    <td align="center"><?= $i++ ?></td>
                    <td align="center"><?= $val['id'] ?></td>
                    <td><?= $val['name'] ?></td>
                    <td align="justify"><?= $val['email'] ?></td>
                    <td align="center"><?= date('d F Y', $val['date_created']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br><br><br>
    Keterangan :
    <br>
    <table>
        <tr>
            <td width="100px">Jumlah operator</td>
            <td>: <?= $tot_opr ?> </td>
        </tr>
        </tbody>
    </table>
</body>

</html>