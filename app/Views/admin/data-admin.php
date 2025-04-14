<?= $this->extend('layouts/template_admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Admin</h4>
    <a href="<?= base_url('admin/tambah-admin') ?>" class="btn btn-primary">
      <i class="fas fa-plus me-1"></i> Tambah Admin
    </a>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-light">
          <tr>
            <th width="50">#</th>
            <th>Username</th>
            <th>Nama Admin</th>
            <th width="150">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($admin as $row) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($row['username']) ?></td>
              <td><?= esc($row['nama_admin']) ?></td>
              <td>
                <a href="<?= base_url('admin/edit-admin/' . $row['id']) ?>" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="<?= base_url('admin/delete-admin/' . $row['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                  <?= csrf_field() ?>
                  <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
