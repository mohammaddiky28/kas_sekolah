<?= $this->extend('layouts/template_admin') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4 class="mb-3 text-center">Edit Kas Keluar</h4>

      <div class="card shadow">
        <div class="card-header bg-warning text-dark">
          Form Edit Kas Keluar
        </div>
        <div class="card-body">
          <form action="<?= base_url('kas-keluar/update/' . $kas['id']) ?>" method="post">
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $kas['tanggal'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan</label>
              <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $kas['keterangan'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah</label>
              <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?= $kas['jumlah'] ?>" required>
            </div>

            <div class="d-flex justify-content-between">
              <a href="<?= base_url('kas-keluar') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>
              <button type="submit" class="btn btn-warning text-dark">
                <i class="fas fa-save"></i> Update
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
