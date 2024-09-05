<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Usaha</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            padding: 20pt;
            line-height: 1.15;
            text-align: justify;
            padding-top: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .kode {
            text-align: left;
            margin-left: 20px;
            height: auto;
        }

        .jenis {
            padding: 0px;
            text-align: center;
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

        .footer {
            text-align: center;
            padding-left: 250pt;
        }

        .content {
            margin: 20px;
        }

        .content table {
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

        hr {
            border: 1px solid black;
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
        <div class="kode">
            <a>No. kode Desa: 3312112008</a>
        </div>
        <div class="jenis">
            <h4 style="text-decoration: underline; font-weight:normal; margin-bottom:0">SURAT KETERANGAN USAHA</h4>
            <h4 style="margin-top:0; font-weight:normal">Nomor: 510/<?= $data['nomor_surat'] ?></h4>
        </div>
    </div>
    <div class="content">
        <a>Yang bertanda tangan di bawah ini:</a><br><br>
        <table>
            <tr>
                <th>Nama</th>
                <td>: <?= $data['penanggung_jawab']['nama'] ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>: <?= $data['penanggung_jawab']['jabatan'] ?></td>
            </tr>
        </table>
        <p>Menerangkan dengan sesungguhnya bahwa:</p>
        <table>
            <tr>
                <th>1.&nbsp;&nbsp;Nama</th>
                <td>: <?= $data['nama'] ?></td>
            </tr>
            <tr>
                <th>2.&nbsp;&nbsp;Tempat tanggal lahir</th>
                <td>: <?= $data['tempat_tanggal_lahir'] ?></td>
            </tr>
            <tr>
                <th>3.&nbsp;&nbsp;Kewarganegaraan dan Agama</th>
                <td>: <?= $data['kewarganegaraan_agama'] ?></td>
            </tr>
            <tr>
                <th>4.&nbsp;&nbsp;Pekerjaan</th>
                <td>: <?= $data['pekerjaan'] ?></td>
            </tr>
            <tr>
                <th>5.&nbsp;&nbsp;NIK/NKK</th>
                <td>: <?= $data['nik_nkk'] ?></td>
            </tr>
            <tr>
                <th>6.&nbsp;&nbsp;Alamat</th>
                <td>: <?= $data['alamat'] ?></td>
            </tr>
        </table>
        <p>dan menurut pengakuan yang bersangkutan mempunyai kegiatan usaha sebagai berikut:</p>
        <table style="width:100%">
            <tr>
                <th>Nama Usaha</th>
                <td>: <?= $data['nama_usaha'] ?></td>
            </tr>
            <tr>
                <th>Lokasi Usaha</th>
                <td>: <?= $data['lokasi_usaha'] ?></td>
            </tr>
            <tr>
                <th>Lama Usaha</th>
                <td>: <?= $data['lama_usaha'] ?></td>
            </tr>
        </table>
        <p style="text-indent: 2.5em;">Demikian surat keterangan ini kami buat, agar dapat dipergunakan oleh yang
            bersangkutan untuk <?= $data['keperluan'] ?>.</p>
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