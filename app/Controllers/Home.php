<?php

namespace App\Controllers;

use App\Models\KasMasukModel;
use App\Models\KasKeluarModel;

class Home extends BaseController
{
    public function index()
    {
        $kasMasukModel = new KasMasukModel();
        $kasKeluarModel = new KasKeluarModel();

        $kasMasuk = $kasMasukModel->selectSum('jumlah')->first()['jumlah'] ?? 0;
        $kasKeluar = $kasKeluarModel->selectSum('jumlah')->first()['jumlah'] ?? 0;
        $saldo = $kasMasuk - $kasKeluar;

        $data = [
            'kasMasuk' => $kasMasuk,
            'kasKeluar' => $kasKeluar,
            'saldo' => $saldo,
            'dataKasMasuk' => $kasMasukModel->orderBy('tanggal', 'DESC')->findAll(),
            'dataKasKeluar' => $kasKeluarModel->orderBy('tanggal', 'DESC')->findAll(),
        ];

        return view('public/beranda', $data);
    }
}