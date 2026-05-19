<?php
$db = \Config\Database::connect();

$app = $db->table('tbl_app')->get()->getResultArray();
$layanan = $db->table('tbl_layanan_pusat')->get()->getResultArray();
$web = $db->table('tbl_web')->where('id', '1')->get()->getRowArray();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <!-- PAGE TITLE HERE -->
  <title><?= $judul ?> | <?= $web['nama_kampus'] ?> </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="bumdes, badan usaha milik desa, desa" />
  <meta name="description" content="<?= $description ?>">
  <meta name="robots" content="index, follow">
  <meta name="copyright" content="BUMDes">
  <meta name="format-detection" content="telephone=no">

  <!-- FAVICONS ICON -->
  <link rel="icon" href="<?= base_url('logo/' . $web['logo']) ?>" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('logo/' . $web['logo']) ?>" />

  <!-- MOBILE SPECIFIC -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

  <!-- STYLESHEETS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('front/') ?>css/plugins.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('front/') ?>css/style.css">
  <link class="skin" rel="stylesheet" type="text/css" href="<?= base_url('front/') ?>css/skin/skin-1.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('front/') ?>css/templete.css">
  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    /* Skema Warna Hijau BUMDes */
    :root {
      --biru-utama: #1565c0;
      --biru-muda: #1976d2;
      --biru-tua: #0d47a1;
      --biru-cerah: #64b5f6;
      --biru-pastel: #e3f2fd;
      --kuning-desa: #ffd54f;
    }
    
    /* Font Family */
    body {
      font-family: 'Inter', 'Poppins', sans-serif;
    }
    
    h1, h2, h3, h4, h5, h6 {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
    }
    
    .site-footer {
      font-family: 'Inter', sans-serif;
      text-transform: none;
    }
    
    /* Override warna utama template */
    .site-button, .scroltop, .top-bar, .footer-bottom {
      background-color: var(--biru-utama) !important;
    }
    
    .site-button:hover, .site-button-secondry:hover {
      background-color: var(--biru-tua) !important;
    }
    
    .site-button-secondry {
      background-color: var(--biru-muda) !important;
      border-color: var(--biru-muda) !important;
    }
    
    .top-bar, .footer-bottom {
      background-color: var(--biru-tua) !important;
    }
    
    .section-full.bg-primary {
      background-color: var(--biru-muda) !important;
    }
    
    .sticky-header.main-bar-wraper {
      background-color: white;
      box-shadow: 0 2px 10px rgba(21, 101, 192, 0.1);
    }
    
    /* Premium Breadcrumb Styles */
    .breadcrumb-row-premium {
        padding: 20px 0;
        background: #f8f9fa;
        border-bottom: 1px solid #eee;
    }
    .breadcrumb-nav-list {
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 10px;
    }
    .breadcrumb-nav-item {
        display: flex;
        align-items: center;
    }
    .breadcrumb-nav-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 12px;
        min-width: 40px;
        height: 40px;
        background: #fff;
        color: var(--biru-tua);
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        text-decoration: none !important;
    }
    .breadcrumb-nav-link:hover {
        background: var(--biru-utama);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(21, 101, 192, 0.2);
    }
    .breadcrumb-nav-text {
        padding: 8px 16px;
        background: #eef2f7;
        color: #666;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
    }
    .breadcrumb-nav-item.active .breadcrumb-nav-text {
        background: var(--biru-utama);
        color: #fff;
        box-shadow: 0 4px 10px rgba(21, 101, 192, 0.15);
    }
    .breadcrumb-nav-item.separator {
        color: #ccc;
        font-size: 0.8rem;
    }
    
    /* Header menu hover effect */
    .header-nav > ul > li > a:hover, 
    .header-nav > ul > li:hover > a {
      color: var(--biru-utama) !important;
    }
    
    .sub-menu {
      border-radius: 12px !important;
      border: 1px solid rgba(21, 101, 192, 0.1) !important;
      box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
      padding: 10px 0 !important;
    }
    
    .sub-menu li a:hover {
      color: var(--biru-utama) !important;
      background-color: var(--biru-pastel) !important;
      padding-left: 25px !important;
    }
    
    /* Smooth Scroll */
    html {
      scroll-behavior: smooth;
    }
    
    /* Glassmorphism utility */
    .glass-card {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 15px;
    }
    
    /* Premium Buttons */
    .btn-premium-solid {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 25px;
        background: var(--biru-utama);
        color: white !important;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 5px 15px rgba(21, 101, 192, 0.2);
        text-decoration: none !important;
        cursor: pointer;
    }
    .btn-premium-solid:hover {
        background: var(--biru-tua);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(21, 101, 192, 0.3);
    }
    .btn-premium-outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 24px;
        background: transparent;
        color: var(--biru-utama) !important;
        border: 2px solid var(--biru-utama);
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        text-decoration: none !important;
        cursor: pointer;
    }
    .btn-premium-outline:hover {
        background: var(--biru-utama);
        color: white !important;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(21, 101, 192, 0.2);
    }
    
    .btn-premium-white {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 25px;
        background: white;
        color: var(--biru-utama) !important;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        text-decoration: none !important;
        cursor: pointer;
    }
    .btn-premium-white:hover {
        background: #f8f9fa;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    /* Header Login Icon */
    .login-icon {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        background: var(--biru-pastel);
        color: var(--biru-utama);
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        text-decoration: none !important;
    }
    
    .login-icon:hover {
        background: var(--biru-utama);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(21, 101, 192, 0.2);
    }
    
    /* Global Premium Card Styles */
    .news-premium-card, .product-premium-card, .service-box-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }
    
    .news-premium-card:hover, .product-premium-card:hover, .service-box-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(21, 101, 192, 0.1);
    }
    
    /* News Card specific */
    .news-img { position: relative; height: 240px; }
    .news-img img { width: 100%; height: 100%; object-fit: cover; }
    .news-date {
        position: absolute; bottom: -20px; right: 25px;
        background: var(--biru-utama); color: white;
        padding: 10px 15px; border-radius: 10px;
        text-align: center; box-shadow: 0 10px 20px rgba(21, 101, 192, 0.3);
    }
    .news-date span { display: block; font-size: 1.5rem; font-weight: 800; line-height: 1; }
    .news-date strong { font-size: 0.8rem; text-transform: uppercase; }
    .news-body { padding: 40px 25px 25px; }
    .news-meta ul { display: flex; gap: 15px; list-style: none; padding: 0; margin-bottom: 15px; font-size: 0.85rem; color: #666; }
    .news-title { font-weight: 700; margin-bottom: 15px; line-height: 1.4; }
    .news-excerpt { color: #666; margin-bottom: 20px; line-height: 1.6; }
    .read-more { font-weight: 700; color: var(--biru-utama); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; }
    
    /* Product Card specific */
    .product-premium-card {
        background: white; border-radius: 12px; overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: all 0.3s ease;
        border: 1px solid #eee; height: 100%; display: flex; flex-direction: column;
    }
    .product-img { position: relative; height: 220px; overflow: hidden; }
    .product-img img { width: 100%; height: 100%; object-fit: cover; transition: all 0.5s ease; }
    .product-premium-card:hover .product-img img { transform: scale(1.1); }
    .product-tag {
        position: absolute; top: 15px; left: 15px;
        background: var(--kuning-desa); color: #333;
        padding: 4px 12px; border-radius: 20px;
        font-size: 0.75rem; font-weight: 700; z-index: 1;
    }
    .product-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
    .product-name { font-size: 1.1rem; font-weight: 700; margin-bottom: 10px; height: 2.8em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }
    .product-price { font-size: 1.2rem; font-weight: 800; color: var(--biru-utama); margin-bottom: 15px; }
    .btn-buy {
        display: block; width: 100%; padding: 10px; text-align: center;
        background: var(--biru-pastel); color: var(--biru-utama);
        font-weight: 700; border-radius: 8px; transition: all 0.3s ease;
        text-decoration: none; margin-top: auto;
    }
    .btn-buy:hover { background: var(--biru-utama); color: white; }
    
    /* Premium Button Styles */
    .btn-premium-solid {
        display: inline-block; padding: 15px 30px;
        background: var(--biru-utama); color: white;
        border-radius: 10px; font-weight: 700;
        transition: all 0.3s ease; box-shadow: 0 10px 20px rgba(21, 101, 192, 0.2);
    }
    .btn-premium-solid:hover { background: var(--biru-tua); transform: translateY(-3px); box-shadow: 0 15px 30px rgba(21, 101, 192, 0.3); color: white; }
    
    .btn-premium-outline {
        display: inline-block; padding: 15px 30px;
        background: transparent; color: var(--biru-utama);
        border: 2px solid var(--biru-utama); border-radius: 10px;
        font-weight: 700; transition: all 0.3s ease;
    }
    .btn-premium-outline:hover { background: var(--biru-utama); color: white; transform: translateY(-3px); }
    
    /* Footer styling */
    .footer-top {
      background: linear-gradient(135deg, var(--biru-pastel) 0%, #f8fdf8 100%) !important;
      padding: 60px 0 30px;
    }
    
    .footer-top h5 {
      color: var(--biru-tua) !important;
      font-weight: 600;
      margin-bottom: 25px;
      position: relative;
      padding-bottom: 10px;
    }
    
    .footer-top h5::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 40px;
      height: 3px;
      background: var(--biru-utama);
      border-radius: 2px;
    }
    
    .footer-top .widget_services ul li {
      margin-bottom: 12px;
    }
    
    .footer-top .widget_services ul li a {
      color: #555;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 400;
      font-size: 0.95rem;
    }
    
    .footer-top .widget_services ul li a:hover {
      color: var(--biru-utama);
      padding-left: 5px;
    }
    
    .footer-top .widget_getintuch ul li {
      display: flex;
      align-items: flex-start;
      margin-bottom: 20px;
      color: #555;
      line-height: 1.5;
    }
    
    .footer-top .widget_getintuch ul li i {
      color: var(--biru-utama);
      margin-right: 15px;
      margin-top: 3px;
      font-size: 1.1rem;
      min-width: 20px;
    }
    
    .footer-top .widget_getintuch ul li strong {
      display: block;
      color: var(--biru-tua);
      font-weight: 600;
      margin-bottom: 5px;
    }
    
    .footer-logo-section {
      text-align: center;
      padding: 20px 0;
    }
    
    .footer-logo-section img {
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .footer-logo-section h5 {
      color: var(--biru-tua);
      margin-bottom: 15px;
      font-size: 1.3rem;
    }
    
    .footer-logo-section p {
      color: #666;
      line-height: 1.6;
      font-size: 0.95rem;
      max-width: 300px;
      margin: 0 auto;
    }
    
    .footer-bottom {
      padding: 20px 0;
      background: var(--biru-tua) !important;
    }
    
    .footer-bottom .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }
    
    .footer-bottom span {
      color: rgba(255,255,255,0.8);
      font-size: 0.9rem;
    }
    
    .footer-social-links {
      display: flex;
      gap: 10px;
    }
    
    .footer-social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .footer-social-links a:hover {
      background: var(--biru-muda);
      transform: translateY(-2px);
    }
    
    /* Newsletter Section */
    .newsletter-section {
      background: linear-gradient(135deg, var(--biru-muda), var(--biru-utama)) !important;
      padding: 50px 0;
    }
    
    .newsletter-section h4 {
      margin-bottom: 15px;
      font-weight: 600;
    }
    
    .newsletter-section .site-button-secondry {
      background: white !important;
      color: var(--biru-utama) !important;
      border: 2px solid white !important;
    }
    
    .newsletter-section .site-button-secondry:hover {
      background: transparent !important;
      color: white !important;
    }
    
    /* Responsive Footer */
    @media (max-width: 768px) {
      .footer-top {
        padding: 40px 0 20px;
      }
      
      .footer-top .col-md-3,
      .footer-top .col-md-6 {
        margin-bottom: 30px;
      }
      
      .footer-bottom .container {
        flex-direction: column;
        text-align: center;
        gap: 15px;
      }
      
      .footer-logo-section {
        margin-bottom: 30px;
      }
    }
    
    /* Tambahan elemen dekoratif BUMDes */
    .bumdes-decoration {
      position: relative;
    }
    
    .bumdes-decoration::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 5px;
      background: linear-gradient(90deg, var(--biru-muda), var(--kuning-desa), var(--biru-muda));
      bottom: 0;
      left: 0;
    }
    
    /* Ikon khusus BUMDes */
    .bumdes-icon {
      color: var(--biru-utama);
    }
    /* Login Icon Styles */
.login-icon {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    background: var(--biru-utama);
    color: white;
    text-decoration: none;
    border-radius: 25px;
    transition: all 0.3s ease;
    font-weight: 500;
    font-size: 0.9rem;
}

.login-icon:hover {
    background: var(--biru-tua);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(21, 101, 192, 0.3);
}

.login-icon i {
    font-size: 1rem;
}

.login-text {
    font-size: 0.85rem;
}

/* User Dropdown Styles */
.user-dropdown {
    position: relative;
    cursor: pointer;
}

.user-trigger {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 15px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 25px;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.user-trigger:hover {
    background: rgba(255, 255, 255, 0.15);
}

.user-avatar-sm {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--biru-muda), var(--biru-utama));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
}

