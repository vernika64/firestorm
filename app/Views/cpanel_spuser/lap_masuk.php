<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1><?= $judul; ?></h1>
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
                <td><?= $no++; ?></td>
                <td><?= $x['tgl_lap_masuk']; ?></td>
                <td><?= $x['nama']; ?></td>
                <td><?= $x['judul_laporan']; ?></td>
                <td><?= $x['nama_divisi']; ?></td>
                <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#list-<?= $x['kode_laporan']; ?>">Detail</button></td>
                <!-- Kotak Modal -->

                <div class="modal fade" id="list-<?= $x['kode_laporan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/cpanelsuper/laporan_masuk_teruskan" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="lap_id" value="<?= $x['kode_laporan']; ?>" class="form-control" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Laporan</label>
                                        <input type="text" value="<?= $x['judul_laporan']; ?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" rows="4" style="height: 300px !important; resize: none;" readonly><?= $x['desc_laporan']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Lembaga yang dituju</label>
                                        <select class="form-control" name="divisi">
                                            <?php
                                            foreach ($divs as $m) {


                                            ?>
                                                <option value="<?= $m['kd_divisi']; ?>"><?= $m['nama_divisi']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="teruskan" class="btn btn-primary" value="Teruskan">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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