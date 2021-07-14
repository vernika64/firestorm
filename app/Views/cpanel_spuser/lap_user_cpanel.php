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
                    <div class="btn-group-vertical">
                        <button class="btn btn-primary btn-sm" style="color: #FFF;" data-toggle="modal" data-target="#detail-<?= $k['id']; ?>">Detail</button>
                    </div>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>

<?= $this->endSection(); ?>