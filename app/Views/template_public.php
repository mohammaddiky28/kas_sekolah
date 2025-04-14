<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Sistem Kas Sekolah') ?></title>

  <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
</head>
<body>

  <!-- Konten Halaman -->
  <main class="container py-4">
    <?= $this->renderSection('content') ?>
  </main>

  <footer class="text-center py-3 text-muted small">
    &copy; <?= date('Y') ?> Sistem Kas Sekolah.
  </footer>

  <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>