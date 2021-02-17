<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .font-trn {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <!-- KOP -->
    <?= $this->include('export/pdf/kop') ?>
    <!-- END KOP -->

    <hr height="2px">
    <h3 align="center" class="font-trn"><b>DATA ADMIN</b></h3>
    <br><br>

    <table border="1" cellpadding="2">
        <thead>
            <tr>
                <th align="center" style="background-color:#44749D;"><b>#</b></th>
                <th align="center" style="background-color:#44749D;"><b>ID</b></th>
                <th align="center" style="background-color:#44749D;"><b>Nama Admin</b></th>
                <th align="center" style="background-color:#44749D;"><b>Email</b></th>
                <th align="center" style="background-color:#44749D;"><b>Tanggal Terdaftar</b></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($admin as $val) { ?>
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
            <td width="100px">Jumlah admin</td>
            <td>: <?= $tot_admin ?> </td>
        </tr>
        </tbody>
    </table>
</body>

</html>