.user-name {
    color: white;
    font-weight: 500;
    font-size: 0.9rem;
    max-width: 120px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.user-trigger i {
    color: white;
    font-size: 0.8rem;
    transition: transform 0.3s ease;
}

.user-dropdown:hover .user-trigger i {
    transform: rotate(180deg);
}

/* User Menu Dropdown */
.user-menu {
    position: absolute;
    top: 100%;
    right: 0;
    width: 280px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
    z-index: 1000;
    margin-top: 10px;
}

.user-dropdown:hover .user-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.user-menu::before {
    content: '';
    position: absolute;
    top: -8px;
    right: 20px;
    width: 16px;
    height: 16px;
    background: white;
    transform: rotate(45deg);
    border-radius: 3px;
}

.user-info {
    padding: 20px;
    background: linear-gradient(135deg, var(--biru-pastel), #f8fdf8);
    border-radius: 12px 12px 0 0;
    display: flex;
    align-items: center;
    gap: 15px;
    border-bottom: 1px solid #e0e0e0;
}

.user-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--biru-muda), var(--biru-utama));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1.2rem;
}

.user-details {
    flex: 1;
}

.user-details strong {
    display: block;
    color: var(--biru-tua);
    font-size: 1rem;
    margin-bottom: 3px;
}

.user-details span {
    color: #666;
    font-size: 0.85rem;
}

