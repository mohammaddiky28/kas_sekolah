<?= $this->extend('layouts/template_admin') ?>
<?= $this->section('content') ?>

<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0"><i class="fas fa-tachometer-alt text-primary"></i> Dashboard</h1>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="content">
  <div class="container-fluid">

    <!-- Ringkasan Kas -->
    <div class="row">

      <div class="col-md-4 col-sm-6 mb-3">
        <div class="small-box bg-success shadow">
          <div class="inner">
            <h4>Rp<?= number_format($totalKasMasuk ?? 0, 0, ',', '.') ?></h4>
            <p>Total Kas Masuk</p>
          </div>
          <div class="icon"><i class="fas fa-arrow-down"></i></div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 mb-3">
        <div class="small-box bg-danger shadow">
          <div class="inner">
            <h4>Rp<?= number_format($totalKasKeluar ?? 0, 0, ',', '.') ?></h4>
            <p>Total Kas Keluar</p>
          </div>
          <div class="icon"><i class="fas fa-arrow-up"></i></div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 mb-3">
        <div class="small-box bg-info shadow">
          <div class="inner">
            <h4>Rp<?= number_format($saldoKas ?? 0, 0, ',', '.') ?></h4>
            <p>Saldo Kas</p>
          </div>
          <div class="icon"><i class="fas fa-wallet"></i></div>
        </div>
      </div>

    </div>

    <!-- Transaksi Terakhir -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-secondary shadow">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-history"></i> 5 Transaksi Terakhir</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-bordered m-0">
              <thead class="bg-light">
                <tr>
                  <th>Tanggal</th>
                  <th>Jenis</th>
                  <th>Keterangan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($transaksiTerakhir)) : ?>
                  <?php foreach ($transaksiTerakhir as $row) : ?>
                    <tr>
                      <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
                      <td>
                        <span class="badge bg-<?= $row['jenis'] == 'masuk' ? 'success' : 'danger' ?>">
                          <?= ucfirst($row['jenis']) ?>
                        </span>
                      </td>
                      <td><?= $row['keterangan'] ?></td>
                      <td>Rp<?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                    </tr>
                  <?php endforeach ?>
                <?php else : ?>
                  <tr>
                    <td colspan="4" class="text-center">Belum ada transaksi.</td>
                  </tr>
                <?php endif ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
