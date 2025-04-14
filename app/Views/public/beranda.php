<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Beranda' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    body {
      padding-bottom: 100px; /* untuk ruang footer */
      position: relative;
      min-height: 100vh;
    }
    .logo {
      height: 50px;
    }
    .admin-btn {
      white-space: nowrap;
    }
    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      color: #eee;
      text-align: center;
      padding: 12px 0;
    }
    .theme-toggle {
      position: fixed;
      top: 10px;
      right: 10px;
      z-index: 999;
    }
    .school-name {
      font-size: 0.9rem;
      color: #aaa;
      margin-top: 2px;
    }
    @media (max-width: 576px) {
      .logo {
        height: 40px;
      }
      .title-text {
        font-size: 1rem;
      }
      .school-name {
        font-size: 0.8rem;
      }
    }
  </style>
</head>
<body>

<!-- Toggle Theme Button -->
<button class="btn btn-secondary theme-toggle d-flex align-items-center btn-sm" id="toggleTheme">
  <i data-lucide="sun" id="themeIcon" class="me-1" style="width: 16px; height: 16px;"></i> Mode
</button>

<div class="container mt-4 animate__animated animate__fadeIn">
  <!-- Header -->
  <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mb-3">
    <div class="d-flex flex-column flex-sm-row align-items-center mb-2 mb-sm-0">
      <img src="<?= base_url('images/logo.jpg') ?>" alt="Logo Sekolah" class="logo me-sm-2 mb-2 mb-sm-0">
      <div class="text-center text-sm-start">
        <h5 class="mb-0 title-text">Sistem Informasi Keuangan Kas Sekolah</h5>
        <div class="school-name">SMK Tadika Pertiwi</div>
      </div>
    </div>
    <a href="<?= base_url('admin/login') ?>" class="btn btn-outline-primary admin-btn d-flex align-items-center">
      <i data-lucide="log-in" class="me-1"></i> Admin
    </a>
  </div>

  <!-- Tanggal -->
  <div class="text-end text-muted small mb-2">
    <i data-lucide="calendar" class="me-1" style="width: 16px;"></i>
    <?= date('l, d F Y') ?>
  </div>

  <hr>

  <!-- Kas Info -->
  <div class="row g-3 text-center mb-4">
    <div class="col-12 col-md-4">
      <div class="card border-success shadow-sm animate__animated animate__fadeInUp">
        <div class="card-body text-success">
          <i data-lucide="arrow-down-circle" class="mb-1"></i>
          <h6>Kas Masuk</h6>
          <p class="fw-bold">Rp <?= number_format($kasMasuk, 0, ',', '.') ?></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card border-danger shadow-sm animate__animated animate__fadeInUp animate__delay-1s">
        <div class="card-body text-danger">
          <i data-lucide="arrow-up-circle" class="mb-1"></i>
          <h6>Kas Keluar</h6>
          <p class="fw-bold">Rp <?= number_format($kasKeluar, 0, ',', '.') ?></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card border-primary shadow-sm animate__animated animate__fadeInUp animate__delay-2s">
        <div class="card-body text-primary">
          <i data-lucide="wallet" class="mb-1"></i>
          <h6>Saldo Kas</h6>
          <p class="fw-bold">Rp <?= number_format($saldo, 0, ',', '.') ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- QRIS -->
  <div class="text-center mb-4">
    <img src="<?= base_url('images/qris.png') ?>" alt="QRIS Pembayaran" class="img-fluid" style="max-height: 200px;">
    <p class="text-muted mt-2">Scan QRIS untuk pembayaran atau donasi</p>
  </div>

  <!-- Keterangan Kas Masuk -->
  <div class="card mb-3 shadow-sm animate__animated animate__fadeInLeft">
    <div class="card-header bg-success text-white">
      <i data-lucide="file-plus" class="me-1"></i> Keterangan Kas Masuk
    </div>
    <div class="card-body">
      <?php if (!empty($dataKasMasuk)) : ?>
        <ul class="list-group list-group-flush">
          <?php foreach ($dataKasMasuk as $item) : ?>
            <li class="list-group-item d-flex justify-content-between">
              <span><?= esc($item['keterangan']) ?></span>
              <span class="text-success fw-bold">Rp <?= number_format($item['jumlah'], 0, ',', '.') ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <p class="text-muted">Belum ada data kas masuk.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Keterangan Kas Keluar -->
  <div class="card mb-5 shadow-sm animate__animated animate__fadeInRight">
    <div class="card-header bg-danger text-white">
      <i data-lucide="file-minus" class="me-1"></i> Keterangan Kas Keluar
    </div>
    <div class="card-body">
      <?php if (!empty($dataKasKeluar)) : ?>
        <ul class="list-group list-group-flush">
          <?php foreach ($dataKasKeluar as $item) : ?>
            <li class="list-group-item d-flex justify-content-between">
              <span><?= esc($item['keterangan']) ?></span>
              <span class="text-danger fw-bold">Rp <?= number_format($item['jumlah'], 0, ',', '.') ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <p class="text-muted">Belum ada data kas keluar.</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="footer">
  <small>&copy; <?= date('Y') ?> Sistem Informasi Keuangan Kas Sekolah. All rights reserved.</strong> Dibuat oleh <a href="https://github.com/nama-kamu" target="_blank">Mohammad Diky Pradana</small>
</footer>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  lucide.createIcons();

  const toggleBtn = document.getElementById('toggleTheme');
  const themeIcon = document.getElementById('themeIcon');
  const htmlTag = document.documentElement;

  // Load saved mode
  if (localStorage.getItem('theme') === 'light') {
    htmlTag.setAttribute('data-bs-theme', 'light');
    themeIcon.setAttribute('data-lucide', 'moon');
    lucide.createIcons();
  }

  toggleBtn.addEventListener('click', () => {
    const current = htmlTag.getAttribute('data-bs-theme');
    const newTheme = current === 'dark' ? 'light' : 'dark';
    htmlTag.setAttribute('data-bs-theme', newTheme);
    themeIcon.setAttribute('data-lucide', newTheme === 'dark' ? 'sun' : 'moon');
    lucide.createIcons();
    localStorage.setItem('theme', newTheme);
  });
</script>

</body>
</html>