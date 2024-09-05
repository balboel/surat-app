<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create SU</title>
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
        <h1>Surat Undangan</h1>
    </header>
    <main>
        <section>
            <form action="/surat/storeSu" method="post">
                <label for="nomor_surat">Nomor Surat:</label>
                <input type="text" id="nomor_surat" name="nomor_surat">

                <label for="pj_id">Penanggung Jawab:</label>
                <select id="pj_id" name="pj_id">
                    <?php foreach ($penanggung_jawab as $pj): ?>
                        <option value="<?= $pj['id'] ?>"><?= $pj['nama'] ?> - <?= $pj['jabatan'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="nama_yang_diundang">Nama:</label>
                <input type="text" id="nama_yang_diundang" name="nama_yang_diundang">

                <label for="tempat_yang_diundang">Alamat Penerima:</label>
                <input type="text" id="tempat_yang_diundang" name="tempat_yang_diundang">

                <label for="sifat">Sifat:</label>
                <select id="sifat" name="sifat">
                    <option value="Segera">Segera</option>
                    <option value="Penting">Penting</option>
                </select>

                <label for="lampiran">Lampiran:</label>
                <select id="lampiran" name="lampiran">
                    <option value="1 lembar">1 lembar</option>
                    <option value="2 lembar">2 lembar</option>
                    <option value="3 lembar">3 lembar</option>
                    <option value="4 lembar">4 lembar</option>
                    <option value="5 lembar">5 lembar</option>
                </select>

                <label for="hari_tanggal">Hari / Tanggal:</label>
                <input type="date" id="hari_tanggal" name="hari_tanggal">

                <label for="waktu_dari">Waktu:</label>
                <input type="time" id="waktu_dari" name="waktu_dari">WIB s/d <input type="time" id="waktu_ke"
                    name="waktu_ke">Kosongkan apabila ingin memasukkan Selesai

                <label for="tempat_undangan">Tempat:</label>
                <input type="text" id="tempat_undangan" name="tempat_undangan">

                <label for="keperluan">Keperluan:</label>
                <textarea id="keperluan" name="keperluan"></textarea>

                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
</body>

</html>