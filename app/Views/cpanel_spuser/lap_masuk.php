<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1><?= $judul; ?></h1>

<table class="table">
    <thead>

        <tr>
            <th>#</th>
            <th>Tanggal Masuk</th>
            <th>Identitas</th>
            <th>Laporan</th>
            <th>Tembusan</th>
            <th>Aksi</th>
        </tr>

    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($lpm as $x) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $x['tgl_lap_masuk']; ?></td>
                <td><?= $x['kode_identitas']; ?></td>
                <td><?= $x['judul_laporan']; ?></td>
                <td><?= $x['kd_divisi']; ?></td>
                <td><a class="btn btn-danger">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<?= $this->endSection(); ?>