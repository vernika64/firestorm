<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1 style="margin-bottom: 40px;"><?= $judul; ?></h1>

<?php
if (session()->getFlashdata('pesan')) :
?>
    <div class="alert alert-warning" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif;
if (session()->getFlashdata('error')) :
?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

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
                <td><?= $no; ?></td>
                <td><?= $x['tgl_lap_masuk']; ?></td>
                <td><?= $x['nama']; ?></td>
                <td><?= $x['judul_laporan']; ?></td>
                <td><?= $x['nama_divisi']; ?></td>
                <td><button class="btn btn-sm btn-primary" data-target="#list-<?= $no; ?>" data-toggle="modal">Detail</button></td>
                <div class="modal fade" id="list-<?= $no++; ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/cpanelsuper/laporan_konfirm_acc" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="kdlap" class="form-control" value="<?= $x['kode_laporan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Laporan</label>
                                        <input type="text" class="form-control" value="<?= $x['judul_laporan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Laporan</label>
                                        <textarea type="text" class="form-control" rows="3" style="height: 200px !important; resize: none;" readonly><?= $x['desc_laporan']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Divisi Tujuan</label>
                                        <input type="text" class="form-control" value="<?= $x['nama_divisi']; ?>" readonly>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <input type="submit" name="konfirm" value="Terima" class="btn btn-warning">
                                    <input type="submit" name="konfirm" value="Tolak" class="btn btn-danger">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<?= $this->endSection(); ?>