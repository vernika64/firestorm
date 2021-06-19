<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login untuk melanjutkan</title>
    <link rel="stylesheet" href="<?= base_url('components/bs4/css/bootstrap.min.css'); ?>">
    <style>
    body
    {
        font-family: Segoe UI !important;
    }
    .card-login
    {
        margin-top: 7rem;
    }
    .card-judul
    {
        text-align: center;
        font-family: 'Segoe UI';
        font-weight: lighter;
    }
    .form-login
    {
        margin-top: 3rem;
    }
    .btn-lebar
    {
        width: 100%;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-login">
                    <div class="card-body">
                        <h5 class="card-title card-judul">Silahkan login terlebih dahulu</h5>
                        <form class="form-login">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <!--<input type="submit" name="submit" class="btn btn-primary btn-lebar" value="Masuk">-->
                                <a href="<?= base_url('cpanel/dashboard'); ?>" class="btn btn-primary btn-lebar">Masuk</a>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-default btn-lebar">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="<?= base_url('components/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('components/bs4/js/bootstrap.js'); ?>"></script>
</html>