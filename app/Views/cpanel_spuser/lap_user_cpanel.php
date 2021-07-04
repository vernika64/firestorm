<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1><?= $nama; ?></h1>
<style>
    .btn-group-vertical>button {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
<table class="table">
    <thead>
        <tr>
            <td>No#</td>
            <td>Nama</td>
            <td>Divisi</td>
            <td>Level</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($datauser as $k) :
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $k['nama']; ?></td>
                <td>
                    <?= $k['kd_divisi']; ?>
                </td>
                <td>
                    <?php
                    switch ($k['level']) {
                        case 0:
                            echo "Administrator";
                            break;
                        case 1:
                            echo "Kepala Bagian";
                            break;
                        case 2:
                            echo "Unit Verifikasi Laporan";
                            break;
                        case 3:
                            echo "Manajemen";
                            break;
                        default:
                            echo "Error!";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    switch ($k['level']) {
                        case 0:
                    ?>

                        <?php
                            break;
                        default:
                        ?>

                            <div class="btn-group-vertical">
                                <button class="btn btn-primary btn-sm" style="color: #FFF;" data-toggle="modal" data-target="#detail-<?= $k['id']; ?>">Detail</button>
                                <button class="btn btn-danger btn-sm" style="color: #FFF;" data-toggle="modal" data-target="#hapus-<?= $k['id']; ?>">Hapus</button>

                                <!-- Untuk Popup Detail -->
                                <div class="modal fade" tabindex="-1" role="dialog" id="detail-<?= $k['id'] ?>">
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
                                <div class="modal fade" tabindex="-1" role="dialog" id="hapus-<?= $k['id'] ?>">
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
                    <?php

                    }
                    ?>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>

<?= $this->endSection(); ?>