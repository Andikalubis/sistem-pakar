<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">E-Wallet</h1>
    </a>

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a href="<?= base_url() ?>" class="<?= $active === 'home' ? 'active' : '' ?>">Home</a></li>
            <li><a href="#why-us" class="<?= $active === 'about' ? 'active' : '' ?>">About</a></li>
            <li><a href="#services-list" class="<?= $active === 'services' ? 'active' : '' ?>">Services</a></li>
            <li><a href="signin" class="<?= $active === 'signin' ? 'active' : '' ?>">Sign In</a></li>
            <li><a href="signup" class="<?= $active === 'signup' ? 'active' : '' ?>">Sign Up</a></li>
        </ul>
    </nav>
    <!-- .navbar -->
</div>
