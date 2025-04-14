<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - Sistem Kas Sekolah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    body {
      background: linear-gradient(135deg, #007bff, #5a5a5a);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .login-box {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      max-width: 400px;
      width: 100%;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      animation: fadeInDown 0.8s ease;
    }

    .login-box img {
      height: 80px;
      margin-bottom: 10px;
    }

    .login-box h4 {
      font-weight: bold;
    }

    .form-control::placeholder {
      font-size: 0.9rem;
    }

    .footer {
      margin-top: auto;
      background: linear-gradient(90deg, #1a73e8, #00c6ff);
      color: #fff;
      width: 100%;
      text-align: center;
      padding: 12px 0;
      font-size: 0.9rem;
      position: fixed;
      bottom: 0;
      left: 0;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
    }

    .toggle-password {
      cursor: pointer;
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 576px) {
      .login-box {
        padding: 1.5rem;
      }

      .login-box h4 {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>

  <!-- Login Box -->
  <div class="login-box text-center animate__animated animate__fadeIn">
    <img src="<?= base_url('images/logo3.jpg') ?>" alt="Logo Sekolah">
    <h4>Sistem Kas Sekolah</h4>
    <p class="text-muted mb-3">Login Admin</p>

    <!-- Alert Success -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <!-- Alert Error -->
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/login') ?>" method="post">
      <div class="mb-3 text-start">
        <label for="username" class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text"><i data-lucide="user"></i></span>
          <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
        </div>
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i data-lucide="lock"></i></span>
          <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
          <span class="input-group-text toggle-password" onclick="togglePassword()"><i data-lucide="eye" id="eyeIcon"></i></span>
        </div>
      </div>

      <button type="submit" class="btn btn-primary w-100 mb-2">
        <i data-lucide="log-in" class="me-1" style="width: 18px;"></i> Login
      </button>

      <!-- Tombol Kembali ke Beranda -->
      <a href="http://localhost/kas_sekolah/" class="btn btn-outline-secondary w-100">
        <i data-lucide="home" class="me-1" style="width: 18px;"></i> Kembali ke Beranda
      </a>
    </form>
  </div>

  <!-- Footer -->
  <footer class="footer">
    &copy; <?= date('Y') ?> Sistem Informasi Keuangan Kas Sekolah </strong> Dibuat oleh <a href="https://github.com/nama-kamu" target="_blank">Mohammad Diky Pradana</a>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    lucide.createIcons();

    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.setAttribute('data-lucide', 'eye-off');
      } else {
        passwordInput.type = 'password';
        eyeIcon.setAttribute('data-lucide', 'eye');
      }

      lucide.createIcons(); // Refresh icon
    }
  </script>

</body>
</html>
