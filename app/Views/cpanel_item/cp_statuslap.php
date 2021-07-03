<?= $this->extend('addons/cpanel_layout.php'); ?>

<?= $this->section('konten'); ?>

<h1>Status Laporan</h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-warning" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="container-fluid">

    <table class="table">
        <thead>
            <tr>
                <th>No #</th>
                <th>Nama Laporan</th>
                <!-- <th>Tanggal Input</th> -->
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
                    <td><?= $no; ?></td>
                    <td><?= $l['judul_laporan']; ?></td>
                    <!-- <td><?= $l['tgl_lap_masuk']; ?></td> -->
                    <td>
                        <?php
                        $this->modelDiv = new \App\Models\ModelDivisi();
                        $nmdiv = $this->modelDiv->where(['kd_divisi' => $l['kd_divisi']])->findColumn('nama_divisi');

                        $ss = implode("|", $nmdiv);
                        echo $ss;
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
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#list-<?= $no; ?>">Detail</button>

                        <div class="modal fade" id="list-<?= $no++; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Judul Laporan</label>
                                            <input type="text" value="<?= $l['judul_laporan']; ?>" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" rows="4" style="height: 300px !important; resize: none;" readonly><?= $l['desc_laporan']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Lembaga yang dituju</label>
                                            <input type="text" value="<?= $ss; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection(); ?>