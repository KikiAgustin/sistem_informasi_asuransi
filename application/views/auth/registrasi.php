<!DOCTYPE html>
<html lang="en">

<head>
    <title>ASURANSIKU | Halaman Registrasi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url('assets/login/'); ?>images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= base_url('assets/login/'); ?>images/img-01.png" alt="IMG">
                </div>

                <form method="POST" action="" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Halaman Registrasi
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Nama Lengkap wajib diisi">
                        <input class="input100" type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" placeholder="Nama Lengkap">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <?= form_error('nama_lengkap', '<p style="color: red;">', '</p>'); ?>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Masukan Email yang benar">
                        <input class="input100" type="text" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <?= form_error('email', '<p style="color: red;">', '</p>'); ?>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password wajib disi">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <?= form_error('password', '<p style="color: red;">', '</p>'); ?>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Konfirmasi wajib disi">
                        <input class="input100" type="password" name="password1" placeholder="Konfirmasi Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <?= form_error('password1', '<p style="color: red;">', '</p>'); ?>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" name="submit" class="login100-form-btn">
                            Registrasi
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            <!-- Forgot -->
                        </span>
                        <a class="txt2" href="#">
                            <!-- Username / Password? -->
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="<?= base_url("Auth/index"); ?>">
                            Halaman Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/'); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/'); ?>vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets/login/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/'); ?>vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/'); ?>vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/'); ?>js/main.js"></script>

</body>

</html>