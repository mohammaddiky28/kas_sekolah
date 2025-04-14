<?php

namespace App\Controllers;

use App\Models\KasMasukModel;
use App\Models\KasKeluarModel;

class Beranda extends BaseController
{
    public function index()
    {
        $kasMasukModel = new KasMasukModel();
        $kasKeluarModel = new KasKeluarModel();

        // Total kas
        $kasMasuk = $kasMasukModel->selectSum('jumlah')->first()['jumlah'] ?? 0;
        $kasKeluar = $kasKeluarModel->selectSum('jumlah')->first()['jumlah'] ?? 0;
        $saldo = $kasMasuk - $kasKeluar;

        // Data grafik kas masuk
        $dataKasMasuk = $kasMasukModel->select('keterangan, jumlah')->findAll();

        // Data grafik kas keluar
        $dataKasKeluar = $kasKeluarModel->select('keterangan, jumlah')->findAll();

        $data = [
            'title' => 'Halaman Utama',
            'kasMasuk' => $kasMasuk,
            'kasKeluar' => $kasKeluar,
            'saldo' => $saldo,
            'dataKasMasuk' => $dataKasMasuk,
            'dataKasKeluar' => $dataKasKeluar,
        ];

        return view('public/beranda', $data);
    }
}