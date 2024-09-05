<?php
namespace App\Controllers;

use App\Models\SkuModel;
use App\Models\SkbmModel;
use App\Models\SkosModel;
use App\Models\SuModel;
use App\Models\SpskckModel;
use App\Models\SkModel;
use App\Models\SktmModel;
use App\Models\PjModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;
use DateTime;

class Surat extends Controller
{
    public function index()
    {
        $skuModel = new SkuModel();
        $skbmModel = new SkbmModel();
        $skosModel = new SkosModel();
        $suModel = new SuModel();
        $spskckModel = new SpskckModel();
        $skModel = new SkModel();
        $sktmModel = new SktmModel();
        $data['sku_list'] = $skuModel->findAll();
        $data['skbm_list'] = $skbmModel->findAll();
        $data['skos_list'] = $skosModel->findAll();
        $data['su_list'] = $suModel->findAll();
        $data['spskck_list'] = $spskckModel->findAll();
        $data['sk_list'] = $skModel->findAll();
        $data['sktm_list'] = $sktmModel->findAll();

        return view('index', $data);
    }

    // Methods for SKU
    public function createSku()
    {
        $pjModel = new PjModel();
        $data['penanggung_jawab'] = $pjModel->findAll();
        return view('sku_create', $data);
    }

    public function storeSku()
    {
        $skuModel = new SkuModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'kewarganegaraan_agama' => $this->request->getPost('kewarganegaraan_agama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nik_nkk' => $this->request->getPost('nik_nkk'),
            'alamat' => $this->request->getPost('alamat'),
            'nama_usaha' => $this->request->getPost('nama_usaha'),
            'lokasi_usaha' => $this->request->getPost('lokasi_usaha'),
            'lama_usaha' => $this->request->getPost('lama_usaha'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'keperluan' => $this->request->getPost('keperluan'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $skuModel->insert($data);

        return redirect()->to('/surat');
    }

    public function editSku($id)
    {
        $skuModel = new SkuModel();
        $pjModel = new PjModel();
        $data['sku'] = $skuModel->find($id);
        $data['penanggung_jawab'] = $pjModel->findAll();

        return view('sku_edit', $data);
    }

    public function updateSku($id)
    {
        $skuModel = new SkuModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'kewarganegaraan_agama' => $this->request->getPost('kewarganegaraan_agama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nik_nkk' => $this->request->getPost('nik_nkk'),
            'alamat' => $this->request->getPost('alamat'),
            'nama_usaha' => $this->request->getPost('nama_usaha'),
            'lokasi_usaha' => $this->request->getPost('lokasi_usaha'),
            'lama_usaha' => $this->request->getPost('lama_usaha'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'keperluan' => $this->request->getPost('keperluan'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $skuModel->update($id, $data);

        return redirect()->to('/surat');
    }

    public function deleteSku($id)
    {
        $skuModel = new SkuModel();
        $skuModel->delete($id);

        return redirect()->to('/surat');
    }

    public function cetakSku($id)
    {
        $skuModel = new SkuModel();
        $pjModel = new PjModel();
        $data = $skuModel->find($id);

        if (!$data) {
            return redirect()->to('/surat');
        }

        $data['penanggung_jawab'] = $pjModel->find($data['pj_id']);

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->setIsRemoteEnabled(true);

        $dompdf = new Dompdf($options);

        $html = view('sku_pdf', ['data' => $data]);
        $dompdf->getOptions()->setChroot('C:\\xampp\\htdocs\\surat-app\\public');
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF
        $dompdf->stream("sku_{$id}.pdf", ["Attachment" => 0]);
    }

    // Methods for SKBM
    public function createSkbm()
    {
        $pjModel = new PjModel();
        $data['penanggung_jawab'] = $pjModel->findAll();
        return view('skbm_create', $data);
    }

    public function storeSkbm()
    {
        $skbmModel = new SkbmModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'nik' => $this->request->getPost('nik'),
            'status_perkawinan' => $this->request->getPost('status_perkawinan'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'keperluan' => $this->request->getPost('keperluan'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $skbmModel->insert($data);

        return redirect()->to('/surat');
    }

    public function editSkbm($id)
    {
        $skbmModel = new SkbmModel();
        $pjModel = new PjModel();
        $data['skbm'] = $skbmModel->find($id);
        $data['penanggung_jawab'] = $pjModel->findAll();

        return view('skbm_edit', $data);
    }

    public function updateSkbm($id)
    {
        $skbmModel = new SkbmModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'nik' => $this->request->getPost('nik'),
            'status_perkawinan' => $this->request->getPost('status_perkawinan'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'keperluan' => $this->request->getPost('keperluan'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $skbmModel->update($id, $data);

        return redirect()->to('/surat');
    }

    public function deleteSkbm($id)
    {
        $skbmModel = new SkbmModel();
        $skbmModel->delete($id);

        return redirect()->to('/surat');
    }

    public function cetakSkbm($id)
    {
        $skbmModel = new SkbmModel();
        $pjModel = new PjModel();
        $data = $skbmModel->find($id);

        if (!$data) {
            return redirect()->to('/surat');
        }

        $data['penanggung_jawab'] = $pjModel->find($data['pj_id']);

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = view('skbm_pdf', ['data' => $data]);
        $dompdf->getOptions()->setChroot('C:\\xampp\\htdocs\\surat-app\\public');
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF
        $dompdf->stream("skbm_{$id}.pdf", ["Attachment" => 0]);
    }

    public function createSkos()
    {
        $pjModel = new PjModel();
        $data['penanggung_jawab'] = $pjModel->findAll();
        return view('skos_create', $data);
    }

    public function storeSkos()
    {
        $skosModel = new SkosModel();

        $data = [
            'nama_1' => $this->request->getPost('nama_1'),
            'nama_2' => $this->request->getPost('nama_2'),
            'surat_penjelas' => $this->request->getPost('surat_penjelas'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $skosModel->insert($data);

        return redirect()->to('/surat');
    }

    public function editSkos($id)
    {
        $skosModel = new SkosModel();
        $pjModel = new PjModel();
        $data['skos'] = $skosModel->find($id);
        $data['penanggung_jawab'] = $pjModel->findAll();

        return view('skos_edit', $data);
    }

    public function updateSkos($id)
    {
        $skosModel = new SkosModel();

        $data = [
            'nama_1' => $this->request->getPost('nama_1'),
            'nama_2' => $this->request->getPost('nama_2'),
            'surat_penjelas' => $this->request->getPost('surat_penjelas'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $skosModel->update($id, $data);

        return redirect()->to('/surat');
    }

    public function deleteSkos($id)
    {
        $skosModel = new SkosModel();
        $skosModel->delete($id);

        return redirect()->to('/surat');
    }

    public function cetakSkos($id)
    {
        $skosModel = new SkosModel();
        $pjModel = new PjModel();
        $data = $skosModel->find($id);

        if (!$data) {
            return redirect()->to('/surat');
        }

        $data['penanggung_jawab'] = $pjModel->find($data['pj_id']);

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = view('skos_pdf', ['data' => $data]);
        $dompdf->getOptions()->setChroot('C:\\xampp\\htdocs\\surat-app\\public');
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF
        $dompdf->stream("skos_{$id}.pdf", ["Attachment" => 0]);
    }

    public function createSU()
    {
        $pjModel = new PjModel();
        $data['penanggung_jawab'] = $pjModel->findAll();
        return view('su_create', $data);
    }

    private function formatIndonesianDate($date)
    {
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        $dateTime = new DateTime($date);
        $day = $days[$dateTime->format('l')];
        $month = $months[$dateTime->format('F')];
        $formattedDate = $day . ', ' . $dateTime->format('j') . ' ' . $month . ' ' . $dateTime->format('Y');

        return $formattedDate;
    }

    public function storeSU()
    {
        $suModel = new SuModel();

        $rawDate = $this->request->getPost('hari_tanggal');

        $formattedDate = $this->formatIndonesianDate($rawDate);

        $waktuDari = $this->request->getPost('waktu_dari');
        $waktuKe = $this->request->getPost('waktu_ke');

        // Format the time to include WIB and Selesai
        $formattedTime = $waktuDari . ' WIB s/d ' . ($waktuKe ? $waktuKe : 'Selesai');
        $data = [
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'nama_yang_diundang' => $this->request->getPost('nama_yang_diundang'),
            'tempat_yang_diundang' => $this->request->getPost('tempat_yang_diundang'),
            'sifat' => $this->request->getPost('sifat'),
            'lampiran' => $this->request->getPost('lampiran'),
            'hari_tanggal' => $formattedDate,
            'waktu_dari' => $formattedTime,
            'tempat_undangan' => $this->request->getPost('tempat_undangan'),
            'keperluan' => $this->request->getPost('keperluan'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $suModel->insert($data);

        return redirect()->to('/surat');
    }

    public function editSU($id)
    {
        $suModel = new SuModel();
        $pjModel = new PjModel();
        $data['su'] = $suModel->find($id);
        $data['penanggung_jawab'] = $pjModel->findAll();

        return view('su_edit', $data);
    }

    public function updateSU($id)
    {
        $suModel = new SuModel();

        $rawDate = $this->request->getPost('hari_tanggal');

        $formattedDate = $this->formatIndonesianDate($rawDate);
        $waktuDari = $this->request->getPost('waktu_dari');
        $waktuKe = $this->request->getPost('waktu_ke');

        // Format the time to include WIB and Selesai
        $formattedTime = $waktuDari . ' WIB s/d ' . ($waktuKe ? $waktuKe : 'Selesai');
        $data = [
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'nama_yang_diundang' => $this->request->getPost('nama_yang_diundang'),
            'tempat_yang_diundang' => $this->request->getPost('tempat_yang_diundang'),
            'surat_penjelas' => $this->request->getPost('surat_penjelas'),
            'sifat' => $this->request->getPost('sifat'),
            'lampiran' => $this->request->getPost('lampiran'),
            'hari_tanggal' => $formattedDate,
            'waktu_dari' => $formattedTime,
            'tempat_undangan' => $this->request->getPost('tempat_undangan'),
            'keperluan' => $this->request->getPost('keperluan'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $suModel->update($id, $data);

        return redirect()->to('/surat');
    }

    public function deleteSU($id)
    {
        $suModel = new SuModel();
        $suModel->delete($id);

        return redirect()->to('/surat');
    }

    public function cetakSU($id)
    {
        $suModel = new SuModel();
        $pjModel = new PjModel();
        $data = $suModel->find($id);

        if (!$data) {
            return redirect()->to('/surat');
        }

        $data['penanggung_jawab'] = $pjModel->find($data['pj_id']);

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = view('su_pdf', ['data' => $data]);
        $dompdf->getOptions()->setChroot('C:\\xampp\\htdocs\\surat-app\\public');
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF
        $dompdf->stream("su_{$id}.pdf", ["Attachment" => 0]);
    }

    public function createSpSkck()
    {
        $pjModel = new PjModel();
        $data['penanggung_jawab'] = $pjModel->findAll();
        return view('spskck_create', $data);
    }

    public function storeSpSkck()
    {
        $spskckModel = new SpskckModel();

        $data = [
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'status_perkawinan' => $this->request->getPost('status_perkawinan'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'alamat' => $this->request->getPost('alamat'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $spskckModel->insert($data);

        return redirect()->to('/surat');
    }

    public function editSpSkck($id)
    {
        $spskckModel = new SpskckModel();
        $pjModel = new PjModel();
        $data['spskck'] = $spskckModel->find($id);
        $data['penanggung_jawab'] = $pjModel->findAll();

        return view('spskck_edit', $data);
    }

    public function updateSpSkck($id)
    {
        $spskckModel = new SpskckModel();

        $data = [
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'status_perkawinan' => $this->request->getPost('status_perkawinan'),
            'alamat' => $this->request->getPost('alamat'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $spskckModel->update($id, $data);

        return redirect()->to('/surat');
    }

    public function deleteSpSkck($id)
    {
        $spskckModel = new SpskckModel();
        $spskckModel->delete($id);

        return redirect()->to('/surat');
    }

    public function cetakSpSkck($id)
    {
        $spskckModel = new SpskckModel();
        $pjModel = new PjModel();
        $data = $spskckModel->find($id);

        if (!$data) {
            return redirect()->to('/surat');
        }

        $data['penanggung_jawab'] = $pjModel->find($data['pj_id']);

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = view('spskck_pdf', ['data' => $data]);
        $dompdf->getOptions()->setChroot('C:\\xampp\\htdocs\\surat-app\\public');
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF
        $dompdf->stream("spskck_{$id}.pdf", ["Attachment" => 0]);
    }

    public function createSK()
    {
        $pjModel = new PjModel();
        $data['penanggung_jawab'] = $pjModel->findAll();
        return view('sk_create', $data);
    }

    public function storeSK()
    {
        $skModel = new SkModel();

        $rawDate = $this->request->getPost('hari_tanggal_kehilangan');

        $formattedDate = $this->formatIndonesianDate($rawDate);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'kewarnegaraan_agama' => $this->request->getPost('kewarnegaraan_agama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'alamat' => $this->request->getPost('alamat'),
            'hari_tanggal_kehilangan' => $formattedDate,
            'barang_yang_hilang' => $this->request->getPost('barang_yang_hilang'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $skModel->insert($data);

        return redirect()->to('/surat');
    }

    public function editSK($id)
    {
        $skModel = new SkModel();
        $pjModel = new PjModel();
        $data['sk'] = $skModel->find($id);
        $data['penanggung_jawab'] = $pjModel->findAll();

        return view('sk_edit', $data);
    }

    public function updateSK($id)
    {
        $skModel = new SkModel();

        $rawDate = $this->request->getPost('hari_tanggal_kehilangan');

        $formattedDate = $this->formatIndonesianDate($rawDate);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'kewarnegaraan_agama' => $this->request->getPost('kewarnegaraan_agama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'alamat' => $this->request->getPost('alamat'),
            'hari_tanggal_kehilangan' => $formattedDate,
            'barang_yang_hilang' => $this->request->getPost('barang_yang_hilang'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $skModel->update($id, $data);

        return redirect()->to('/surat');
    }

    public function deleteSK($id)
    {
        $skModel = new SkModel();
        $skModel->delete($id);

        return redirect()->to('/surat');
    }

    public function cetakSK($id)
    {
        $skModel = new SkModel();
        $pjModel = new PjModel();
        $data = $skModel->find($id);

        if (!$data) {
            return redirect()->to('/surat');
        }

        $data['penanggung_jawab'] = $pjModel->find($data['pj_id']);

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->setIsRemoteEnabled(true);

        $dompdf = new Dompdf($options);

        $html = view('sk_pdf', ['data' => $data]);
        $dompdf->getOptions()->setChroot('C:\\xampp\\htdocs\\surat-app\\public');
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF
        $dompdf->stream("sk_{$id}.pdf", ["Attachment" => 0]);
    }

    public function createSktm()
    {
        $pjModel = new PjModel();
        $data['penanggung_jawab'] = $pjModel->findAll();
        return view('sktm_create', $data);
    }

    public function storeSktm()
    {
        $sktmModel = new SktmModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'kewarnegaraan_agama' => $this->request->getPost('kewarnegaraan_agama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'alamat' => $this->request->getPost('alamat'),
            'keperluan' => $this->request->getPost('keperluan'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $sktmModel->insert($data);

        return redirect()->to('/surat');
    }

    public function editSktm($id)
    {
        $sktmModel = new SktmModel();
        $pjModel = new PjModel();
        $data['sktm'] = $sktmModel->find($id);
        $data['penanggung_jawab'] = $pjModel->findAll();

        return view('sktm_edit', $data);
    }

    public function updateSktm($id)
    {
        $sktmModel = new SktmModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tempat_tanggal_lahir' => $this->request->getPost('tempat_tanggal_lahir'),
            'kewarnegaraan_agama' => $this->request->getPost('kewarnegaraan_agama'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'alamat' => $this->request->getPost('alamat'),
            'keperluan' => $this->request->getPost('keperluan'),
            'nomor_surat' => $this->request->getPost('nomor_surat'),
            'pj_id' => $this->request->getPost('pj_id')
        ];

        $sktmModel->update($id, $data);

        return redirect()->to('/surat');
    }

    public function deleteSktm($id)
    {
        $sktmModel = new SktmModel();
        $sktmModel->delete($id);

        return redirect()->to('/surat');
    }

    public function cetakSktm($id)
    {
        $sktmModel = new SktmModel();
        $pjModel = new PjModel();
        $data = $sktmModel->find($id);

        if (!$data) {
            return redirect()->to('/surat');
        }

        $data['penanggung_jawab'] = $pjModel->find($data['pj_id']);

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = view('sktm_pdf', ['data' => $data]);
        $dompdf->getOptions()->setChroot('C:\\xampp\\htdocs\\surat-app\\public');
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream("sktm_{$id}.pdf", ["Attachment" => 0]);
    }






}
