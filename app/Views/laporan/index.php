<?= $this->extend('layouts/template_admin') ?>
<?= $this->section('content') ?>

<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0">Laporan Keuangan</h1>
  </div>
</div>

<div class="content">
  <div class="container-fluid">

    <form method="post" action="<?= base_url('laporan') ?>" class="row g-3 mb-4">
      <div class="col-md-3">
        <label for="tanggal_awal" class="form-label">Dari Tanggal</label>
        <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control" value="<?= esc($tanggal_awal) ?>">
      </div>
      <div class="col-md-3">
        <label for="tanggal_akhir" class="form-label">Sampai Tanggal</label>
        <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" value="<?= esc($tanggal_akhir) ?>">
      </div>
      <div class="col-md-3 align-self-end">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-search"></i> Tampilkan
        </button>
      </div>
    </form>

    <div class="mb-3">
  <a href="<?= base_url('laporan/pdf?tanggal_awal=' . $tanggal_awal . '&tanggal_akhir=' . $tanggal_akhir) ?>" class="btn btn-danger me-2" target="_blank">
    <i class="fas fa-file-pdf"></i> Export PDF
  </a>
  <a href="<?= base_url('laporan/excel?tanggal_awal=' . $tanggal_awal . '&tanggal_akhir=' . $tanggal_akhir) ?>" class="btn btn-success" target="_blank">
    <i class="fas fa-file-excel"></i> Export Excel
  </a>
</div>

    <div class="card mb-4">
      <div class="card-header bg-success text-white">
        <i class="fas fa-arrow-down"></i> Kas Masuk
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-striped mb-0">
            <thead class="text-center bg-light">
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php $totalMasuk = 0; ?>
              <?php foreach ($kasMasuk as $i => $item): ?>
                <tr>
                  <td class="text-center"><?= $i + 1 ?></td>
                  <td><?= date('d/m/Y', strtotime($item['tanggal'])) ?></td>
                  <td><?= esc($item['keterangan']) ?></td>
                  <td class="text-end">Rp<?= number_format($item['jumlah'], 0, ',', '.') ?></td>
                </tr>
                <?php $totalMasuk += $item['jumlah']; ?>
              <?php endforeach; ?>
              <tr class="fw-bold">
                <td colspan="3" class="text-end">Total Kas Masuk</td>
                <td class="text-end">Rp<?= number_format($totalMasuk, 0, ',', '.') ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header bg-danger text-white">
        <i class="fas fa-arrow-up"></i> Kas Keluar
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-striped mb-0">
            <thead class="text-center bg-light">
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php $totalKeluar = 0; ?>
              <?php foreach ($kasKeluar as $i => $item): ?>
                <tr>
                  <td class="text-center"><?= $i + 1 ?></td>
                  <td><?= date('d/m/Y', strtotime($item['tanggal'])) ?></td>
                  <td><?= esc($item['keterangan']) ?></td>
                  <td class="text-end">Rp<?= number_format($item['jumlah'], 0, ',', '.') ?></td>
                </tr>
                <?php $totalKeluar += $item['jumlah']; ?>
              <?php endforeach; ?>
              <tr class="fw-bold">
                <td colspan="3" class="text-end">Total Kas Keluar</td>
                <td class="text-end">Rp<?= number_format($totalKeluar, 0, ',', '.') ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="alert alert-info fw-bold fs-5">
      <i class="fas fa-balance-scale"></i> Saldo Akhir: Rp<?= number_format($totalMasuk - $totalKeluar, 0, ',', '.') ?>
    </div>

  </div>
</div>

<?= $this->endSection() ?>