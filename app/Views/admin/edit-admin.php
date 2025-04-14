<?= $this->extend('layouts/template_admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
  <h4 class="mb-4">Edit Admin</h4>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <form action="<?= base_url('admin/update-admin/' . $admin['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?= esc($admin['username']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password (biarkan kosong jika tidak diubah)</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3">
          <label for="nama_admin" class="form-label">Nama Admin</label>
          <input type="text" name="nama_admin" id="nama_admin" class="form-control" value="<?= esc($admin['nama_admin']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save me-1"></i> Update
        </button>
        <a href="<?= base_url('admin/data-admin') ?>" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