.user-links {
    padding: 10px 0;
}

.user-menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    color: #555;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.user-menu-item:hover {
    background: var(--biru-pastel);
    color: var(--biru-tua);
    padding-left: 25px;
}

.user-menu-item i {
    width: 16px;
    text-align: center;
    color: var(--biru-utama);
}

.user-menu-item.logout {
    color: #e74c3c;
}

.user-menu-item.logout:hover {
    background: #ffebee;
    color: #c62828;
}

.user-menu-item.logout i {
    color: #e74c3c;
}

.user-menu-divider {
    height: 1px;
    background: #e0e0e0;
    margin: 8px 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .login-text {
        display: none;
    }
    
    .login-icon {
        padding: 10px;
    }
    
    .user-name {
        display: none;
    }
    
    .user-trigger {
        padding: 8px 12px;
    }
    
    .user-menu {
        width: 250px;
        right: -10px;
    }
    
    .user-menu::before {
        right: 25px;
    }
}

/* Animation for dropdown */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translate3d(0, -10px, 0);
    }
    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

.user-menu {
    animation: fadeInDown 0.3s ease;
}
  </style>

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body id="bg">

  <div class="page-wraper">
    <!-- header -->
    <header class="site-header mo-left header">
      <div class="top-bar text-white">
        <div class="container">
          <div class="row d-flex justify-content-between align-items-center">
            <div class="dlab-topbar-left">
              <a href="<?= base_url() ?>" style="color:#fff; font-weight: 600; letter-spacing: 0.5px;">
                <i class="fa fa-map-marker m-r5"></i> BUMDes Digital Kerinci - Bumi Sakti Alam Kerinci
              </a>
            </div>
            <div class="dlab-topbar-right">
              <ul class="d-flex align-items-center">
                <li><a href="<?= $web['fb'] ?>"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="<?= $web['yt'] ?>"><i class="fa fa-youtube-play text-white"></i></a></li>
                <li><a href="<?= $web['ig'] ?>"><i class="fa fa-instagram text-white"></i></a></li>
                <li class="m-l15 d-none d-md-block"><span class="text-white opacity-7" style="font-size: 0.8rem;"><?= date('l, d F Y') ?></span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- main header -->
      <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
          <div class="container clearfix">
            <!-- website logo -->
            <div class="logo-header mostion logo-dark" style="width: 100px; height: 100px; padding: 5px;">
              <a href="<?= base_url() ?>" class="d-block h-100">
                <img style="width: 100%; height: 100%; object-fit: contain; filter: drop-shadow(0 5px 15px rgba(0,0,0,0.1));" src="<?= base_url('logo/' . $web['logo']) ?>" alt="Logo BUMDes Kerinci">
              </a>
            </div>
            <!-- nav toggle button -->
            <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
            </button>
            <!-- extra nav -->
            <!-- extra nav -->
