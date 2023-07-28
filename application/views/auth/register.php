<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets\template\admin\plugins\fontawesome-free\css\all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets\template\admin\plugins\icheck-bootstrap\icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets\template\admin\dist\css\adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url(); ?>" class="h1"><b>Sistem</b>Pakar</a>
                <br />
                <span>Sistem Pakar Deteksi Minat Dan Bakat</span>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Daftar terlebih dahulu untuk memulai sesi kamu</p>

                <form action="<?= base_url('auth/register'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="namma" placeholder="Nama">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="alamat" class="form-control" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="tlp" placeholder="Telepon">
                    </div>
                    <div class="input-group mb-3">
                        <select class="custom-select">
                            <option value="">---Pilih Jenis Kelamin---</option>
                            <option name="jenis_kelamin" value="Laki-Laki">Laki-laki</option>
                            <option name="jenis_kelamin" value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            Sign Up
                        </button>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="<?= base_url('auth') ?>">Saya sudah memiliki akun</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets\template\admin\plugins\jquery\jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets\template\admin\plugins\bootstrap\js\bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets\template\admin\dist\js\adminlte.min.js"></script>
</body>

</html>