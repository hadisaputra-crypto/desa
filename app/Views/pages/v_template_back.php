<?php
$db = \Config\Database::connect();

$web = $db->table('tbl_web')->where('id', '1')->get()->getRowArray();

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | <?= $judul ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('logo/' . $web['logo']) ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"  />

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.3/css/buttons.bootstrap4.min.css">

  <!-- Summernote -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.9.1/dist/summernote-bs4.min.css">

  <!-- AdminLTE (Theme) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- Custom Blue Theme Override -->
  <style>
    :root { --primary: #1565c0; }
    .bg-primary, .btn-primary, .nav-pills .nav-link.active { background-color: #1565c0 !important; }
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active { background-color: #1565c0 !important; }
    .main-sidebar { background: linear-gradient(180deg, #0d47a1 0%, #1565c0 100%) !important; }
    .brand-link { background: #0d47a1 !important; border-bottom: 1px solid rgba(255,255,255,.1) !important; }
    .nav-sidebar .nav-link { color: rgba(255,255,255,.85) !important; }
    .nav-sidebar .nav-link:hover { background-color: rgba(255,255,255,.12) !important; }
    .nav-sidebar .nav-link.active { color: #fff !important; }
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active,
    .sidebar-dark-primary .nav-sidebar > .nav-item.menu-open > .nav-link { color: #fff !important; }
    .nav-icon { color: rgba(255,255,255,.7) !important; }
    .user-panel a { color: rgba(255,255,255,.85) !important; }
    .main-header.navbar { border-bottom: 2px solid #1565c0 !important; }
    .content-header { background: #f4f6fb; }
    .page-item.active .page-link { background-color: #1565c0 !important; border-color: #1565c0 !important; }
  </style>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.3/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.3/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.3/js/buttons.colVis.min.js"></script>

  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

  <!-- Summernote -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.1/dist/summernote-bs4.min.js"></script>
</head>

<body class="hold-transition sidebar-mini sidebar-dark-primary">

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <h5>
            <b class="nav-link active">
              <!-- <?= $web['nama_kampus'] ?> -  -->
          <?= $subjudul ?></b></h5>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Auth/LogOut') ?>">
            <i class="fas fa-sign-out-alt"></i> Log Out
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <!-- <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
       <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="brand-image" >

        
      </a> -->

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="brand-image" >
          <div class="info">
            <a href="#" class="d-block"><?= session()->get('nama_user') ?></a>
            <small><i class="fas fa-check-circle text-success"></i><a> <?= session()->get('level') == 1 ? 'Admin' : 'User' ?></a></small>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar nav-compact nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item <?= $menu == 'profil' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'profil' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-landmark"></i>
                <p>
                  Profil
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/profil/tentang') ?>" class="nav-link <?= $submenu == 'tentang' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About Us</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/profil/visimisi') ?>" class="nav-link <?= $submenu == 'visimisi' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Visi Dan Misi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/profil/strukturorganisasi') ?>" class="nav-link <?= $submenu == 'struktur' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Struktur Organisasi</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('admin/layanan') ?>" class="nav-link <?= $menu == 'prodi' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-pen"></i>
                <p>
                  Layanan
                </p>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a href="<?= base_url('admin/buku') ?>" class="nav-link <?= $menu == 'prodi' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Buku
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('admin/team') ?>" class="nav-link <?= $menu == 'team' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Team
                </p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="<?= base_url('admin/agenda') ?>" class="nav-link <?= $submenu == 'agenda' ? 'active' : '' ?>">
                <i class="fas fa-calendar nav-icon"></i>
                <p>Agenda</p>
              </a>
            </li>

            <li class="nav-item <?= $menu == 'berita' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'berita' ? 'active' : '' ?>">
                <i class="nav-icon far fa-newspaper"></i>
                <p>
                  Berita
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/berita/kategori') ?>" class="nav-link <?= $submenu == 'kategori' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url('admin/berita') ?>" class="nav-link <?= $submenu == 'berita' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Berita</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item <?= $menu == 'gallery' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'gallery' ? 'active' : '' ?>">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Galleri
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/foto') ?>" class="nav-link <?= $submenu == 'foto' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Foto</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/video') ?>" class="nav-link <?= $submenu == 'video' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Video</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('admin/pengumuman') ?>" class="nav-link <?= $menu == 'pengumuman' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-bullhorn"></i>
                <p>
                  Pengumuman
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('admin/dokumen') ?>" class="nav-link <?= $menu == 'dokumen' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Dokumen
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a href="<?= base_url('admin/lembaga') ?>" class="nav-link <?= $menu == 'lembaga' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  Kerjasama
                </p>
              </a>
            </li>


            <li class="nav-item <?= $menu == 'bumdes' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'bumdes' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-shop"></i>
                <p>
                  BUMDes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/bumdes') ?>" class="nav-link <?= $submenu == 'list' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Data BUMDes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/bumdes/anggota') ?>" class="nav-link <?= $submenu == 'anggota' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-success"></i>
                    <p>Anggota</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/bumdes/layanan') ?>" class="nav-link <?= $submenu == 'layanan' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-warning"></i>
                    <p>Layanan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/bumdes/produk') ?>" class="nav-link <?= $submenu == 'produk' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-primary"></i>
                    <p>Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/bumdes/transaksi') ?>" class="nav-link <?= $submenu == 'transaksi' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-danger"></i>
                    <p>Transaksi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/bumdes/unitusaha') ?>" class="nav-link <?= $submenu == 'unitusaha' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-secondary"></i>
                    <p>Unit Usaha</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/bumdes/user') ?>" class="nav-link <?= $submenu == 'user' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon text-white"></i>
                    <p>Pengguna BUMDes</p>
                  </a>
                </li>
              </ul>
            </li>

            



            <li class="nav-item <?= $menu == 'setting' ? 'menu-open' : '' ?>">
              <a href="#" class="nav-link <?= $menu == 'setting' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Setting
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/setting/logo') ?>" class="nav-link <?= $submenu == 'logo' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/setting/header') ?>" class="nav-link <?= $submenu == 'header' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Header</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/setting/lembaga') ?>" class="nav-link <?= $submenu == 'lembaga' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lembaga</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/app') ?>" class="nav-link <?= $submenu == 'app' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>App</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/slider') ?>" class="nav-link <?= $submenu == 'slider' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Slider</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/setting/sambutan') ?>" class="nav-link <?= $submenu == 'sambutan' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sambutan</p>
                  </a>
                </li>
                <?php if (session()->get('level') == 1 || (session()->get('user') && session()->get('user')['level'] == 1)) { ?>
                <li class="nav-item">
                  <a href="<?= base_url('admin/user') ?>" class="nav-link <?= $menu == 'user' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </li>




          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- <h1><small class="text-primary"><?= $subjudul ?></small></h1> -->

            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
                <li class="breadcrumb-item active"><?= $subjudul ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <?php if ($page) {
            echo view($page);
          } ?>

        </div>
      </section>
      <!-- /.content -->
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url() ?>"><?= $web['nama_kampus'] ?></a>.</strong> All rights reserved.
    </footer>
  </div> <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <script>
    window.setTimeout(function() {
      $(".hiden").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);
  </script>
</body>

</html>