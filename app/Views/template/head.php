<!DOCTYPE html>
<html lang="en" translate="no">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="Selamat datang di portal PPDB Sekolah Prestasi Prima, Sekolah IC Terbaik Se-Jakarta Timur dengan Akreditasi A" name="description">
  <meta content="PPDB SMK Prestasi Prima dan SMA Prestasi Prima" name="keywords">

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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
          scroll-behavior: smooth;
        }
        
        body {
          font-family: "Open Sans", sans-serif;
          color: #444444;
          box-sizing: border-box;
        }
        
        ::selection {
          background-color: rgba(1, 41, 112, 1);
          color: white;
        }
        
        button, a, input, br, img, i {
          user-select: none;
        }
        
        a {
          color: #ff8243;
          text-decoration: none;
        }
        
        a:hover {
          color: #fda65d;
          text-decoration: none;
        }

    .hero .btn-brosur {
        line-height: 0;
        width: 127px;
        padding: 15px;
        border-radius: 4px;
        transition: 0.5s;
        color: #fff;
        background: #60aaff;
        box-shadow: 0px 2px 5px rgba(65, 84, 241, 0.4);
        display: inline-block;
        vertical-align: middle;
    }

    .hero .btn-brosur span {
        font-family: "Nunito", sans-serif;
        color: white;
        font-weight: 600;
        font-size: 16px;
        letter-spacing: 1px;
    }

    .hero .btn-wa {
        line-height: 0;
        width: 105px;
        padding: 15px;
        border-radius: 4px;
        transition: 0.5s;
        color: #fff;
        background: #47c363;
        box-shadow: 0px 2px 5px rgba(65, 84, 241, 0.4);
        display: inline-block;
        vertical-align: middle;
    }

    .btn-wa img, .btn-brosur img {
        filter: invert(100%);
    }

    .btn-get-started:hover,
    .btn-wa:hover,
    .btn-brosur:hover {
        transform: scale(1.05);
    }

    .hero .btn-get-started {
        line-height: 0;
        width: 240px;
        padding: 24px 0;
        border-radius: 4px;
        transition: 0.5s;
        color: #fff;
        background: #ff8243;
        box-shadow: 0px 2px 5px rgba(65, 84, 241, 0.4);
    }
    .hero .btn-get-started span {
        font-family: "Nunito", sans-serif;
        font-weight: 600;
        font-size: 16px;
        letter-spacing: 1px;
    }
    .hero .btn-get-started i {
        margin-left: 5px;
        font-size: 18px;
        transition: 0.3s;
    }

    .hero .hero-img {
        text-align: right;
    }

    .img-fluid-main {
        width: 95%;
        box-shadow: 0px 0 20px rgba(1, 41, 112, 0.1);
        border-radius: 30px;
        max-width: 450px;
    }

    .img-fluid {
        width: 100%;
        max-width: 300px;
    }
    
    .testimonials .champ-item {
          box-sizing: content-box;
          cursor: grab;
          padding: 10px;
          margin: 40px 30px;
          justify-self: center;
          box-shadow: 0px 0 20px rgba(1, 41, 112, 0.1);
          background: #fff;
          display: flex;
          flex-direction: column;
          text-align: center;
          transition: 0.3s;
          cursor: grab;
        }
        
        .testimonials .champ-item img {
          width: 100%;
          max-width: 400px;
    }

    .testimonials .testimonial-item {
        box-sizing: content-box;
        cursor: grab;
        padding: 30px;
        margin: 40px 50px;
        box-shadow: 0px 0 20px rgba(1, 41, 112, 0.1);
        background: #fff;
        min-height: 320px;
        justify-self: center;
        max-width: 400px;
        height: 500px;
        display: flex;
        flex-direction: column;
        text-align: center;
        transition: 0.3s;
    }

    .testimonials .testimonial-item:active,
    .testimonials .champ-item:active {
        cursor: grabbing;
    }
    
    .esmk {
          box-shadow: 0px -10px 2cap rgba(1, 42, 112, 0.05);
        }
        .values .box {
          padding: 30px;
          box-shadow: 0px 0 5px rgba(1, 41, 112, 0.08);
          text-align: center;
          transition: 0.3s !important;
          height: 100%;
        }
        .values .box img {
          padding: 30px 50px;
        }
        .values .box h3 {
          font-size: 24px;
          color: #e26a2c;
          font-weight: 700;
          margin-bottom: 18px;
        }
        .values .box:hover {
          box-shadow: 0px 0 30px rgba(1, 41, 112, 0.08);
        }
        .box:hover {
          transform: scale(2);
        }
        
    @media (max-width: 991px) {
        
          .doubles {
            justify-content: center;
          }
          .hero {
            height: auto;
            padding: 120px 0 60px 0;
          }
          .hero .hero-img {
            text-align: center;
            margin-top: 80px;
          }
        }
</style>
</head>

<body>