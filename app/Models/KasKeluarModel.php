<?php

namespace App\Models;

use CodeIgniter\Model;

class KasKeluarModel extends Model
{
    protected $table = 'kas_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'keterangan', 'jumlah', 'created_at'];
    protected $useTimestamps = false;
}