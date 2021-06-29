<?= $this->extend('addons/cpanel_layout'); ?>

<?= $this->section('konten'); ?>

<h1>Buat Laporan</h1>

<div class="container-fluid">
    <form enctype="multipart/form-data" action="/cpanel/prosesbuatlaporan" method="post">
        <div class="form-group">
            <label>Judul Laporan</label>
            <input type="text" name="title" class="form-control" placeholder="Judul Laporan">
        </div>
        <div class="form-group">
            <label>Deskripsi Laporan</label>
            <textarea name="desc" class="form-control" rows="4" style="height: auto !important; resize: none;"></textarea>
        </div>
        <div class="form-group">
            <label>Divisi yang ingin dituju</label>
            <select name="kd_dvs" class="form-control">
                <?php foreach ($divisi as $z) : ?>
                    <option value="<?= $z['kd_divisi']; ?>"><?= $z['nama_divisi']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inifile" aria-describedby="inifile" name="inifile">
                <label class="custom-file-label" for="inifile">Upload file pendukung <small>(File tidak boleh lebih dari 1MB)</small></label>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" name="kirim" class="btn btn-primary" value="Kirim">
        </div>
    </form>
</div>

<?= $this->endSection(); ?>