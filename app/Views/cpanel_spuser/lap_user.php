<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1><?= $judul; ?></h1>

<style>
    .btn-group-vertical>button {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
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
                <td>
                    <div class="btn-group-vertical">
                        <button class="btn btn-primary btn-sm" style="color: #FFF;" data-toggle="modal" data-target="#detail-<?= $w['kode_identitas']; ?>">Detail</button>
                        <button class="btn btn-danger btn-sm" style="color: #FFF;" data-toggle="modal" data-target="#hapus-<?= $w['kode_identitas']; ?>">Hapus</button>

                        <!-- Untuk Popup Detail -->
                        <div class="modal fade" tabindex="-1" role="dialog" id="detail-<?= $w['kode_identitas'] ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Modal body text goes here.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Untuk Popup Delete -->
                        <div class="modal fade" tabindex="-1" role="dialog" id="hapus-<?= $w['kode_identitas'] ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin untuk menghapus user ini ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal -->
                    </div>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?= $this->endSection(); ?>