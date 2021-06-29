<?= $this->extend('addons/cpanel_layout.php'); ?>

<?= $this->section('konten'); ?>

<h1>Status Laporan</h1>

<div class="container-fluid">

    <table class="table">
        <thead>
            <tr>
                <th>No #</th>
                <th>Nama Laporan</th>
                <th>Tanggal Input</th>
                <th>Tembusan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($laporan as $l) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $l['judul_laporan']; ?></td>
                    <td><?= $l['tgl_lap_masuk']; ?></td>
                    <td>
                        <?php
                        $this->modelDiv = new \App\Models\ModelDivisi();
                        $nmdiv = $this->modelDiv->where(['kd_divisi' => $l['kd_divisi']])->findColumn('nama_divisi');
                        echo implode("|", $nmdiv);
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($l['status'] == 0) {
                            echo "Menunggu Validasi";
                        } else if ($l['status'] == 1) {
                            echo "Sudah Divalidasi, Menunggu Keputusan Acc";
                        } else if ($l['status'] == 2) {
                            echo "Laporan Diterima";
                        } else if ($l['status'] == 3) {
                            echo "Laporan Ditolak";
                        }
                        ?>
                    </td>
                    <td><button class="btn btn-primary">Detail</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection(); ?>