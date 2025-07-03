<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="Syarat dan ketentuan SPMB Sekolah Prestasi Prima" name="description">
    <meta content="SPMB, Syarat, Ketentuan, SMK Prestasi Prima, SMA Prestasi Prima" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>/assets/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>/assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>/assets/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-24CHZ9DNHK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-24CHZ9DNHK');
    </script>

    <style>
        :root {
            --primary-color: #ff6b00;
            --secondary-color: #fff3e6;
        }

        .box {
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            padding: 20px;
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(255, 107, 0, 0.2);
        }

        .info-card {
            border-left: 4px solid var(--primary-color);
            background: var(--secondary-color);
            padding: 15px;
            border-radius: 8px;
        }

        .requirements-list li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 25px;
        }

        .requirements-list li:before {
            content: "\f058";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--primary-color);
        }

        .highlight {
            color: var(--primary-color);
            font-weight: 600;
        }

        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
        }
        .navbar-toggler:focus {
            box-shadow: none;
        }
        .navbar-toggler::after {
            display: none;
        }
    </style>
</head> 
<body>
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
                        <a class="nav-link scrollto active" href="<?= base_url()?>#hero">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="<?= base_url()?>#jurusan">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="<?= base_url()?>#prestasi">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="<?= base_url()?>#testimoni">Testimoni</a>
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
// Scroll ke atas saat halaman dimuat
window.onload = function() {
    window.scrollTo(0, 0);
};

// Scroll ke atas saat halaman di-refresh
window.onbeforeunload = function() {
    window.scrollTo(0, 0);
};

// Scroll ke atas saat halaman di-cache
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        window.scrollTo(0, 0);
    }
});

// Scroll ke atas saat DOM selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
    window.scrollTo(0, 0);
});
</script>

<!-- ======== HEADER END ========= -->

<link rel="stylesheet" href="<?= base_url()?>/assets/assets/css/custom.css">
    <!-- Syarat & Ketentuan Section -->
    <section class="py-5 mt-5">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Syarat & Ketentuan</h2>
                <p class="text-muted">SPMB Sekolah PRESTASI PRIMA 2025/2026</p>
            </div>

            <!-- Gelombang Pendaftaran -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-10">
                    <div class="box">
                        <h5 class="section-title">Gelombang Pendaftaran</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="info-card">
                                    <h6 class="highlight mb-2">GELOMBANG 1</h6>
                                    <p class="mb-1"><i class="fas fa-calendar-alt me-2"></i>November <?php echo date('Y'); ?> s.d. Februari <?php echo (date('Y')+1); ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <h6 class="highlight mb-2">GELOMBANG 2</h6>
                                    <p class="mb-1"><i class="fas fa-calendar-alt me-2"></i>Maret <?php echo date('Y'); ?> s.d. Juli <?php echo (date('Y')+1); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visi Misi -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-10">
                    <div class="box">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <h5 class="section-title">Visi</h5>
                                <p class="text-muted">Mewujudkan insan pembelajar yang mampu berdaptasi, berakhlak mulia, cerdas, kreatif, menguasai Science, Technology, Engineering, Art, and Mathematics (STEAM) berlandaskan Iman & Taqwa</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title">Misi</h5>
                                <ul class="requirements-list list-unstyled">
                                    <li>Mengoptimalkan pembelajaran untuk meningkatkan keterampilan siswa dalam meraih prestasi.</li>
                                    <li>Mengembangkan kepribadian religius, nasionalis, mandiri, integritas, dan gotong royong.</li>
                                    <li>Menerapkan pembelajaran abad 21 dan Higher Order Thinking Skill (HOTS).</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title">Tujuan</h5>
                                <ul class="requirements-list list-unstyled">
                                    <li>Menjadi sekolah berprestasi nasional dan internasional dalam akademik dan non-akademik.</li>
                                    <li>Menyiapkan siswa melanjutkan ke Perguruan Tinggi Negeri (PTN) dan dunia industri.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Syarat Pendaftaran -->
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="box">
                        <h5 class="section-title">Syarat Pendaftaran SPMB TP. <?php echo date('Y') . "/" . (date('Y')+1); ?></h5>
                        <div class="requirements-list">
                            <ol class="ps-3">
                                <li><span class="highlight">Membeli Formulir Pendaftaran:</span> Rp. 100.000,-</li>
                                <li>Datang saat Wawancara dan TPA</li>
                                <li>
                                    <p class="mb-2">Melengkapi Dokumen Administrasi:</p>
                                    <div class="info-card">
                                        <ul class="list-unstyled mb-0">
                                            <li>Pas Foto 3x4 (2 lembar, background merah)</li>
                                            <li>Surat Keterangan Sehat, Bebas Narkoba, Tidak Buta Warna dari Dokter/Klinik</li>
                                            <li>Fotocopy Rapor Kelas IX SMP Semester Ganjil/Genap</li>
                                            <li>Fotocopy Ijazah terakhir (legalisir)</li>
                                            <li>Fotocopy KK & Akta Kelahiran masing-masing 1 lembar</li>
                                            <li>Fotocopy Piagam/Sertifikan Penghargaan (jika ada)</li>
                                            <li>Pelunasan Biaya Awal Tahun Pelajaran <?php echo date('Y') . "/" . (date('Y')+1); ?></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <span class="highlight">Biaya Pengembangan Sarana:</span> Rp. 3.500.000,-
                                    <!-- <div class="badge bg-success mt-1"></div> -->
                                </li>
                                <li>Batas pembayaran paling lambat 1 Minggu saat dikirimkannya pengumuman kelulusan</li>
                                <li>Biaya Pengembangan Sarana yang sudah masuk ke rekening sekolah tidak bisa ditarik kembali/refund, kecuali siswa/i tersebut diterima di SMA/SMK Negeri di wilayah Provinsi DKI Jakarta (dengan potongan Administrasi)</li>
                                <li>Pembayaran Seragam Tahun Pelajaran <?php echo date('Y') . "/" . (date('Y')+1) ?> sudah bisa dilaksanakan pada bulan Juni <?php echo date('Y'); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <?= view('template/footer') ?>
    </footer>

    <!-- Back to top -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>/assets/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url() ?>/assets/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>/assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>/assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/assets/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>/assets/assets/js/main.js"></script>

    <!-- Script untuk scroll ke atas saat refresh -->
</body>

</html>