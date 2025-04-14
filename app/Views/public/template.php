<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Sistem Kas Sekolah' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .card-kas {
      border-left: 5px solid;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .kas-masuk { border-color: green; }
    .kas-keluar { border-color: red; }
    .saldo { border-color: #0dcaf0; }
  </style>
</head>
<body>
  <div class="container py-4">
  <header class="mb-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <!-- Logo & Judul -->
    <div class="d-flex align-items-center">
    <img src="<?= base_url('images/logo.jpg') ?>" alt="Logo Sekolah" style="height: 60px; object-fit: contain;">
      <div>
        <h4 class="mb-0 fw-bold">Sistem Informasi Kas Sekolah</h4>
        <small class="text-muted">SMK Tadika Pertiwi - Monitoring kas masuk, kas keluar, dan saldo real-time</small>
      </div>
    </div>

    <!-- Tombol Admin -->
    <div>
      <a href="<?= base_url('admin') ?>" class="btn btn-outline-primary">
        <i class="bi bi-person-circle"></i> Admin
      </a>
    </div>
  </div>
  <hr>
</header>

    <?= $this->renderSection('content') ?>
  </div>
</body>
</html>