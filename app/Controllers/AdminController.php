<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\KasMasukModel;
use App\Models\KasKeluarModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class AdminController extends BaseController
{
    public function dataAdmin()
{
    $adminModel = new \App\Models\AdminModel();
    $data['admin'] = $adminModel->findAll();

    return view('admin/data-admin', $data);
}

public function tambahAdmin()
{
    return view('admin/tambah-admin');
}

public function editAdmin($id)
{
    $adminModel = new AdminModel();
    $admin = $adminModel->find($id);

    if (!$admin) {
        return redirect()->to(base_url('admin/data-admin'))->with('error', 'Data admin tidak ditemukan.');
    }

    return view('admin/edit-admin', ['admin' => $admin]);
}

public function updateAdmin($id)
{
    helper('form');

    $rules = [
        'username'    => "required|is_unique[admin.username,id,{$id}]",
        'nama_admin'  => 'required',
    ];

    // Jika password tidak diisi, maka tidak perlu validasi password
    if ($this->request->getPost('password')) {
        $rules['password'] = 'min_length[5]';
    }

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $adminModel = new AdminModel();

    $data = [
        'username'    => $this->request->getPost('username'),
        'nama_admin'  => $this->request->getPost('nama_admin'),
    ];

    if ($this->request->getPost('password')) {
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $adminModel->update($id, $data);

    return redirect()->to('/admin/data-admin')->with('success', 'Data admin berhasil diperbarui.');
}

public function deleteAdmin($id)
{
    $adminModel = new AdminModel();

    $admin = $adminModel->find($id);
    if (!$admin) {
        return redirect()->to('/admin/data-admin')->with('error', 'Data admin tidak ditemukan.');
    }

    $adminModel->delete($id);

    return redirect()->to('/admin/data-admin')->with('success', 'Data admin berhasil dihapus.');
}
    // ======== LOGIN =========

    public function loginForm()
    {
        return view('admin/login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();
        $admin = $adminModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'admin_id' => $admin['id'],
                'nama_admin' => $admin['nama_admin'],
                'isLoggedIn' => true
            ]);
            return redirect()->to(base_url('admin/dashboard'));
        } else {
            return redirect()->to('/admin/login')->withInput()->with('error', 'Username atau password salah!');
        }
    }

    public function logout()
{
    session()->destroy(); // Hapus semua data session
    return redirect()->to(base_url('admin/login'))->with('success', 'Anda berhasil logout.');
}

    // ======== DASHBOARD =========

    public function dashboard()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/admin/login');
    }

    $kasMasukModel = new \App\Models\KasMasukModel();
    $kasKeluarModel = new \App\Models\KasKeluarModel();

    $totalKasMasuk = $kasMasukModel->selectSum('jumlah')->get()->getRow()->jumlah;
    $totalKasKeluar = $kasKeluarModel->selectSum('jumlah')->get()->getRow()->jumlah;
    $saldoKas = $totalKasMasuk - $totalKasKeluar;

    // Ambil 5 transaksi terakhir dari kas_masuk dan kas_keluar
    $masuk = $kasMasukModel
        ->select("tanggal, 'masuk' as jenis, keterangan, jumlah")
        ->orderBy('tanggal', 'DESC')
        ->limit(5)
        ->findAll();

    $keluar = $kasKeluarModel
        ->select("tanggal, 'keluar' as jenis, keterangan, jumlah")
        ->orderBy('tanggal', 'DESC')
        ->limit(5)
        ->findAll();

    // Gabungkan dan urutkan berdasarkan tanggal
    $transaksiGabung = array_merge($masuk, $keluar);
    usort($transaksiGabung, function ($a, $b) {
        return strtotime($b['tanggal']) - strtotime($a['tanggal']);
    });

    $transaksiTerakhir = array_slice($transaksiGabung, 0, 5);

    return view('admin/dashboard', [
        'totalKasMasuk'     => $totalKasMasuk,
        'totalKasKeluar'    => $totalKasKeluar,
        'saldoKas'          => $saldoKas,
        'transaksiTerakhir' => $transaksiTerakhir
    ]);
}

    // ======== KAS MASUK =========

    public function indexKasMasuk()
    {
        $kasModel = new KasMasukModel();
        $data['kas_masuk'] = $kasModel->orderBy('tanggal', 'DESC')->findAll();
        return view('kas_masuk/index', $data);
    }

    public function createKasMasuk()
    {
        helper('form');
        return view('kas_masuk/create');
    }

    public function storeKasMasuk()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'tanggal' => 'required|valid_date',
            'keterangan' => 'required',
            'jumlah' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new KasMasukModel();
        $model->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jumlah' => $this->request->getPost('jumlah'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Data kas masuk berhasil ditambahkan.');
        return redirect()->to('/kas-masuk');
    }

    public function editKasMasuk($id)
    {
        $kasModel = new KasMasukModel();
        $data['kas'] = $kasModel->find($id);
        return view('kas_masuk/edit', $data);
    }

    public function updateKasMasuk($id)
    {
        $kasModel = new KasMasukModel();

        $data = [
            'tanggal'    => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jumlah'     => $this->request->getPost('jumlah'),
        ];

        $kasModel->update($id, $data);
        return redirect()->to('/kas-masuk')->with('success', 'Data kas masuk berhasil diperbarui.');
    }

    public function deleteKasMasuk($id)
    {
        $kasModel = new KasMasukModel();
        $kasModel->delete($id);
        return redirect()->to('/kas-masuk')->with('success', 'Data kas masuk berhasil dihapus.');
    }

    // ======== KAS KELUAR =========

    public function indexKasKeluar()
    {
        $model = new KasKeluarModel();
        $data['kaskeluar'] = $model->orderBy('tanggal', 'DESC')->findAll();
        return view('kas_keluar/index', $data);
    }

    public function createKasKeluar()
    {
        helper('form');
        return view('kas_keluar/create');
    }

    public function storeKasKeluar()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'tanggal' => 'required|valid_date',
            'keterangan' => 'required',
            'jumlah' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new KasKeluarModel();
        $model->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jumlah' => $this->request->getPost('jumlah'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Data kas keluar berhasil ditambahkan.');
        return redirect()->to('/kas-keluar');
    }

    public function editKasKeluar($id)
    {
        $model = new KasKeluarModel();
        $data['kas'] = $model->find($id);
        return view('kas_keluar/edit', $data);
    }

    public function updateKasKeluar($id)
    {
        $model = new KasKeluarModel();
        $data = [
            'tanggal'    => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jumlah'     => $this->request->getPost('jumlah'),
        ];

        $model->update($id, $data);
        return redirect()->to('/kas-keluar')->with('success', 'Data kas keluar berhasil diperbarui.');
    }

    public function deleteKasKeluar($id)
    {
        $model = new KasKeluarModel();
        $model->delete($id);
        return redirect()->to('/kas-keluar')->with('success', 'Data kas keluar berhasil dihapus.');
    }

    // ======== ADMIN ========

    public function storeAdmin()
{
    helper('form');

    $rules = [
        'username'    => 'required|is_unique[admin.username]',
        'password'    => 'required|min_length[5]',
        'nama_admin'  => 'required'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $adminModel = new AdminModel();
    $adminModel->insert([
        'username'    => $this->request->getPost('username'),
        'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'nama_admin'  => $this->request->getPost('nama_admin'),
    ]);

    return redirect()->to('/admin/data-admin')->with('success', 'Admin baru berhasil ditambahkan.');
}

    // ======== LAPORAN ========

    public function laporan()
{
    $kasMasukModel = new \App\Models\KasMasukModel();
    $kasKeluarModel = new \App\Models\KasKeluarModel();

    $tanggalAwal = $this->request->getPost('tanggal_awal') ?? date('Y-m-01');
    $tanggalAkhir = $this->request->getPost('tanggal_akhir') ?? date('Y-m-d');

    $data['tanggal_awal'] = $tanggalAwal;
    $data['tanggal_akhir'] = $tanggalAkhir;

    $data['kasMasuk'] = $kasMasukModel
        ->where('tanggal >=', $tanggalAwal)
        ->where('tanggal <=', $tanggalAkhir)
        ->orderBy('tanggal', 'ASC')
        ->findAll();

    $data['kasKeluar'] = $kasKeluarModel
        ->where('tanggal >=', $tanggalAwal)
        ->where('tanggal <=', $tanggalAkhir)
        ->orderBy('tanggal', 'ASC')
        ->findAll();

    return view('laporan/index', $data);
}

public function lihatLaporan()
{
    $modelMasuk = new \App\Models\KasMasukModel();
    $modelKeluar = new \App\Models\KasKeluarModel();

    $tanggalAwal = $this->request->getPost('tanggal_awal');
    $tanggalAkhir = $this->request->getPost('tanggal_akhir');

    $data['kasMasuk'] = $modelMasuk->where('tanggal >=', $tanggalAwal)
                                   ->where('tanggal <=', $tanggalAkhir)
                                   ->findAll();

    $data['kasKeluar'] = $modelKeluar->where('tanggal >=', $tanggalAwal)
                                     ->where('tanggal <=', $tanggalAkhir)
                                     ->findAll();

    $data['tanggalAwal'] = $tanggalAwal;
    $data['tanggalAkhir'] = $tanggalAkhir;

    return view('laporan/preview', $data);
}
public function laporanPDF()
{
    $tanggal_awal = $this->request->getGet('tanggal_awal');
    $tanggal_akhir = $this->request->getGet('tanggal_akhir');

    $kasMasukModel = new KasMasukModel();
    $kasKeluarModel = new KasKeluarModel();

    $kasMasuk = $kasMasukModel->where('tanggal >=', $tanggal_awal)
                              ->where('tanggal <=', $tanggal_akhir)
                              ->findAll();

    $kasKeluar = $kasKeluarModel->where('tanggal >=', $tanggal_awal)
                                ->where('tanggal <=', $tanggal_akhir)
                                ->findAll();

    $data = [
        'kasMasuk' => $kasMasuk,
        'kasKeluar' => $kasKeluar,
        'tanggal_awal' => $tanggal_awal,
        'tanggal_akhir' => $tanggal_akhir
    ];

    $html = view('laporan/pdf', $data);

    $options = new Options();
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('Laporan-Keuangan-' . date('Ymd') . '.pdf', ['Attachment' => false]);
}

public function laporanExcel()
{
    $tanggal_awal = $this->request->getGet('tanggal_awal') ?? date('Y-m-01');
    $tanggal_akhir = $this->request->getGet('tanggal_akhir') ?? date('Y-m-d');

    $kasMasuk = $this->kasMasukModel
        ->where('tanggal >=', $tanggal_awal)
        ->where('tanggal <=', $tanggal_akhir)
        ->findAll();

    $kasKeluar = $this->kasKeluarModel
        ->where('tanggal >=', $tanggal_awal)
        ->where('tanggal <=', $tanggal_akhir)
        ->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Laporan Keuangan');
    $sheet->setCellValue('A2', 'Periode: ' . $tanggal_awal . ' s/d ' . $tanggal_akhir);

    // Header Kas Masuk
    $sheet->setCellValue('A4', 'KAS MASUK');
    $sheet->fromArray(['No', 'Tanggal', 'Keterangan', 'Jumlah'], NULL, 'A5');

    $row = 6;
    $no = 1;
    $totalMasuk = 0;
    foreach ($kasMasuk as $item) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $item['tanggal']);
        $sheet->setCellValue('C' . $row, $item['keterangan']);
        $sheet->setCellValue('D' . $row, $item['jumlah']);
        $totalMasuk += $item['jumlah'];
        $row++;
    }

    $sheet->setCellValue('C' . $row, 'Total Kas Masuk');
    $sheet->setCellValue('D' . $row, $totalMasuk);
    $row += 2;

    // Header Kas Keluar
    $sheet->setCellValue('A' . $row, 'KAS KELUAR');
    $row++;
    $sheet->fromArray(['No', 'Tanggal', 'Keterangan', 'Jumlah'], NULL, 'A' . $row);
    $row++;

    $no = 1;
    $totalKeluar = 0;
    foreach ($kasKeluar as $item) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $item['tanggal']);
        $sheet->setCellValue('C' . $row, $item['keterangan']);
        $sheet->setCellValue('D' . $row, $item['jumlah']);
        $totalKeluar += $item['jumlah'];
        $row++;
    }

    $sheet->setCellValue('C' . $row, 'Total Kas Keluar');
    $sheet->setCellValue('D' . $row, $totalKeluar);
    $row += 2;

    $sheet->setCellValue('C' . $row, 'Saldo Akhir');
    $sheet->setCellValue('D' . $row, $totalMasuk - $totalKeluar);

    // Set Header untuk download
    $filename = 'Laporan-Keuangan-' . date('Ymd') . '.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}

protected $kasMasukModel;
protected $kasKeluarModel;

public function __construct()
{
    $this->kasMasukModel = new KasMasukModel();
    $this->kasKeluarModel = new KasKeluarModel();
}


}