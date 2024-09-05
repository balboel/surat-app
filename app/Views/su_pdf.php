<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Undangan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            padding: 20pt;
            padding-top: 0;
            line-height: 1.15;
            text-align: justify;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            position: relative;
            margin: 20px;
        }

        .header-table {
            width: 90%;
            margin-bottom: 0px;
            border-collapse: collapse;
            
        }

        .header-table img {
            width: 70px;
            height: auto;
           display: block;
        }

        .header-table h3 {
            margin: 5px 0;
            font-size: 16pt;
            font-weight: normal;
            text-align: center;
        }

        .header-table a {
            text-align: center;
            display: block;
        }

        .header-table td {
            vertical-align: top;
        }

        hr {
            border: 1px solid black;

        }

        .details {
            width: 100%;

            font-weight: normal;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12pt;
        }

        .details th,
        .details td {
            text-align: left;
            font-weight: normal;
        }



        .content table {
            font-size: 12pt;
            margin: 20px;
            text-align: left;
            width: 100%;
        }

        .content th {
            font-weight: normal;
            text-align: left;
            vertical-align: top;
            white-space: nowrap;
        }

        .content td {
            word-wrap: break-word;
            white-space: normal;
        }

        .footer {
            text-align: center;
            padding-left: 250pt;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="header-table">
            <tr>
                <td style="padding-top:8.5pt;">
                    <img src="./uploads/logo.jpg" alt="Logo">
                </td>
                <td>
                    <h3>PEMERINTAH KABUPATEN WONOGIRI<br>KECAMATAN SELOGIRI<br>KEPALA DESA GEMANTAR</h3>
                    <a>Jln Pandowo No.39 Telp (0273) 322524 Kode Pos 57652<br>Email: desagemantar@gmail.com<br>Website:
                        gemantar.desa.id</a>
                </td>
            </tr>
        </table>
        <hr>

        <div class="details">
            <table>
                <tr>
                    <th>Nomor</th>
                    <td>: 005 / <?= $data['nomor_surat'] ?> / 2024</td>
                    <th style="text-indent:1.5em">Kepada</th>
                    <td>Yth. <?= $data['nama_yang_diundang'] ?></td>
                </tr>
                <tr>
                    <th>Sifat</th>
                    <td>: Segera</td>
                </tr>
                <tr>
                    <th>Lampiran</th>
                    <td>: 1 Lembar</td>
                </tr>
                <tr>
                    <th>Hal</th>
                    <td>: Undangan</td>
                    <th style="text-indent:5em">Di</th>
                    <td>: <?= $data['tempat_yang_diundang'] ?></td>
                </tr>
            </table>
        </div>

        <div class="content">
            <p>Dengan hormat,</p>
            <p>Harap kehadiran saudara pada:</p>
            <table>
                <tr>
                    <th>Hari / Tanggal</th>
                    <td>: <?= $data['hari_tanggal'] ?></td>
                </tr>
                <tr>
                    <th>Waktu</th>
                    <td>: <?= $data['waktu_dari'] ?></td>
                </tr>
                <tr>
                    <th>Tempat</th>
                    <td>: <?= $data['tempat_undangan'] ?></td>
                </tr>
                <tr>
                    <th>Keperluan</th>
                    <td>: <?= $data['keperluan'] ?></td>
                </tr>
            </table>
            <p>Demikian atas perhatian dan kehadirannya diucapkan terima kasih.</p>
        </div>

        <div class="footer">
            <?php
            // Create an IntlDateFormatter instance for Indonesian locale
            $formatter = new IntlDateFormatter(
                'id_ID',
                IntlDateFormatter::FULL,
                IntlDateFormatter::NONE,
                'Asia/Jakarta',
                IntlDateFormatter::GREGORIAN,
                'd MMMM yyyy'
            );

            // Format the current date
            $formattedDate = $formatter->format(new DateTime());
            ?>
            <p>Gemantar, <?= $formattedDate ?><br><?= $data['penanggung_jawab']['jabatan'] ?></p>
            <br><br><br>
            <p><?= $data['penanggung_jawab']['nama'] ?></p>
        </div>
    </div>
</body>

</html>