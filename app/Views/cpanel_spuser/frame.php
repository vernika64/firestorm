<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login untuk melanjutkan</title>

    <!-- Untuk sidebar -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('components/sbawm/style.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('components/bs4/css/bootstrap.min.css'); ?>">

</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <h1><a href="index.html" class="logo">SISLAP <span>Sistem Laporan</span></a></h1>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="<?= base_url('cpanelsuper/dashboard') ?>"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url('cpanelsuper/laporan_masuk') ?>"><span class="fa fa-user mr-3"></span> Laporan Masuk</a>
                    </li>
                    <li>
                        <a href="<?= base_url('cpanelsuper/laporan_konfirm') ?>"><span class="fa fa-user mr-3"></span> Laporan Konfirmasi</a>
                    </li>
                    <li>
                        <a href="<?= base_url('cpanelsuper/laporan_acc') ?>"><span class="fa fa-briefcase mr-3"></span> Laporan Acc</a>
                    </li>
                    <li>
                        <a href="<?= base_url('cpanelsuper/list_user') ?>"><span class="fa fa-briefcase mr-3"></span> List Pelapor</a>
                    </li>
                    <li>
                        <a href="<?= base_url('cpanelsuper/index') ?>"><span class="fa fa-briefcase mr-3"></span> Logout</a>
                    </li>
                </ul>

                <div class="mb-5">
                    <h3 class="h6 mb-3">Subscribe for newsletter</h3>
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <div class="icon"><span class="icon-paper-plane"></span></div>
                            <input type="text" class="form-control" placeholder="Enter Email Address">
                        </div>
                    </form>
                </div>

                <div class="footer">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <!--<h2 class="mb-4">Sidebar #05</h2>-->

            <?= $this->renderSection('konten'); ?>

        </div>

    </div>

</body>
<script src="<?= base_url('components/jquery/jquery.js'); ?>"></script>
<script src="<?= base_url('components/bs4/js/bootstrap.min.js'); ?>"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="<?= base_url('components/sbawm/main.js'); ?>"></script>

</html>