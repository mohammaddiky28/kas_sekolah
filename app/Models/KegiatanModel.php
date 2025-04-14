<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kegiatan', 'tanggal', 'deskripsi', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = ''; // tidak menggunakan updated_at
}