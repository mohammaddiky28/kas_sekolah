<?php

namespace App\Models;

use CodeIgniter\Model;

class KasMasukModel extends Model
{
    protected $table = 'kas_masuk';
    protected $primaryKey = 'id';

    protected $allowedFields = ['tanggal', 'keterangan', 'jumlah', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = ''; // Kosong karena tidak ada kolom `updated_at`

    protected $validationRules = [
        'tanggal'    => 'required|valid_date',
        'keterangan' => 'required|string',
        'jumlah'     => 'required|numeric'
    ];

    protected $validationMessages = [
        'tanggal'    => ['required' => 'Tanggal wajib diisi.'],
        'keterangan' => ['required' => 'Keterangan wajib diisi.'],
        'jumlah'     => ['required' => 'Jumlah wajib diisi.', 'numeric' => 'Jumlah harus berupa angka.']
    ];
}