<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit SPSKCK</title>
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
        <h1>Edit Surat Pengantar SKCK</h1>
    </header>
    <main>
        <section>
            <form action="/surat/updateSpskck" method="post">
                <label for="nomor_surat">Nomor Surat:</label>
                <input type="text" id="nomor_surat" name="nomor_surat" value="<?= $spskck['nomor_surat'] ?>">

                <label for="pj_id">Penanggung Jawab:</label>
                <select id="pj_id" name="pj_id">
                    <?php foreach ($penanggung_jawab as $pj): ?>
                        <option value="<?= $pj['id'] ?>" <?= $pj['id'] == $spskck['pj_id'] ? 'selected' : '' ?>>
                            <?= $pj['nama'] ?>
                            -
                            <?= $pj['jabatan'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= $spskck['nama'] ?>">

                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" value="<?= $spskck['nik'] ?>">

                <label for="tempat_tanggal_lahir">Tempat dan Tanggal Lahir:</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir"
                    value="<? $spskck['tempat_tanggal_lahir'] ?>">

                <label for="status_perkawinan">Status Perkawinan:</label>
                <select id="status_perkawinan" name="status_perkawinan">
                    <option value="Belum Menikah" <?= $spskck['status_perkawinan'] == 'Belum Menikah' ? 'selected' : '' ?>>
                        Belum
                        Menikah</option>
                    <option value="Sudah Menikah" <?= $spskck['status_perkawinan'] == 'Sudah Menikah' ? 'selected' : '' ?>>
                        Sudah
                        Menikah</option>
                </select>

                <label for="pekerjaan">Pekerjaan:</label>
                <input type="text" id="pekerjaan" name="pekerjaan" value="<?= $spskck['pekerjaan'] ?>">

                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" value="<?= $spskck['alamat'] ?>"></textarea>

                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
</body>

</html>