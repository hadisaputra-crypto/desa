<?php
$db = \Config\Database::connect();
$web = $db->table('tbl_web')->where('id', '1')->get()->getRowArray();
$user = session()->get('user');
$level = session()->get('level');
$role_name = ($level == 4) ? 'Desa' : 'Dinas';
$base = ($level == 4) ? 'desa' : 'dinas';
$menu_roles = json_decode($web['menu_roles'] ?? '{}', true);
$active_menus = $menu_roles[(string)$level] ?? [];
function menu_aktif($key, $active_menus) { return in_array($key, $active_menus); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $role_name ?> | <?= $judul ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('logo/' . $web['logo']) ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <style>
    :root { --primary: #1565c0; }
    .bg-primary, .btn-primary { background-color: #1565c0 !important; }
    .main-sidebar { background: linear-gradient(180deg, #0d47a1 0%, #1565c0 100%) !important; }
    .brand-link { background: #0d47a1 !important; border-bottom: 1px solid rgba(255,255,255,.1) !important; }
    .nav-sidebar .nav-link { color: rgba(255,255,255,.85) !important; }
    .nav-sidebar .nav-link:hover { background-color: rgba(255,255,255,.12) !important; }
    .nav-sidebar .nav-link.active { color: #fff !important; }
    .content-header { background: #f4f6fb; }
    .badge-role { background: rgba(255,255,255,.15); padding: 2px 10px; border-radius: 20px; font-size: 11px; }
  </style>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini sidebar-dark-primary">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h5><b class="nav-link"><?= $subjudul ?></b></h5>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" data-widget="fullscreen" href="#"><i class="fas fa-expand-arrows-alt"></i></a></li>
      <li class="nav-item"><a class="nav-link" href="<?= base_url('Auth/LogOut') ?>"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="brand-image">
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('nama_user') ?></a>
          <small><span class="badge-role"><i class="fas fa-check-circle text-success"></i> Admin <?= $role_name ?></span></small>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-compact flex-column" data-widget="treeview" role="menu">
          <?php if (menu_aktif('dashboard', $active_menus)): ?>
          <li class="nav-item">
            <a href="<?= base_url("$base/beranda") ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p>
            </a>
          </li>
          <?php endif; ?>
          <?php if (menu_aktif('bumdes', $active_menus)): ?>
          <li class="nav-item">
            <a href="<?= base_url("$base/bumdes") ?>" class="nav-link <?= $menu == 'bumdes' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-shop"></i><p>Data BUMDes</p>
            </a>
          </li>
          <?php endif; ?>
          <?php if (menu_aktif('shu', $active_menus)): ?>
          <li class="nav-item">
            <a href="<?= base_url("$base/shu") ?>" class="nav-link <?= $menu == 'shu' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-percentage"></i><p>Pengaturan SHU</p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?= base_url('Auth/LogOut') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i><p>Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
              <li class="breadcrumb-item active"><?= $subjudul ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <?php if ($page) echo view($page); ?>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">Pemantauan BUMDes</div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url() ?>"><?= $web['nama_kampus'] ?></a>.</strong> All rights reserved.
  </footer>
</div>
</body>
</html>
