<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat List</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <script>
        function changeTable() {
            var selectedTable = document.getElementById('tableSelector').value;
            var tables = ['skuTable', 'skbmTable', 'skosTable', 'suTable', 'skTable', 'spskckTable', 'sktmTable'];
            var paginations = ['skuPagination', 'skbmPagination', 'skosPagination', 'suPagination', 'skPagination', 'spskckPagination', 'sktmPagination'];

            tables.forEach(function (tableId) {
                document.getElementById(tableId).style.display = 'none';
            });

            paginations.forEach(function (paginationId) {
                document.getElementById(paginationId).style.display = 'none';
            });

            document.getElementById(selectedTable + 'Table').style.display = '';
            document.getElementById(selectedTable + 'Pagination').style.display = '';

            paginateTable(selectedTable + 'Table', selectedTable + 'Pagination', 10);
        }

        function paginateTable(tableId, paginationId, rowsPerPage) {
            var table = document.getElementById(tableId);
            var pagination = document.getElementById(paginationId);
            var rows = table.querySelectorAll('tr:not(:first-child)'); // Exclude header row
            var totalPages = Math.ceil(rows.length / rowsPerPage);
            pagination.innerHTML = '';

            if (totalPages <= 1) {
                pagination.style.display = 'none';
                return;
            }

            function showPage(page) {
                var start = (page - 1) * rowsPerPage;
                var end = start + rowsPerPage;

                rows.forEach((row, index) => {
                    if (index >= start && index < end) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            for (var i = 1; i <= totalPages; i++) {
                var pageLink = document.createElement('a');
                pageLink.href = "#";
                pageLink.innerHTML = i;
                pageLink.onclick = (function (page) {
                    return function (event) {
                        event.preventDefault();
                        showPage(page);
                    }
                })(i);
                pagination.appendChild(pageLink);
            }

            showPage(1); // Show the first page by default
        }

        window.onload = function () {
            changeTable();
        };
        function searchTable() {
            // Get the search query
            var input = document.getElementById('tableSearch');
            var filter = input.value.toUpperCase();

            // Determine which table is currently visible
            var table, tr, td, i, j, txtValue;
            var tables = ["skuTable", "skbmTable", "skosTable", "suTable", "skTable", "spskckTable", "sktmTable"];
            for (i = 0; i < tables.length; i++) {
                table = document.getElementById(tables[i]);
                if (table.style.display !== "none") {
                    tr = table.getElementsByTagName("tr");
                    // Loop through all table rows, and hide those who don't match the search query
                    for (j = 1; j < tr.length; j++) { // Start from 1 to skip the header row
                        tr[j].style.display = "none"; // Initially hide the row
                        td = tr[j].getElementsByTagName("td");
                        for (var k = 0; k < td.length; k++) {
                            if (td[k]) {
                                txtValue = td[k].textContent || td[k].innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[j].style.display = ""; // Show the row if match is found
                                    break; // No need to check other columns, move to next row
                                }
                            }
                        }
                    }
                    break; // Only search in the first visible table
                }
            }
        }

    </script>

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
        <h1>Website Penyuratan Desa Gemantar</h1>
    </header>
    <main>
        <h2>Buat Surat</h2>
        <ul>
            <li><a href="/sku/create">Surat Keterangan Usaha</a></li>
            <li><a href="/skbm/create">Surat Keterangan Belum Menikah</a></li>
            <li><a href="/skos/create">Surat Keterangan Satu Orang Yang Sama</a></li>
            <li><a href="/sk/create">Surat Kehilangan</a></li>
            <li><a href="/spskck/create">Surat Pengantar SKCK</a></li>
            <li><a href="/su/create">Surat Undangan</a></li>
            <li><a href="/sktm/create">Surat Keterangan Tidak Mampu</a></li>
        </ul>

        <div>
            <label for="tableSelector">Select Table: </label>
            <select id="tableSelector" onchange="changeTable()">
                <option value="sku" selected>SKU</option>
                <option value="skbm">SKBM</option>
                <option value="skos">SKOS</option>
                <option value="su">SU</option>
                <option value="sk">SK</option>
                <option value="spskck">SPSKCK</option>
                <option value="sktm">SKTM</option>
            </select>
        </div>

        <div>
            <label for="tableSearch">Search:</label>
            <input type="text" id="tableSearch" onkeyup="searchTable()">
        </div>

        <h2>Daftar Surat</h2>
        <table id="skuTable">
            <tr>
                <th>Nomor Surat</th>
                <th>Nama</th>
                <th>Pekerjaan</th>
                <th>NIK/NKK</th>
                <th>Nama Usaha</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($sku_list as $sku): ?>
                <tr>
                    <td><?= $sku['nomor_surat'] ?></td>
                    <td><?= $sku['nama'] ?></td>
                    <td><?= $sku['pekerjaan'] ?></td>
                    <td><?= $sku['nik_nkk'] ?></td>
                    <td><?= $sku['nama_usaha'] ?></td>
                    <td>
                        <a href="/sku/cetak/<?= $sku['id'] ?>" target="_blank">Cetak</a> |
                        <a href="/sku/edit/<?= $sku['id'] ?>">Edit</a> |
                        <a href="/sku/delete/<?= $sku['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="skuPagination" class="pagination"></div>

        <table id="skbmTable">
            <tr>
                <th>Nomor Surat</th>
                <th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
                <th>NIK</th>
                <th>Status Perkawinan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($skbm_list as $skbm): ?>
                <tr>
                    <td><?= $skbm['nomor_surat'] ?></td>
                    <td><?= $skbm['nama'] ?></td>
                    <td><?= $skbm['tempat_tanggal_lahir'] ?></td>
                    <td><?= $skbm['nik'] ?></td>
                    <td><?= $skbm['status_perkawinan'] ?></td>
                    <td><?= $skbm['alamat'] ?></td>
                    <td>
                        <a href="/skbm/cetak/<?= $skbm['id'] ?>" target="_blank">Cetak</a> |
                        <a href="/skbm/edit/<?= $skbm['id'] ?>">Edit</a> |
                        <a href="/skbm/delete/<?= $skbm['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="skbmPagination" class="pagination"></div>

        <table id="skosTable">
            <tr>
                <th>Nomor Surat</th>
                <th>Nama</th>
                <th>Surat Penjelas</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($skos_list as $skos): ?>
                <tr>
                    <td><?= $skos['nomor_surat'] ?></td>
                    <td><?= $skos['nama_1'] ?></td>
                    <td><?= $skos['surat_penjelas'] ?></td>
                    <td>
                        <a href="/skos/cetak/<?= $skos['id'] ?>" target="_blank">Cetak</a> |
                        <a href="/skos/edit/<?= $skos['id'] ?>">Edit</a> |
                        <a href="/skos/delete/<?= $skos['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <div id="skosPagination" class="pagination"></div>

        <table id="suTable">
            <tr>
                <th>Nomor Surat</th>
                <th>Nama</th>
                <th>Di</th>
                <th>Sifat</th>
                <th>Hari / Tanggal</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($su_list as $su): ?>
                <tr>
                    <td><?= $su['nomor_surat'] ?></td>
                    <td><?= $su['nama_yang_diundang'] ?></td>
                    <td><?= $su['tempat_yang_diundang'] ?></td>
                    <td><?= $su['sifat'] ?></td>
                    <td><?= $su['hari_tanggal'] ?></td>
                    <td><?= $su['waktu_dari'] ?></td>
                    <td><?= $su['tempat_undangan'] ?></td>
                    <td>
                        <a href="/su/cetak/<?= $su['id'] ?>" target="_blank">Cetak</a> |
                        <a href="/su/edit/<?= $su['id'] ?>">Edit</a> |
                        <a href="/su/delete/<?= $su['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="suPagination" class="pagination"></div>

        <table id="skTable">
            <tr>
                <th>Nomor Surat</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat Kehilangan</th>
                <th>Waktu Kehilangan</th>
                <th>Barang Hilang</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($sk_list as $sk): ?>
                <tr>
                    <td><?= $sk['nomor_surat'] ?></td>
                    <td><?= $sk['nama'] ?></td>
                    <td><?= $sk['nik'] ?></td>
                    <td><?= $sk['tempat_tanggal_lahir'] ?></td>
                    <td><?= $sk['hari_tanggal_kehilangan'] ?></td>
                    <td><?= $sk['barang_yang_hilang'] ?></td>
                    <td>
                        <a href="/sk/cetak/<?= $sk['id'] ?>" target="_blank">Cetak</a> |
                        <a href="/sk/edit/<?= $sk['id'] ?>">Edit</a> |
                        <a href="/sk/delete/<?= $sk['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="skPagination" class="pagination"></div>

        <table id="spskckTable">
            <tr>
                <th>Nomor Surat</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Status Perkawinan</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($spskck_list as $spskck): ?>
                <tr>
                    <td><?= $spskck['nomor_surat'] ?></td>
                    <td><?= $spskck['nama'] ?></td>
                    <td><?= $spskck['nik'] ?></td>
                    <td><?= $spskck['tempat_tanggal_lahir'] ?></td>
                    <td><?= $spskck['status_perkawinan'] ?></td>
                    <td><?= $spskck['pekerjaan'] ?></td>
                    <td><?= $spskck['alamat'] ?></td>
                    <td>
                        <a href="/spskck/cetak/<?= $spskck['id'] ?>" target="_blank">Cetak</a> |
                        <a href="/spskck/edit/<?= $spskck['id'] ?>">Edit</a> |
                        <a href="/spskck/delete/<?= $spskck['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="spskckPagination" class="pagination"></div>
        <table id="sktmTable">
            <tr>
                <th>Nomor Surat</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Keperluan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($sktm_list as $sktm): ?>
                <tr>
                    <td><?= $sktm['nomor_surat'] ?></td>
                    <td><?= $sktm['nama'] ?></td>
                    <td><?= $sktm['nik'] ?></td>
                    <td><?= $sktm['tempat_tanggal_lahir'] ?></td>
                    <td><?= $sktm['alamat'] ?></td>
                    <td><?= $sktm['pekerjaan'] ?></td>
                    <td><?= $sktm['keperluan'] ?></td>
                    <td>
                        <a href="/sktm/cetak/<?= $sktm['id'] ?>" target="_blank">Cetak</a> |
                        <a href="/sktm/edit/<?= $sktm['id'] ?>">Edit</a> |
                        <a href="/sktm/delete/<?= $sktm['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div id="sktmPagination" class="pagination"></div>
    </main>
</body>

</html>