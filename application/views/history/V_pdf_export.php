<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak History Donwload Broadcast AHK</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12pt;
        }

        p {
            margin: 0pt;
        }

        h1.center {
            text-align: center;
        }

        table.items {
            border: 0.1mm solid #000000;
        }

        td {
            vertical-align: top;
        }



        table thead td {
            background-color: #EEEEEE;
            text-align: center;
            border: 0.1mm solid #000000;
            font-variant: small-caps;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #000000;
            background-color: #FFFFFF;
            border: 0mm none #000000;
            border-top: 0.1mm solid #000000;
            border-right: 0.1mm solid #000000;
        }

        .items td.totals {
            text-align: right;
            border: 0.1mm solid #000000;
        }

        .items td.cost {
            text-align: "."center;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center; font-size: 14pt;">Laporan Riwayat Broadcast Whatsapp </br></h1>
    <h1 style="text-align: center; font-size: 14pt;">Script AHK </br></h1>
    </br>
    <?php if ($periode != null || $periode != "") { ?>
        <P>Periode : <?= $periode ?></P>
        </br>
    <?php } else { ?>
        <p>Semua Data</p>
        </br>
    <?php } ?>
    <p>Tanggal Cetak : <?= date('d F Y'); ?> </p>
    </br>
    <table class="items" width="100%" style="font-size: 10pt;" cellpadding="8">

        <head>
            <tr>
                <th align="left">No</th>
                <th align="left">Nama File</th>
                <th align="left">Keterangan</th>
                <th align="left">Tanggal Download</th>

            </tr>
        </head>
        <tbody>
            <?php
            $count = 0;
            foreach ($history->result() as $row) :
                $count++;
                $tanggal = date('d F Y', strtotime($row->waktu));
            ?>
                <tr>
                    <td align="left"><?php echo $count; ?> </td>
                    <td align="left"><?php echo $row->nama_file; ?></td>
                    <td align="left"><?php echo $row->keterangan; ?></td>
                    <td align="left"><?php echo $tanggal; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>