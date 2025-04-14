<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Kas Sekolah' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/bootstrap/css/bootstrap.min.css') ?>">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?= $this->include('layouts/navbar') ?>

  <!-- Sidebar -->
  <?= $this->include('layouts/sidebar') ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Flash Message -->
    <section class="content-header">
      <div class="container-fluid">
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
      </div>
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        <?= $this->renderSection('content') ?>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <?= $this->include('layouts/footer') ?>

</div>

<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>

</body>
</html>