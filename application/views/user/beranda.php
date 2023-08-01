<div class="d-flex flex-column justify-content-center align-items-center" style="height: 80vh;">
    <h1 class="text-center text-capitalize">Selamat Datang <?= isset($username) ? $username : 'Your Acount Name' ?>....!! di Perbandingan Metode Certainty Factor Dan Naive Bayes Pada Identifikasi Minat Dan Bakat Berdasarkan Multiple INTELLIGENCES</h1>
    <div class="social-auth-links text-center mt-2 mb-3">
        <a href="<?php echo base_url('user/deteksi') ?>" class="btn btn-primary btn-block">
            Mulai Deteksi
        </a>
    </div>
</div>