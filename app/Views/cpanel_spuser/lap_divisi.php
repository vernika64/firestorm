<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1><?= $judul; ?></h1>

<?php
if (session()->getFlashdata('pesan')) :
?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('pesan'); ?>
    </div>

<?php endif;
if (session()->getFlashdata('error')) :
?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php
endif;

?>

<button class="btn btn-primary" style="margin-top: 20px;margin-bottom: 40px;" data-toggle="modal" data-target="#buatbatu">Buat Divisi Baru</button>

<div class="modal fade" id="buatbatu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Divisi Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/cpanelsuper/buatDivisi" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Divisi</label>
                        <input type="text" name="kd_div" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Divisi</label>
                        <input type="text" name="nama_div" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No#</th>
            <th>Kode Divisi</th>
            <th>Nama Divisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($tabel as $max) : ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $max['kd_divisi']; ?></td>
                <td><?= $max['nama_divisi']; ?></td>
                <td>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hp-<?= $max['kd_divisi']; ?>">Hapus</button>
                    <div class="modal fade" tabindex="-1" id="hp-<?= $max['kd_divisi']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Attention</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus divisi ini ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="/cpanelsuper/hapusDivisi?id=<?= $max['kd_divisi']; ?>" class="btn btn-primary">Hapus</a>
                                    <!-- <button type="button" class="btn btn-primary">Hapus</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>