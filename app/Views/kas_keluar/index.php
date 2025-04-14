<?= $this->extend('layouts/template_admin') ?>
<?= $this->section('content') ?>

<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Kas Keluar</h1>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <a href="<?= base_url('kas-keluar/create') ?>" class="btn btn-primary mb-3">
      <i class="fas fa-plus"></i> Tambah Kas Keluar
    </a>

    <div class="card">
      <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-striped">
          <thead class="text-center bg-light">
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($kaskeluar)): ?>
              <tr>
                <td colspan="5" class="text-center">Belum ada data kas keluar.</td>
              </tr>
            <?php else: ?>
              <?php $no = 1; foreach ($kaskeluar as $item): ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= date('d/m/Y', strtotime($item['tanggal'])) ?></td>
                  <td><?= esc($item['keterangan']) ?></td>
                  <td>Rp<?= number_format($item['jumlah'], 0, ',', '.') ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('kas-keluar/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('kas-keluar/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>