<?php

namespace App\Controllers;

use App\Models\KasMasukModel;
use CodeIgniter\Controller;

class KasMasuk extends Controller
{
    protected $kasMasukModel;

    public function __construct()
    {
        $this->kasMasukModel = new KasMasukModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kas Masuk',
            'kasMasuk' => $this->kasMasukModel->orderBy('tanggal', 'DESC')->findAll()
        ];

        return view('kas_masuk/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kas Masuk',
            'validation' => \Config\Services::validation()
        ];

        return view('kas_masuk/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required|numeric'
        ])) {
            return redirect()->to('/kasmasuk/create')->withInput()->with('validation', $this->validator);
        }

        $this->kasMasukModel->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jumlah' => $this->request->getPost('jumlah'),
        ]);

        return redirect()->to('/kasmasuk')->with('success', 'Data kas masuk berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $this->kasMasukModel->delete($id);
        return redirect()->to('/kasmasuk')->with('success', 'Data kas masuk berhasil dihapus.');
    }
}