<div class="extra-nav">
    <div class="extra-cell">
        <?php if (!session()->get('user')): ?>
            <!-- Tampilkan icon login jika belum login -->
            <a href="<?= base_url('auth/login') ?>" class="login-icon" title="Login">
                <i class="fa fa-user"></i>
                <span class="login-text">Login</span>
            </a>
            
        <?php else: ?>
            <!-- Tampilkan dropdown user jika sudah login -->
            <?php $user = session()->get('user'); ?>
            <div class="user-dropdown">
                <div class="user-trigger">
                    <div class="user-avatar-sm">
                        <?= strtoupper(substr($user['nama'], 0, 1)) ?>
                    </div>
                    <span class="user-name"><?= $user['nama'] ?></span>
                    <i class="fa fa-chevron-down"></i>
                </div>
                <div class="user-menu">
                    <div class="user-info">
                        <div class="user-avatar">
                            <?= strtoupper(substr($user['nama'], 0, 1)) ?>
                        </div>
                        <div class="user-details">
                            <strong><?= $user['nama'] ?></strong>
                            <span><?= ucfirst($user['role']) ?></span>
                        </div>
                    </div>
                    <div class="user-links">
                        <?php 
                        $dashboard_url = ($user['role'] == 'admin') ? 'admin/dashboard' : 'bumdes/beranda';
                        $profile_url = ($user['role'] == 'admin') ? 'admin/profile' : 'bumdes/profile';
                        $settings_url = ($user['role'] == 'admin') ? 'admin/setting' : 'bumdes/settings';
                        ?>
                        <a href="<?= base_url($dashboard_url) ?>" class="user-menu-item">
                            <i class="fa fa-dashboard"></i>
                            Dashboard
                        </a>
                        <a href="<?= base_url($profile_url) ?>" class="user-menu-item">
                            <i class="fa fa-user"></i>
                            Profil Saya
                        </a>
                        <a href="<?= base_url($settings_url) ?>" class="user-menu-item">
                            <i class="fa fa-cog"></i>
                            Pengaturan
                        </a>
                        <div class="user-menu-divider"></div>
                        <a href="<?= base_url('auth/logout') ?>" class="user-menu-item logout">
                            <i class="fa fa-sign-out"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
            <!-- Quik search -->
            <div class="dlab-quik-search ">
              <form action="#">
                <input name="search" value="" type="text" class="form-control" placeholder="Cari informasi...">
                <span id="quik-search-remove"><i class="ti-close"></i></span>
              </form>
            </div>
            <!-- main nav -->
            <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
              <div class="logo-header d-md-block d-lg-none" style="width: 180px;">
                <a href="<?= base_url() ?>"><img src="<?= base_url('logo/' . $web['logo']) ?>" style="width: 100%; height: auto; object-fit: contain;" alt="Logo BUMDes"></a>
              </div>
              <ul class="nav navbar-nav">
                <li>
                  <a href="<?= base_url() ?>">Beranda</a>
                </li>
                <li>
                  <a href="<?= base_url('Tentang') ?>">Profil</a>
                </li>
                <li>
                  <a href="<?= base_url('Pasar') ?>">Pasar Desa</a>
                </li>
                <li>
                  <a href="<?= base_url('Layanan') ?>">Layanan</a>
                </li>
                <li>
                  <a href="<?= base_url('Berita') ?>">Berita</a>
                </li>
                <li>
                  <a href="<?= base_url('Pengumuman') ?>">Pengumuman</a>
                </li>
                <li>
                  <a href="<?= base_url('Agenda') ?>">Agenda</a>
                </li>
                <li>
                  <a href="<?= base_url('AlbumFoto') ?>">Gallery</a>
                </li>
                <li>
                  <a href="<?= base_url('Contact') ?>">Kontak</a>
                </li>
              </ul>
              <div class="dlab-social-icon">
                <ul>
                  <li><a href="<?= $web['fb'] ?>" class="site-button facebook hover"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="<?= $web['yt'] ?>" class="site-button google-plus hover"><i class="fa fa-youtube-play"></i></a></li>
                  <li><a href="<?= $web['linkedin'] ?>" class="site-button linkedin hover"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="<?= $web['ig'] ?>" class="site-button instagram hover"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="<?= $web['twitter'] ?>" class="site-button twitter hover"><i class="fa fa-twitter"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- main header END -->
    </header>
    <!-- header END -->

    <!-- Content -->
    <div class="page-content bg-white">
      <?php if ($page) {
        echo view($page);
      } ?>
    </div>

    <!-- Newsletter Section -->
    <div class="section-full p-tb50 newsletter-section text-white">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8 m-md-b30">
            <h4>Hubungi Kami Untuk Informasi Lebih Lengkap!</h4>
            <p class="m-b0">Dapatkan update terbaru tentang kegiatan dan layanan BUMDes</p>
          </div>
          <div class="col-md-4 text-right">
            <a href="<?= base_url('Contact') ?>" class="btn-premium-solid btn-lg">Hubungi Kami</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="site-footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-6 footer-col-4">
              <div class="widget widget_services border-0">
                <h5 class="m-b30">Menu Utama</h5>
                <ul>
                  <li><a href="<?= base_url() ?>">Beranda</a></li>
                  <li><a href="<?= base_url('Tentang') ?>">Tentang BUMDes</a></li>
                  <li><a href="<?= base_url('Layanan') ?>">Layanan</a></li>
                  <li><a href="<?= base_url('Berita') ?>">Berita</a></li>
                  <li><a href="<?= base_url('Contact') ?>">Kontak</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 footer-col-4">
              <div class="widget widget_services border-0">
                <h5 class="m-b30">Informasi</h5>
                <ul>
                  <li><a href="<?= base_url('Layanan') ?>">Layanan Masyarakat</a></li>
                  <li><a href="<?= base_url('Pengumuman') ?>">Pengumuman Terbaru</a></li>
                  <li><a href="<?= base_url('Agenda') ?>">Agenda Kegiatan</a></li>
                  <li><a href="<?= base_url('Pasar') ?>">Pasar Desa</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 footer-col-4">
              <div class="widget widget_getintuch">
                <h5 class="m-b30">Hubungi Kami</h5>
                <ul>
                  <li>
                    <i class="ti-location-pin"></i>
                    <div>
                      <strong>Alamat</strong>
                      <?= $web['alamat'] ?>
                    </div>
                  </li>
                  <li>
                    <i class="ti-mobile"></i>
                    <div>
                      <strong>Telepon</strong>
                      <?= $web['telpon'] ?>
                    </div>
                  </li>
                  <li>
                    <i class="ti-email"></i>
                    <div>
                      <strong>Email</strong>
                      <?= $web['email'] ?>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-6 footer-col-4">
              <div class="footer-logo-section text-center text-md-left">
                <img src="<?= base_url('logo/' . $web['logo']) ?>" width="150" alt="Logo BUMDes">
                <p class="m-t20">Membangun ekonomi desa berbasis digital untuk kesejahteraan warga Bumi Sakti Alam Kerinci.</p>
              </div>
                <h5><?= $web['nama_kampus'] ?></h5>
                <p>Badan Usaha Milik Desa yang berkomitmen untuk memajukan perekonomian desa</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- footer bottom part -->
      <div class="footer-bottom">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left">
              <span>Copyright © <?= date('Y') ?> <?= $web['nama_kampus'] ?>. All rights reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-right">
              <div class="footer-social-links">
                <a href="<?= $web['fb'] ?>" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="<?= $web['yt'] ?>" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                <a href="<?= $web['ig'] ?>" title="Instagram"><i class="fa fa-instagram"></i></a>
                <a href="<?= $web['twitter'] ?>" title="Twitter"><i class="fa fa-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer END -->

    <!-- scroll top button -->
    <button class="scroltop fa fa-chevron-up"></button>
  </div>

  <!-- JAVASCRIPT FILES ========================================= -->
  <script src="<?= base_url('front/') ?>js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
  <script src="<?= base_url('front/') ?>plugins/wow/wow.js"></script><!-- WOW JS -->
  <script src="<?= base_url('front/') ?>plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
  <script src="<?= base_url('front/') ?>plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAMIN JS -->
  <script src="<?= base_url('front/') ?>plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
  <script src="<?= base_url('front/') ?>plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
  <script src="<?= base_url('front/') ?>plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
  <script src="<?= base_url('front/') ?>plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
  <script src="<?= base_url('front/') ?>plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
  <script src="<?= base_url('front/') ?>plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
  <script src="<?= base_url('front/') ?>plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
  <script src="<?= base_url('front/') ?>plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
  <script src="<?= base_url('front/') ?>plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
  <script src="<?= base_url('front/') ?>plugins/lightgallery/js/lightgallery-all.min.js"></script><!-- Lightgallery -->
  <script src="<?= base_url('front/') ?>js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
  <script src="<?= base_url('front/') ?>js/dz.carousel.min.js"></script><!-- SORTCODE FUCTIONS  -->
  <script src="<?= base_url('front/') ?>plugins/countdown/jquery.countdown.js"></script><!-- COUNTDOWN FUCTIONS  -->
  <script src="<?= base_url('front/') ?>js/dz.ajax.js"></script><!-- CONTACT JS  -->
  <script src="<?= base_url('front/') ?>plugins/rangeslider/rangeslider.js"></script><!-- Rangeslider -->
  <script src="<?= base_url('front/') ?>js/jquery.lazy.min.js"></script>
  <!-- REVOLUTION JS FILES -->
  <script src="<?= base_url('front/') ?>plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
  <script src="<?= base_url('front/') ?>plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>

  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
      
      // Smooth scroll untuk footer links
      $('.footer-top a').on('click', function(e) {
        if (this.hash !== "") {
          e.preventDefault();
          const hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800);
        }
      });
    });
  </script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const userDropdown = document.querySelector('.user-dropdown');
    
    if (userDropdown) {
        let timeout;
        
        userDropdown.addEventListener('mouseenter', function() {
            clearTimeout(timeout);
            this.querySelector('.user-menu').style.opacity = '1';
            this.querySelector('.user-menu').style.visibility = 'visible';
            this.querySelector('.user-menu').style.transform = 'translateY(0)';
        });
        
        userDropdown.addEventListener('mouseleave', function() {
            const menu = this.querySelector('.user-menu');
            timeout = setTimeout(() => {
                menu.style.opacity = '0';
                menu.style.visibility = 'hidden';
                menu.style.transform = 'translateY(10px)';
            }, 300);
        });
        
        // Prevent menu from closing when hovering over it
        const userMenu = userDropdown.querySelector('.user-menu');
        userMenu.addEventListener('mouseenter', function() {
            clearTimeout(timeout);
        });
        
        userMenu.addEventListener('mouseleave', function() {
            timeout = setTimeout(() => {
                this.style.opacity = '0';
                this.style.visibility = 'hidden';
                this.style.transform = 'translateY(10px)';
            }, 300);
        });
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.user-dropdown')) {
            const openMenus = document.querySelectorAll('.user-menu');
            openMenus.forEach(menu => {
                menu.style.opacity = '0';
                menu.style.visibility = 'hidden';
                menu.style.transform = 'translateY(10px)';
            });
        }
    });

    // Hero Slider Initialization
    if($('.bumdes-hero-slider').length > 0) {
        $('.bumdes-hero-slider').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000,
            nav: true,
            dots: true,
            items: 1,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
        });
    }
});
</script>
</body>

</html>