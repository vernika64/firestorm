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

            <tr>
                <td>1</td>
                <td>Laporan Gas Meleduk</td>
                <td>12 Januari 2021</td>
                <td>Divisi Penjinak Gas</td>
                <td>OTW</td>
                <td><button class="btn btn-primary">Detail</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Laporan Mahasiswa Kesurupan</td>
                <td>12 Maret 2021</td>
                <td>Divisi Penjinak Bau Bawang</td>
                <td>TKO</td>
                <td><button class="btn btn-primary">Detail</button></td>
            </tr>
        
        </tbody>
    </table>

</div>

<?= $this->endSection(); ?>