<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login untuk melanjutkan</title>

    <!-- Untuk sidebar -->
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('components/grayscale/css/styles.css'); ?>" rel="stylesheet" />
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body id="page-top">

    <!-- Modal Daftar User baru-->

    <div class="modal fade" id="modalDaftar" tabindex="-1" aria-labelledby="labeldaftar" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/Home/daftar" method="post">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labeldaftar">Form pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>NIK</label>
                            <input type="number" name="ktp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nama sesuai identitas</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lhr" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Kota Asal</label>
                            <input type="text" name="kota" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nomor Ponsel</label>
                            <input type="number" name="ponsel" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>E-mail (opsional)</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label>Buat Password Baru</label>
                            <input type="password" name="pw_baru" class="form-control" id="pwBaru">
                        </div>
                        <div class="mb-3">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="pw_cek" class="form-control" id="pwCek">
                            <div id="txtPass" style="color: green;"></div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Daftar" name="tombol">
                    </div>
            </form>
        </div>
    </div>
    </div>


    <!-- END of Daftar -->
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Sislap | Sistem Laporan Politeknik Batam</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">SISLAP</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Cara cepat melaporkan sesuatu.</h2>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Untuk bisa lapor diharuskan mempunyai sebuah akun SISLAP, bila belum punya bisa mendaftar terlebih dahulu dengan menekan tombol daftar dibawah.</h2>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDaftar">Daftar</button>
                    <a class="btn btn-secondary" href="<?= base_url('cpanel/') ?>">Lapor</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Built with Bootstrap 5</h2>
                    <p class="text-white-50">
                        Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
                        <a href="https://startbootstrap.com/theme/grayscale/">the preview page.</a>
                        The theme is open source, and you can use it for any purpose, personal or commercial.
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="<?= base_url('components/grayscale/assets/img/ipad.png') ?>" alt="..." />
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="<?= base_url('components/grayscale/assets/img/bg-masthead.jpg'); ?>" alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Shoreline</h4>
                        <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any project - even commercial projects! Download it, customize it, and publish your website!</p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="<?= base_url('components/grayscale/assets/img/demo-image-01.jpg'); ?>" alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Misty</h4>
                                <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                                <hr class="d-none d-lg-block mb-0 ms-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="<?= base_url('components/grayscale/assets/img/demo-image-02.jpg'); ?>" alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Mountains</h4>
                                <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
                                <hr class="d-none d-lg-block mb-0 me-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                    <form class="form-signup d-flex flex-column flex-sm-row">
                        <input class="form-control flex-fill me-0 me-sm-2 mb-3 mb-sm-0" id="inputEmail" type="email" placeholder="Enter email address..." />
                        <button class="btn btn-primary" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">hello@yourdomain.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Your Website 2021</div>
    </footer>



</body>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?= base_url('components/grayscale/js/scripts.js'); ?>"></script>
<script src="<?= base_url('components/jquery/jquery.js'); ?>"></script>
<!-- Validasi Password -->
<script>
    function checkPasswordMatch() {
        var password = $("#pwBaru").val();
        var confirmPassword = $("#pwCek").val();
        if (password != confirmPassword)
            $("#txtPass").html("Passwords does not match!");
        else
            $("#txtPass").html("Passwords match.");
    }
    $(document).ready(function() {
        $("#pwCek").keyup(checkPasswordMatch);
    });
</script>

</html>