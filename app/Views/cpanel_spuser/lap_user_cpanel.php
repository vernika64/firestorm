<?= $this->extend('cpanel_spuser/frame'); ?>

<?= $this->section('konten'); ?>

<h1 style="margin-bottom: 20px;"><?= $nama; ?></h1>

<?php
if (session()->getFlashdata('pesan') != NULL) {
?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php
} else if (session()->getFlashdata('error') != NULL) {
?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php
} else {
}
?>
<button class="btn btn-primary btn-lg" style="margin-bottom: 20px;" data-toggle="modal" data-target="#buat">Buat user baru</button>

<div class="modal fade" tabindex="-1" id="buat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat user baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/cpanelsuper/buatuser" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control" placeholder="username tidak boleh pakai spasi dan huruf besar">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password harus lebih dari 5 huruf">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Divisi</label>
                        <select name="divisi" class="form-control">
                            <?php
                            foreach ($division as $m) :
                            ?>
                                <option value="<?= $m['kd_divisi']; ?>"><?= $m['nama_divisi']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Otoritas</label>
                        <select name="level" class="form-control">
                            <option value="1">Kepala Bagian</option>
                            <option value="2">Validator</option>
                            <option value="3">Manajemen</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
        $no = 1 + ($batashal * ($halaman - 1));
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
                    <div class="btn-group-vertical">
                        <button class="btn btn-primary btn-sm" style="color: #FFF;" data-toggle="modal" data-target="#detail-<?= $k['id']; ?>">Detail</button>

                        <div class="modal fade" tabindex="-1" id="detail-<?= $k['id']; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" value="<?= $k['nama']; ?>" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Divisi</label>
                                                <input type="text" value="<?= $k['kd_divisi']; ?>" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Otoritas</label>
                                                <input type="text" value="<?php
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
                                                                            ?>" class="form-control" readonly>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<?= $pager->links('datauser', 'cpanelsuper_pager'); ?>

<?= $this->endSection(); ?>