<?= $this->extend('layouts/template_admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
  <h1 class="mt-3">Laporan Keuangan</h1>
  <p>Periode: <?= date('d/m/Y', strtotime($tanggalAwal)) ?> - <?= date('d/m/Y', strtotime($tanggalAkhir)) ?></p>

  <h4 class="mt-4">Kas Masuk</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php $totalMasuk = 0; $no = 1; foreach ($kasMasuk as $masuk): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= date('d/m/Y', strtotime($masuk['tanggal'])) ?></td>
          <td><?= esc($masuk['keterangan']) ?></td>
          <td>Rp<?= number_format($masuk['jumlah'], 0, ',', '.') ?></td>
        </tr>
        <?php $totalMasuk += $masuk['jumlah']; ?>
      <?php endforeach ?>
      <tr>
        <th colspan="3" class="text-end">Total Kas Masuk</th>
        <th>Rp<?= number_format($totalMasuk, 0, ',', '.') ?></th>
      </tr>
    </tbody>
  </table>

  <h4 class="mt-5">Kas Keluar</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php $totalKeluar = 0; $no = 1; foreach ($kasKeluar as $keluar): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= date('d/m/Y', strtotime($keluar['tanggal'])) ?></td>
          <td><?= esc($keluar['keterangan']) ?></td>
          <td>Rp<?= number_format($keluar['jumlah'], 0, ',', '.') ?></td>
        </tr>
        <?php $totalKeluar += $keluar['jumlah']; ?>
      <?php endforeach ?>
      <tr>
        <th colspan="3" class="text-end">Total Kas Keluar</th>
        <th>Rp<?= number_format($totalKeluar, 0, ',', '.') ?></th>
      </tr>
    </tbody>
  </table>

  <div class="mt-4">
    <h5>Saldo Akhir: 
      Rp<?= number_format($totalMasuk - $totalKeluar, 0, ',', '.') ?>
    </h5>
  </div>
</div>

<?= $this->endSection() ?>
