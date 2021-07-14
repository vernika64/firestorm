<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1><?= $judul; ?></h1>

<table class="table">
    <thead>

        <tr>
            <th>#</th>
            <th>Tanggal Masuk</th>
            <th>Nama Pelapor</th>
            <th>Laporan</th>
            <th>Tembusan</th>
        </tr>

    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($lpm as $x) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $x['tgl_lap_masuk']; ?></td>
                <td><?= $x['nama']; ?></td>
                <td><?= $x['judul_laporan']; ?></td>
                <td><?= $x['nama_divisi']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<?= $this->endSection(); ?>