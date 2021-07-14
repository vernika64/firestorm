<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1><?= $judul; ?></h1>

<table class="table">
    <thead>

        <tr>
            <th>#</th>
            <th>Judul Laporan</th>
            <th>User Pembuat</th>
            <th>Divisi Dituju</th>
            <!-- <th>Aksi</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $n = 1;
        foreach ($lslap as $l) :
        ?>
            <tr>
                <td><?= $n++; ?></td>
                <td><?= $l['judul_laporan']; ?></td>
                <td><?= $l['nama']; ?></td>
                <td><?= $l['nama_divisi']; ?></td>
                <!-- <td><button class="btn btn-sm btn-primary">Detail</button></td> -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?= $this->endSection(); ?>