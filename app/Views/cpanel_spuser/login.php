<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="<?= base_url(''); ?>">
    <style>
        body {
            font-family: Segoe UI !important;
        }

        .card-login {
            margin-top: 7rem;
        }

        .card-judul {
            text-align: center;
            font-family: 'Segoe UI';
            font-weight: lighter;
        }

        .form-login {
            margin-top: 3rem;
        }

        .btn-lebar {
            width: 100%;
        }
    </style>
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-login">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-warning" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif;
                        if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <h5 class="card-title card-judul">Silahkan login terlebih dahulu</h5>
                        <form class="form-login" action="/Cpanel/masuk" method="post">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                            <div class="form-group">
                                <!--<input type="submit" name="submit" class="btn btn-primary btn-lebar" value="Masuk">-->
                                <input type="submit" name="submit" class="btn btn-primary btn-lebar" value="Masuk">
                            </div>
                            <!-- <div class="form-group">
                                <button type="button" class="btn btn-default btn-lebar">Daftar</button>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>