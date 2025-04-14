<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'auto_increment' => true],
            'nama_kegiatan'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'tanggal'        => ['type' => 'DATE'],
            'deskripsi'      => ['type' => 'TEXT'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan');
    }
}