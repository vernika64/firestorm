<?= $this->extend('addons/cpanel_layout'); ?>

<?= $this->section('konten'); ?>


<?php

?>
<h1>SISLAP - Sistem Laporan | Selamat Datang <?= $nama ?></h1>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-warning" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<div class="jumbotron" style="margin-top: 3 rem;">
    <h1>Hello World!</h1>
</div>

<?= $this->endSection(); ?>