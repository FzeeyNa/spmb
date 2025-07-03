<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>/assets/assets/img/favicon.png" rel="icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



    <!-- CSS DATATABLE -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/modules/datatables.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/pages/iziToast.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/chart.js/dist/Chart.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/chocolat/dist/css/chocolat.css">
    <script src="<?= base_url() ?>/tema/tinymce/js/tinymce/tinymce.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <style>
        .bad {
            vertical-align: middle;
            padding: 7px 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border-radius: 30px;
            font-size: 12px;
        }
    </style>
    <style>

    </style>
</head>

<body>

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <!--  <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="/tema/assets/img/products/product-3-50.png" alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="/tema/assets/img/products/product-2-50.png" alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="/tema/assets/img/products/product-1-50.png" alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div> -->
                </form>
                <ul class="navbar-nav navbar-right">
                    <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/tema/assets/img/avatar/avatar-1.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b>
                                        <p>Hello, Bro!</p>
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/tema/assets/img/avatar/avatar-2.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Dedik Sugiharto</b>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/tema/assets/img/avatar/avatar-3.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Agung Ardiansyah</b>
                                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/tema/assets/img/avatar/avatar-4.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Ardian Rahardiansyah</b>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                        <div class="time">16 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/tema/assets/img/avatar/avatar-5.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Alfa Zulkarnain</b>
                                        <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Low disk space. Let's clean it!
                                        <div class="time">17 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Stisla template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li> -->
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/tema/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['nmUser']; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <!-- <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a> -->
                            <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a> -->
                            <a href="<?= base_url('Verifikator/gPassword').'/'.session('idUser') ?>" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Ganti Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('login/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= base_url('verifikator') ?>">ADMIN PPDB</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url('verifikator') ?>">DB</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Utama</li>
                        <li class="<?php if ($active == 'beranda') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator') ?>"><i class="fas fa-home fa-fw"></i> <span>Beranda</span></a></li>
                        <li class="<?php if ($active == 'daftarSiswa') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator/daftarSiswa'); ?>" target="_blank"><i class="fas fa-chalkboard-teacher fa-fw"></i> <span>Daftar Siswa</span></a></li>
                        <li class="<?php if ($active == 'dataPendaftar') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator/dataPendaftar'); ?>"><i class="fas fa-users fa-fw"></i> <span>Data Pendaftar</span></a></li>

                        <li class="nav-item dropdown <?php if ($active == 'formulir' || $active == 'daftarUlang') {
                                                            echo 'active';
                                                        } ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-dollar-sign"></i><span>Verifikasi <?php if ($blmVerifFormulir > 0 || $blmVerifDaftar > 0) { ?> <span class="badges badge-primary ml-5" style="padding: 5px 10px;border-radius:30px;font-weight: 600;background-color:#ff8243"><?= $blmVerifFormulir + $blmVerifDaftar ?></span><?php } else {
                                                                                                                                                                                                                                                                                                                                                                        echo '';
                                                                                                                                                                                                                                                                                                                                                                    } ?></a>
                            <ul class="dropdown-menu">
                                <li class="<?php if ($active == 'formulir') {
                                                echo 'active';
                                            } ?>"><a class="nav-link" href="<?= base_url('verifikator/formulir') ?>">
                                        Formulir <span class="badge badge-primary m-5"><?php if ($blmVerifFormulir > 0) {
                                                                                            echo $blmVerifFormulir;
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?></span>
                                    </a></li>

                                <li class="<?php if ($active == 'daftarUlang') {
                                                echo 'active';
                                            } ?>"><a class="nav-link" href="<?= base_url('verifikator/DaftarUlang') ?>"><span>DaftarUlang</span><span class="badge badge-primary m-5"><?php if ($blmVerifDaftar > 0) {
                                                                                                                                                                                            echo $blmVerifDaftar;
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo '';
                                                                                                                                                                                        } ?></span></a></li>
                            </ul>
                        </li>
                        <li class="<?php if ($active == 'tes') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator/tes') ?>"><i class="fas fa-user-edit"></i> <span>Tes Potensi Akademik</span></a></li>
                        <li class="<?php if ($active == 'pengumuman') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator/pengumuman') ?>"><i class="fas fa-bullhorn fa-fw"></i> <span>Pengumuman</span></a></li>
 <li class="<?php if ($active == 'statusPendaftar') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator/status') ?>"><i class="fas fa-calendar-check fa-fw"></i> <span>Status Pendaftaran</span></a></li>
                                     <li class="<?php if ($active == 'laporan') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator/laporan') ?>"><i class="fas fa-chart-line fa-fw"></i> <span>Laporan</span></a></li>
                        <li class="menu-header">Akses Cepat</li>
                        <li class="<?php if ($active == 'konfirmasi') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator/konfirmasi') ?>"><i class="fas fa-search-dollar fa-fw"></i> <span>Konfirmasi Pembayaran</span></a></li>

                        <li class="menu-header">Pengaturan</li>
                        <li class="<?php if ($active == 'gPassword') {
                                        echo 'active';
                                    } ?>"><a class="nav-link" href="<?= base_url('verifikator/gPassword') . '/' . session('idUser') ?>"><i class="fas fa-cog fa-fw"></i> <span>Ganti Password</span></a></li>
                        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split" data-toggle="modal" data-target="#pengerjaan">
                                <i class="fas fa-rocket"></i> Panduan Penggunaan
                            </a>
                        </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">