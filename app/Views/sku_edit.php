<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit SKU</title>
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
        <h1>Edit Surat Keterangan Usaha</h1>
    </header>
    <main>
        <section>
            <form action="/surat/updateSku/<?= $sku['id'] ?>" method="post">

                <label for="nomor_surat">Nomor Surat:</label>
                <input type="text" id="nomor_surat" name="nomor_surat" value="<?= $sku['nomor_surat'] ?>">

                <label for="pj_id">Penanggung Jawab:</label>
                <select id="pj_id" name="pj_id">
                    <?php foreach ($penanggung_jawab as $pj): ?>
                        <option value="<?= $pj['id'] ?>" <?= $pj['id'] == $sku['pj_id'] ? 'selected' : '' ?>><?= $pj['nama'] ?>
                            -
                            <?= $pj['jabatan'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= $sku['nama'] ?>">

                <label for="tempat_tanggal_lahir">Tempat dan Tanggal Lahir:</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir"
                    value="<?= $sku['tempat_tanggal_lahir'] ?>">

                <label for="kewarganegaraan_agama">Kewarganegaraan dan Agama:</label>
                <input type="text" id="kewarganegaraan_agama" name="kewarganegaraan_agama"
                    value="<?= $sku['kewarganegaraan_agama'] ?>">

                <label for="pekerjaan">Pekerjaan:</label>
                <input type="text" id="pekerjaan" name="pekerjaan" value="<?= $sku['pekerjaan'] ?>">

                <label for="nik_nkk">NIK/NKK:</label>
                <input type="text" id="nik_nkk" name="nik_nkk" value="<?= $sku['nik_nkk'] ?>">

                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat"><?= $sku['alamat'] ?></textarea>

                <label for="nama_usaha">Nama Usaha:</label>
                <input type="text" id="nama_usaha" name="nama_usaha" value="<?= $sku['nama_usaha'] ?>">

                <label for="lokasi_usaha">Lokasi Usaha:</label>
                <textarea id="lokasi_usaha" name="lokasi_usaha"><?= $sku['lokasi_usaha'] ?></textarea>

                <label for="lama_usaha">Lama Usaha:</label>
                <input type="text" id="lama_usaha" name="lama_usaha" value="<?= $sku['lama_usaha'] ?>">

                <input type="submit" value="Update">
            </form>
        </section>
    </main>
</body>

</html>