<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1><?= $judul; ?></h1>

<table class="table">
    <thead>

        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>E-Mail</th>
            <th>Aksi</th>
        </tr>

    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($pendaftar as $w) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $w['nama']; ?></td>
                <td><?= $w['email']; ?></td>
                <td><a class="btn btn-danger">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?= $this->endSection(); ?>