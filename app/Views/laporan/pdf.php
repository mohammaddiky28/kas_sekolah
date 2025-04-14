<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    th { background-color: #f0f0f0; }
  </style>
</head>
<body>

  <h2 style="text-align:center;">Laporan Keuangan</h2>
  <p>Periode: <?= date('d/m/Y', strtotime($tanggal_awal)) ?> - <?= date('d/m/Y', strtotime($tanggal_akhir)) ?></p>

  <h3>Kas Masuk</h3>
  <table>
    <thead>
      <tr><th>No</th><th>Tanggal</th><th>Keterangan</th><th>Jumlah</th></tr>
    </thead>
    <tbody>
      <?php $totalMasuk = 0; foreach ($kasMasuk as $i => $item): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= date('d/m/Y', strtotime($item['tanggal'])) ?></td>
          <td><?= esc($item['keterangan']) ?></td>
          <td>Rp<?= number_format($item['jumlah'], 0, ',', '.') ?></td>
        </tr>
        <?php $totalMasuk += $item['jumlah']; ?>
      <?php endforeach; ?>
      <tr>
        <th colspan="3">Total Kas Masuk</th>
        <th>Rp<?= number_format($totalMasuk, 0, ',', '.') ?></th>
      </tr>
    </tbody>
  </table>

  <h3>Kas Keluar</h3>
  <table>
    <thead>
      <tr><th>No</th><th>Tanggal</th><th>Keterangan</th><th>Jumlah</th></tr>
    </thead>
    <tbody>
      <?php $totalKeluar = 0; foreach ($kasKeluar as $i => $item): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= date('d/m/Y', strtotime($item['tanggal'])) ?></td>
          <td><?= esc($item['keterangan']) ?></td>
          <td>Rp<?= number_format($item['jumlah'], 0, ',', '.') ?></td>
        </tr>
        <?php $totalKeluar += $item['jumlah']; ?>
      <?php endforeach; ?>
      <tr>
        <th colspan="3">Total Kas Keluar</th>
        <th>Rp<?= number_format($totalKeluar, 0, ',', '.') ?></th>
      </tr>
    </tbody>
  </table>

  <h4>Saldo Akhir: Rp<?= number_format($totalMasuk - $totalKeluar, 0, ',', '.') ?></h4>

</body>
</html>
