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
            <th>Aksi</th>
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
                <td>
                    <?php
                    $this->modelDiv = new \App\Models\ModelDivisi();
                    $nmdiv = $this->modelDiv->where(['kd_divisi' => $x['kd_divisi']])->findColumn('nama_divisi');
                    echo implode("|", $nmdiv);
                    ?>
                </td>
                <td><a class="btn btn-danger">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<?= $this->endSection(); ?>