<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('front/layout/header') ?>
</head>

<body class="page-index">
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <?php $this->load->view('front/layout/navbar') ?>
    </header>
    <!-- End Header -->

    <?= $contents ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <?php $this->load->view('front/layout/footer') ?>
    </footer>
    <!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- <div id="preloader"></div> -->

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/template/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/template/front/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>assets/template/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>assets/template/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/template/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/template/front/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/template/front/assets/js/main.js"></script>
</body>

</html>