<!-- ======= Header ======= -->
<header id="header" class="fixed-top bg-white shadow-sm">
    <nav id="navbar" class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url()?>">
                <img src="<?= base_url()?>/assets/assets/img/logo.png" alt="Logo" height="46" class="me-2">
                <span class="fw-bold fs-4 d-none d-sm-block" style="color: #091353;">Sekolah Prestasi Prima</span>
            </a>
            
            <button class="navbar-toggler mobile-nav-toggle shadow-none border-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link scrollto active" href="#hero">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#jurusan">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#prestasi">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto text-nowrap" href="<?= base_url('sk') ?>">S<span class="d-none d-xl-inline">yarat</span> & K<span class="d-none d-xl-inline">etentuan<span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" target="_blank" href="https://drive.google.com/drive/folders/172SiFEgNYo0RY32Poe3op5ZVUCw1-NXV?hl=idk">Brosur</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary px-4 py-2 scrollto" style="background-color: #ff8243; border: none;" href="<?= base_url('/sign-in') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header><!-- End Header -->

<style>
.navbar-toggler:focus {
    box-shadow: none;
}
.navbar-toggler::after {
    display: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbarCollapse = document.getElementById('navbarNav');
    const menuIcon = document.querySelector('.bi-list');
    const closeIcon = document.querySelector('.bi-x-lg');
    
    navbarCollapse.addEventListener('show.bs.collapse', function () {
        menuIcon.classList.add('d-none');
        closeIcon.classList.remove('d-none');
    });
    
    navbarCollapse.addEventListener('hide.bs.collapse', function () {
        menuIcon.classList.remove('d-none');
        closeIcon.classList.add('d-none');
    });
});
</script>
<!-- ======== HEADER END ========= -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up"> <br>Selamat Datang di Portal SPMB Sekolah Prestasi Prima T.P. 2025/2026</h1>
                <h2 data-aos="fade-up" data-aos-delay="400" class="mt-4"> "If Better is Possible, Good is not Enough" </h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="<?= base_url('register') ?>" class="mt-4 mb-1 btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span class="ms-2">Daftar Sekarang</span>
                        </a>
                        <div class="d-flex align-items-center mt-2 doubles">    
                            <a href="https://wa.me/6285195928886" class="btn-wa scrollto d-inline-flex align-items-center justify-content-center align-self-center me-2">
                                <img src="<?= base_url()?>/assets/assets/img/whatsapp.svg">
                                <span class="ms-2">WA</span>
                            </a>
                            <a href="https://drive.google.com/drive/folders/172SiFEgNYo0RY32Poe3op5ZVUCw1-NXV?hl=idk" target="_blank" class="btn-brosur scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <i class="bi bi-file-earmark-text"></i>
                                <span class="ms-2">Brosur</span> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img justify-self-center mt-0 mt-sm-5" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url()?>/assets/assets/img/_SPMB.png" class="img-fluid-main" draggable="false">
                
            </div>
        </div>
    </div>

</section><!-- End Hero -->