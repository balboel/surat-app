<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create SKOS</title>
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
        <h1>Surat Keterangan Satu Orang Yang Sama</h1>
    </header>
    <main>
        <section>
            <form action="/surat/storeSkos" method="post">
                <label for="nomor_surat">Nomor Surat:</label>
                <input type="text" id="nomor_surat" name="nomor_surat">

                <label for="pj_id">Penanggung Jawab:</label>
                <select id="pj_id" name="pj_id">
                    <?php foreach ($penanggung_jawab as $pj): ?>
                        <option value="<?= $pj['id'] ?>"><?= $pj['nama'] ?> - <?= $pj['jabatan'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="nama_1">Nama 1:</label>
                <input type="text" id="nama_1" name="nama_1">

                <label for="nama_2">Nama 2:</label>
                <input type="text" id="nama_2" name="nama_2">

                <label for="surat_penjelas">Surat Penjelas:</label>
                <input type="text" id="surat_penjelas" name="surat_penjelas">

                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
</body>

</html>