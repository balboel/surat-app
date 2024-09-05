<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit SK</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a>Buat Surat</a>
                    <ul>
                        <li><a href="/sku/create">Surat Keterangan Usaha</a></li>
                        <li><a href="/skbm/create">Surat Keterangan Belum Menikah</a></li>
                        <li><a href="/skos/create">Surat Keterangan Satu Orang Yang Sama</a></li>
                        <li><a href="/sk/create">Surat Kehilangan</a></li>
                        <li><a href="/spskck/create">Surat Pengantar SKCK</a></li>
                        <li><a href="/su/create">Surat Undangan</a></li>
                        <li><a href="/sktm/create">Surat Keterangan Tidak Mampu</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <h1>Edit Surat Kehilangan</h1>
    </header>
    <main>
        <section>
            <form action="/surat/updateSk/<?= $sk['id'] ?>" method="post">
                <label for="nomor_surat">Nomor Surat:</label><br>
                <input type="text" id="nomor_surat" name="nomor_surat" value="<?= $sk['nomor_surat'] ?>"><br>

                <label for="pj_id">Penanggung Jawab:</label><br>
                <select id="pj_id" name="pj_id">
                    <?php foreach ($penanggung_jawab as $pj): ?>
                        <option value="<?= $pj['id'] ?>" <?= $pj['id'] == $sk['pj_id'] ? 'selected' : '' ?>><?= $pj['nama'] ?>
                            -
                            <?= $pj['jabatan'] ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= $sk['nama'] ?>">

                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" value="<?= $sk['nik'] ?>">

                <label for="tempat_tanggal_lahir">Tempat dan Tanggal Lahir:</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir"
                    value="<?= $sk['tempat_tanggal_lahir'] ?>">

                <label for="kewarnegaraan_agama">Kewarganegaraan dan Agama:</label>
                <input type="text" id="kewarnegaraan_agama" name="kewarnegaraan_agama"
                    value="<?= $sk['kewarnegaraan_agama'] ?>">

                <label for="pekerjaan">Pekerjaan:</label>
                <input type="text" id="pekerjaan" name="pekerjaan" value="<?= $sku['pekerjaan'] ?>">

                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat"><?= $sku['alamat'] ?></textarea>

                <label for="hari_tanggal_kehilangan">Hari / Tanggal:</label>
                <input type="date" id="hari_tanggal_kehilangan" name="hari_tanggal_kehilangan"
                    value="<?= $sk['hari_tanggal_kehilangan'] ?>">

                <label for="barang_yang_hilang">Barang yang Hilang:</label>
                <textarea id="barang_yang_hilang" name="barang_yang_hilang"
                    value="<?= $sk['barang_yang_hilang'] ?>"></textarea>

                <input type="submit" value="Update">
            </form>
        </section>
    </main>
</body>

</html>