<?= $this->extend('layouts/template_admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="mt-4 mb-4">Data Kas Masuk</h1>

    <a href="<?= base_url('/kas-masuk/create'); ?>" class="btn btn-success mb-3">+ Tambah Kas Masuk</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($kas_masuk)) : ?>
                <?php $no = 1; foreach ($kas_masuk as $kas) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y', strtotime($kas['tanggal'])); ?></td>
                        <td><?= esc($kas['keterangan']); ?></td>
                        <td>Rp <?= number_format($kas['jumlah'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="<?= base_url('/kas-masuk/edit/' . $kas['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('/kas-masuk/delete/' . $kas['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data kas masuk.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>