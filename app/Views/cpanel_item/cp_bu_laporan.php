<?= $this->extend('addons/cpanel_layout'); ?>

<?= $this->section('konten'); ?>

<h1>Buat Laporan</h1>

<div class="container-fluid">
    <form>
        <div class="form-group">
            <label>Judul Laporan</label>
            <input type="text" name="jd_laporan" class="form-control" placeholder="Judul Laporan">
        </div>
        <div class="form-group">
            <label>Deskripsi Laporan</label>
            <textarea name="ds_laporan" class="form-control" rows="4" style="height: auto !important; resize: none;"></textarea>
        </div>
        <div class="form-group">
            <label>Divisi yang ingin dituju</label>
            <select name="divisi" class="form-control">
                <option value="fbi">FBI</option>
                <option value="shuba">Shubapolice</option>
            </select>
        </div>
        <div class="form-group">
            <label>Upload file pendukung <small>(Ukuran file tidak boleh lebih dari 3MB)</small></label>
            <input type="file" class="form-control" name="dokumen">
        </div>
        <div class="form-group">
            <input type="submit" name="kirim" class="btn btn-primary" value="Kirim">
        </div>
    </form>
</div>

<?= $this->endSection(); ?>