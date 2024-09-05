<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create SKU</title>
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
        <h1>Surat Keterangan Usaha</h1>
    </header>
    <main>
        <section>
            <form action="/surat/storeSku" method="post">
                <label for="nomor_surat">Nomor Surat:</label>
                <input type="text" id="nomor_surat" name="nomor_surat">

                <label for="pj_id">Penanggung Jawab:</label>
                <select id="pj_id" name="pj_id">
                    <?php foreach ($penanggung_jawab as $pj): ?>
                        <option value="<?= $pj['id'] ?>"><?= $pj['nama'] ?> - <?= $pj['jabatan'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama">

                <label for="tempat_tanggal_lahir">Tempat dan Tanggal Lahir:</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir">

                <label for="kewarganegaraan_agama">Kewarganegaraan dan Agama:</label>
                <input type="text" id="kewarganegaraan_agama" name="kewarganegaraan_agama">

                <label for="pekerjaan">Pekerjaan:</label>
                <input type="text" id="pekerjaan" name="pekerjaan">

                <label for="nik_nkk">NIK/NKK:</label>
                <input type="text" id="nik_nkk" name="nik_nkk">

                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat"></textarea>

                <label for="keperluan">Keperluan:</label>
                <textarea id="keperluan" name="keperluan"></textarea>

                <label for="nama_usaha">Nama Usaha:</label>
                <input type="text" id="nama_usaha" name="nama_usaha">

                <label for="lokasi_usaha">Lokasi Usaha:</label>
                <textarea id="lokasi_usaha" name="lokasi_usaha"></textarea>

                <label for="lama_usaha">Lama Usaha:</label>
                <input type="text" id="lama_usaha" name="lama_usaha">

                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
</body>

</html>