<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(false);

// =====================================================================
// PUBLIC ROUTES (Frontend Desa)
// =====================================================================
$routes->get('/', 'Home::getindex');
$routes->get('Tentang', 'Home::gettentang');
$routes->get('VisiMisi', 'Home::getVisiMisi');
$routes->get('StrukturOrganisasi', 'Home::getStrukturOrganisasi');
$routes->get('Agenda', 'Home::getAgenda');
$routes->get('Agenda/Detail/(:num)', 'Home::getAgendaDetail/$1');
$routes->get('Pengumuman', 'Home::getPengumuman');
$routes->get('Pengumuman/Detail/(:num)', 'Home::getPengumumanDetail/$1');
$routes->get('Berita', 'Home::getBerita');
$routes->get('Berita/Detail/(:num)', 'Home::getBeritaDetail/$1');
$routes->get('Layanan', 'Home::getLayanan');
$routes->get('Layanan/Detail/(:num)', 'Home::getLayananDetail/$1');
$routes->get('Download', 'Home::getDownload');
$routes->get('AlbumFoto', 'Home::getAlbumFoto');
$routes->get('AlbumFoto/Foto/(:num)', 'Home::getFoto/$1');
$routes->get('Gallery', 'Home::getAlbumFoto');
$routes->get('Video', 'Home::getVideo');
$routes->get('Contact', 'Home::Contact');
$routes->get('Pasar', 'Home::getPasar');
$routes->get('Pasar/Detail/(:num)', 'Home::getPasarDetail/$1');

// =====================================================================
// AUTH ROUTES - tidak perlu filter auth (halaman login terbuka)
// =====================================================================
$routes->get('Auth/Login',   'Auth::getlogin');
$routes->get('auth/login',   'Auth::getlogin');
$routes->post('Auth/CekLogin', 'Auth::postceklogin');
$routes->post('auth/ceklogin', 'Auth::postceklogin');
$routes->get('Auth/Logout',  'Auth::getLogOut');
$routes->get('auth/logout',  'Auth::getLogOut');
$routes->get('Auth/LogOut',  'Auth::getLogOut');
$routes->get('login',        'Auth::getlogin'); // alias pendek

// =====================================================================
// ADMIN ROUTES (Panel Admin — dilindungi filter auth)
// =====================================================================
$admin_route_list = static function ($routes) {
    $routes->get('/',          'Dashboard::getIndex');
    $routes->get('dashboard',  'Dashboard::getIndex');

    // Profile Saya (Personal)
    $routes->get('profile',                   'Profile::getIndex');
    $routes->get('Profile',                   'Profile::getIndex');
    $routes->post('profile/updateProfile',    'Profile::updateProfile');
    $routes->post('Profile/updateProfile',    'Profile::updateProfile');
    $routes->post('profile/changePassword',   'Profile::changePassword');
    $routes->post('Profile/changePassword',   'Profile::changePassword');

    // Profil
    $routes->get('profil',                    'Profil::getTentang');
    $routes->get('Profil',                    'Profil::getTentang');
    $routes->get('profil/tentang',            'Profil::getTentang');
    $routes->get('Profil/Tentang',            'Profil::getTentang');
    $routes->get('Profil/getTentang',         'Profil::getTentang');
    $routes->post('profil/updateabout',       'Profil::updateAbout');
    $routes->post('Profil/updateAbout',       'Profil::updateAbout');
    $routes->get('profil/visimisi',           'Profil::getVisiMisi');
    $routes->get('Profil/VisiMisi',           'Profil::getVisiMisi');
    $routes->get('Profil/getVisiMisi',        'Profil::getVisiMisi');
    $routes->post('profil/updatevisimisi',    'Profil::updateVisiMisi');
    $routes->post('Profil/updateVisiMisi',    'Profil::updateVisiMisi');
    $routes->get('profil/strukturorganisasi', 'Profil::getStrukturOrganisasi');
    $routes->get('Profil/StrukturOrganisasi', 'Profil::getStrukturOrganisasi');
    $routes->get('Profil/getStrukturOrganisasi', 'Profil::getStrukturOrganisasi');
    $routes->post('profil/updatestrukturorganisasi', 'Profil::updateStrukturOrganisasi');
    $routes->post('Profil/updateStrukturOrganisasi', 'Profil::updateStrukturOrganisasi');

    // Berita
    $routes->get('berita',                    'Berita::getindex');
    $routes->get('Berita',                    'Berita::getindex');
    $routes->get('berita/tambahData',         'Berita::gettambahData');
    $routes->get('Berita/tambahData',         'Berita::gettambahData');
    $routes->post('berita/insertData',        'Berita::insertData');
    $routes->post('Berita/insertData',        'Berita::insertData');
    $routes->get('berita/editData/(:num)',    'Berita::geteditData/$1');
    $routes->get('Berita/editData/(:num)',    'Berita::geteditData/$1');
    $routes->post('berita/updateData/(:num)', 'Berita::updateData/$1');
    $routes->post('Berita/updateData/(:num)', 'Berita::updateData/$1');
    $routes->get('berita/deleteData/(:num)',  'Berita::deleteData/$1');
    $routes->get('Berita/deleteData/(:num)',  'Berita::deleteData/$1');
    $routes->get('berita/kategori',           'Berita::getKategori');
    $routes->get('Berita/kategori',           'Berita::getKategori');
    $routes->post('berita/insertkategori',    'Berita::getinsertDataKategori');
    $routes->post('berita/updatekategori/(:num)', 'Berita::updateDataKategori/$1');
    $routes->get('berita/deletekategori/(:num)', 'Berita::deleteDataKategori/$1');
    
    // Agenda
    $routes->get('agenda',                    'Agenda::getindex');
    $routes->get('Agenda',                    'Agenda::getindex');
    $routes->get('agenda/tambahData',         'Agenda::gettambahData');
    $routes->get('Agenda/tambahData',         'Agenda::gettambahData');
    $routes->post('agenda/insertData',        'Agenda::insertData');
    $routes->post('Agenda/insertData',        'Agenda::insertData');
    $routes->get('agenda/editData/(:num)',    'Agenda::geteditData/$1');
    $routes->get('Agenda/editData/(:num)',    'Agenda::geteditData/$1');
    $routes->post('agenda/updateData/(:num)', 'Agenda::updateData/$1');
    $routes->post('Agenda/updateData/(:num)', 'Agenda::updateData/$1');
    $routes->get('agenda/deleteData/(:num)',  'Agenda::deleteData/$1');
    $routes->get('Agenda/deleteData/(:num)',  'Agenda::deleteData/$1');

    // Layanan
    $routes->get('layanan',                    'Layanan::getindex');
    $routes->get('Layanan',                    'Layanan::getindex');
    $routes->get('layanan/tambahData',         'Layanan::gettambahData');
    $routes->get('Layanan/tambahData',         'Layanan::gettambahData');
    $routes->post('layanan/insertData',        'Layanan::insertData');
    $routes->post('Layanan/insertData',        'Layanan::insertData');
    $routes->get('layanan/editData/(:num)',    'Layanan::geteditData/$1');
    $routes->get('Layanan/editData/(:num)',    'Layanan::geteditData/$1');
    $routes->post('layanan/updateData/(:num)', 'Layanan::updateData/$1');
    $routes->post('Layanan/updateData/(:num)', 'Layanan::updateData/$1');
    $routes->get('layanan/deleteData/(:num)',  'Layanan::deleteData/$1');
    $routes->get('Layanan/deleteData/(:num)',  'Layanan::deleteData/$1');

    // Lembaga
    $routes->get('lembaga',                    'Lembaga::getindex');
    $routes->get('Lembaga',                    'Lembaga::getindex');
    $routes->get('lembaga/tambahData',         'Lembaga::gettambahData');
    $routes->get('Lembaga/tambahData',         'Lembaga::gettambahData');
    $routes->post('lembaga/insertData',        'Lembaga::InsertData');
    $routes->post('Lembaga/insertData',        'Lembaga::InsertData');
    $routes->get('lembaga/editData/(:num)',    'Lembaga::geteditData/$1');
    $routes->get('Lembaga/editData/(:num)',    'Lembaga::geteditData/$1');
    $routes->post('lembaga/updateData/(:num)', 'Lembaga::updateData/$1');
    $routes->post('Lembaga/updateData/(:num)', 'Lembaga::updateData/$1');
    $routes->get('lembaga/deleteData/(:num)',  'Lembaga::deleteData/$1');
    $routes->get('Lembaga/deleteData/(:num)',  'Lembaga::deleteData/$1');

    // Team
    $routes->get('team',                    'Team::getindex');
    $routes->get('Team',                    'Team::getindex');
    $routes->get('team/tambahData',         'Team::gettambahData');
    $routes->get('Team/tambahData',         'Team::gettambahData');
    $routes->post('team/insertData',        'Team::insertData');
    $routes->post('Team/insertData',        'Team::insertData');
    $routes->get('team/editData/(:num)',    'Team::geteditData/$1');
    $routes->get('Team/editData/(:num)',    'Team::geteditData/$1');
    $routes->post('team/updateData/(:num)', 'Team::updateData/$1');
    $routes->post('Team/updateData/(:num)', 'Team::updateData/$1');
    $routes->get('team/deleteData/(:num)',  'Team::deleteData/$1');
    $routes->get('Team/deleteData/(:num)',  'Team::deleteData/$1');

    // Foto
    $routes->get('foto',                         'Foto::getindex');
    $routes->get('foto/tambahalbum',             'Foto::gettambahAlbum');
    $routes->post('foto/insertdataalbum',        'Foto::insertDataAlbum');
    $routes->get('foto/deletealbum/(:num)',      'Foto::deleteAlbum/$1');
    $routes->get('foto/tambahfoto/(:num)',       'Foto::gettambahFoto/$1');
    $routes->post('foto/uploadfoto/(:num)',      'Foto::uploadFoto/$1');
    $routes->get('foto/deletefoto/(:num)/(:num)', 'Foto::deleteFoto/$1/$2');

    // Video
    $routes->get('video',                    'Video::getindex');
    $routes->get('video/tambahData',         'Video::getTambah');
    $routes->get('video/tambahdata',         'Video::getTambah');
    $routes->post('video/insertData',        'Video::insertData');
    $routes->post('video/insertdata',        'Video::insertData');
    $routes->post('video/updateData/(:num)', 'Video::updateData/$1');
    $routes->post('video/updatedata/(:num)', 'Video::updateData/$1');
    $routes->get('video/deleteData/(:num)',  'Video::deleteData/$1');
    $routes->get('video/deletedata/(:num)',  'Video::deleteData/$1');

    // Slider
    $routes->get('slider',                    'Slider::getindex');
    $routes->get('slider/tambahData',         'Slider::gettambahData');
    $routes->get('slider/tambahdata',         'Slider::gettambahData');
    $routes->post('slider/insertData',        'Slider::InsertData');
    $routes->post('slider/insertdata',        'Slider::InsertData');
    $routes->get('slider/editData/(:num)',    'Slider::geteditData/$1');
    $routes->get('slider/editdata/(:num)',    'Slider::geteditData/$1');
    $routes->post('slider/updateData/(:num)', 'Slider::updateData/$1');
    $routes->post('slider/updatedata/(:num)', 'Slider::updateData/$1');
    $routes->get('slider/deleteData/(:num)',  'Slider::deleteData/$1');
    $routes->get('slider/deletedata/(:num)',  'Slider::deleteData/$1');

    // Pengumuman
    $routes->get('pengumuman',                    'Pengumuman::getindex');
    $routes->get('pengumuman/tambahData',         'Pengumuman::gettambahData');
    $routes->get('pengumuman/tambahdata',         'Pengumuman::gettambahData');
    $routes->post('pengumuman/insertData',        'Pengumuman::insertData');
    $routes->post('pengumuman/insertdata',        'Pengumuman::insertData');
    $routes->get('pengumuman/editData/(:num)',    'Pengumuman::geteditData/$1');
    $routes->get('pengumuman/editdata/(:num)',    'Pengumuman::geteditData/$1');
    $routes->post('pengumuman/updateData/(:num)', 'Pengumuman::updateData/$1');
    $routes->post('pengumuman/updatedata/(:num)', 'Pengumuman::updateData/$1');
    $routes->get('pengumuman/deleteData/(:num)',  'Pengumuman::deleteData/$1');
    $routes->get('pengumuman/deletedata/(:num)',  'Pengumuman::deleteData/$1');
    
    // Alias Pengumuman (Case Insensitive)
    $routes->get('Pengumuman',                    'Pengumuman::getindex');
    $routes->get('Pengumuman/tambahData',         'Pengumuman::gettambahData');
    $routes->post('Pengumuman/insertData',        'Pengumuman::insertData');
    $routes->get('Pengumuman/editData/(:num)',    'Pengumuman::geteditData/$1');
    $routes->post('Pengumuman/updateData/(:num)', 'Pengumuman::updateData/$1');
    $routes->get('Pengumuman/deleteData/(:num)',  'Pengumuman::deleteData/$1');
    $routes->get('Pengumuman/deletedata/(:num)',  'Pengumuman::deleteData/$1');

    // Dokumen
    $routes->get('dokumen',                    'Dokumen::getindex');
    $routes->get('dokumen/tambahData',         'Dokumen::gettambahData');
    $routes->get('dokumen/tambahdata',         'Dokumen::gettambahData');
    $routes->post('dokumen/insertData',        'Dokumen::insertData');
    $routes->post('dokumen/insertdata',        'Dokumen::insertData');
    $routes->get('dokumen/editData/(:num)',    'Dokumen::geteditData/$1');
    $routes->get('dokumen/editdata/(:num)',    'Dokumen::geteditData/$1');
    $routes->post('dokumen/updateData/(:num)', 'Dokumen::updateData/$1');
    $routes->post('dokumen/updatedata/(:num)', 'Dokumen::updateData/$1');
    $routes->get('dokumen/deleteData/(:num)',  'Dokumen::deleteData/$1');
    $routes->get('dokumen/deletedata/(:num)',  'Dokumen::deleteData/$1');
    
    // Alias Dokumen (Case Insensitive)
    $routes->get('Dokumen',                    'Dokumen::getindex');
    $routes->get('Dokumen/deleteData/(:num)',  'Dokumen::deleteData/$1');

    // Buku
    $routes->get('buku',                    'Buku::getindex');
    $routes->get('Buku',                    'Buku::getindex');
    $routes->get('buku/tambahData',         'Buku::gettambahData');
    $routes->get('Buku/tambahData',         'Buku::gettambahData');
    $routes->post('buku/insertData',        'Buku::insertData');
    $routes->post('Buku/insertData',        'Buku::insertData');
    $routes->get('buku/editData/(:num)',    'Buku::geteditData/$1');
    $routes->get('Buku/editData/(:num)',    'Buku::geteditData/$1');
    $routes->post('buku/updateData/(:num)', 'Buku::updateData/$1');
    $routes->post('Buku/updateData/(:num)', 'Buku::updateData/$1');
    $routes->get('buku/deleteData/(:num)',  'Buku::deleteData/$1');
    $routes->get('buku/deletedata/(:num)',  'Buku::deleteData/$1');
    $routes->get('Buku/deleteData/(:num)',  'Buku::deleteData/$1');

    // Apps
    $routes->get('app',                    'App::getindex');
    $routes->post('app/insertData',        'App::getinsertData');
    $routes->post('app/insertdata',        'App::getinsertData');
    $routes->post('app/updateData/(:num)', 'App::updateData/$1');
    $routes->post('app/updatedata/(:num)', 'App::updateData/$1');
    $routes->get('app/deleteData/(:num)',  'App::deleteData/$1');
    $routes->get('app/deletedata/(:num)',  'App::deleteData/$1');

    // BUMDes Management
    $routes->get('bumdes',                    'Bumdes::getindex');
    $routes->get('bumdes/tambahData',         'Bumdes::gettambahData');
    $routes->post('bumdes/insertData',        'Bumdes::insertData');
    $routes->get('bumdes/editData/(:num)',    'Bumdes::geteditData/$1');
    $routes->post('bumdes/updateData/(:num)', 'Bumdes::updateData/$1');
    $routes->get('bumdes/deleteData/(:num)',  'Bumdes::deleteData/$1');
    
    // BUMDes Sub-data (Global or filtered by id_bumdes)
    $routes->get('bumdes/anggota',            'Bumdes::anggota');
    $routes->get('bumdes/anggota/(:num)',     'Bumdes::anggota/$1');
    $routes->get('bumdes/anggota/tambah',     'Bumdes::tambahAnggota');
    $routes->get('bumdes/anggota/tambah/(:num)', 'Bumdes::tambahAnggota/$1');
    $routes->post('bumdes/anggota/insert',    'Bumdes::insertAnggota');
    $routes->get('bumdes/anggota/edit/(:num)', 'Bumdes::editAnggota/$1');
    $routes->post('bumdes/anggota/update/(:num)', 'Bumdes::updateAnggota/$1');
    $routes->get('bumdes/anggota/delete/(:num)', 'Bumdes::deleteAnggota/$1');
    $routes->get('bumdes/layanan',            'Bumdes::layanan');
    $routes->get('bumdes/layanan/(:num)',     'Bumdes::layanan/$1');
    $routes->get('bumdes/layanan/tambah',     'Bumdes::tambahLayanan');
    $routes->get('bumdes/layanan/tambah/(:num)', 'Bumdes::tambahLayanan/$1');
    $routes->post('bumdes/layanan/insert',    'Bumdes::insertLayanan');
    $routes->get('bumdes/layanan/edit/(:num)', 'Bumdes::editLayanan/$1');
    $routes->post('bumdes/layanan/update/(:num)', 'Bumdes::updateLayanan/$1');
    $routes->get('bumdes/layanan/delete/(:num)', 'Bumdes::deleteLayanan/$1');
    $routes->get('bumdes/transaksi',          'Bumdes::transaksi');
    $routes->get('bumdes/transaksi/(:num)',   'Bumdes::transaksi/$1');
    $routes->get('bumdes/produk',             'Bumdes::produk');
    $routes->get('bumdes/produk/(:num)',      'Bumdes::produk/$1');
    $routes->get('bumdes/produk/tambah',      'Bumdes::tambahProduk');
    $routes->get('bumdes/produk/tambah/(:num)', 'Bumdes::tambahProduk/$1');
    $routes->post('bumdes/produk/insert',     'Bumdes::insertProduk');
    $routes->get('bumdes/produk/edit/(:num)',  'Bumdes::editProduk/$1');
    $routes->post('bumdes/produk/update/(:num)', 'Bumdes::updateProduk/$1');
    $routes->get('bumdes/produk/delete/(:num)', 'Bumdes::deleteProduk/$1');
    $routes->get('bumdes/unitusaha',          'Bumdes::unitusaha');
    $routes->get('bumdes/unitusaha/(:num)',   'Bumdes::unitusaha/$1');
    $routes->get('bumdes/unitusaha/tambah',    'Bumdes::tambahUnit');
    $routes->get('bumdes/unitusaha/tambah/(:num)', 'Bumdes::tambahUnit/$1');
    $routes->post('bumdes/unitusaha/insert',   'Bumdes::insertUnit');
    $routes->get('bumdes/unitusaha/edit/(:num)', 'Bumdes::editUnit/$1');
    $routes->post('bumdes/unitusaha/update/(:num)', 'Bumdes::updateUnit/$1');
    $routes->get('bumdes/unitusaha/delete/(:num)', 'Bumdes::deleteUnit/$1');
    $routes->get('bumdes/user',              'Bumdes::user');
    $routes->get('bumdes/user/(:num)',       'Bumdes::user/$1');
    $routes->get('bumdes/user/tambah',       'Bumdes::tambahUser');
    $routes->get('bumdes/user/tambah/(:num)', 'Bumdes::tambahUser/$1');
    $routes->post('bumdes/user/insert',      'Bumdes::insertUser');
    $routes->get('bumdes/user/edit/(:num)',   'Bumdes::editUser/$1');
    $routes->post('bumdes/user/update/(:num)', 'Bumdes::updateUser/$1');
    $routes->get('bumdes/user/delete/(:num)', 'Bumdes::deleteUser/$1');

    // Setting
    $routes->get('setting',                   'Setting::getLogo');
    $routes->get('Setting',                   'Setting::getLogo');
    $routes->get('setting/logo',              'Setting::getLogo');
    $routes->get('Setting/Logo',              'Setting::getLogo');
    $routes->post('setting/updatelogo',       'Setting::updateLogo');
    $routes->post('Setting/updateLogo',       'Setting::updateLogo');
    $routes->get('setting/header',            'Setting::getHeader');
    $routes->get('Setting/Header',            'Setting::getHeader');
    $routes->post('setting/updateheader',     'Setting::updateHeader');
    $routes->post('Setting/updateHeader',     'Setting::updateHeader');
    $routes->get('setting/lembaga',           'Setting::getLembaga');
    $routes->get('Setting/Lembaga',           'Setting::getLembaga');
    $routes->post('setting/updatekampus',     'Setting::updateKampus');
    $routes->post('Setting/updateKampus',     'Setting::updateKampus');
    $routes->get('setting/sambutan',          'Setting::getSambutan');
    $routes->get('Setting/Sambutan',          'Setting::getSambutan');
    $routes->post('setting/updatesambutan',   'Setting::updateSambutan');
    $routes->post('Setting/updateSambutan',   'Setting::updateSambutan');

    // User Management
    $routes->get('user',                    'User::getindex');
    $routes->get('User',                    'User::getindex');
    
    $routes->post('user/insertData',        'User::insertData');
    $routes->post('user/insertdata',        'User::insertData');
    $routes->post('User/insertData',        'User::insertData');
    $routes->post('User/insertdata',        'User::insertData');
    
    $routes->post('user/updateData/(:num)', 'User::updateData/$1');
    $routes->post('user/updatedata/(:num)', 'User::updateData/$1');
    $routes->post('User/updateData/(:num)', 'User::updateData/$1');
    $routes->post('User/updatedata/(:num)', 'User::updateData/$1');
    
    $routes->post('user/updatePassword/(:num)', 'User::updatePassword/$1');
    $routes->post('user/updatepassword/(:num)', 'User::updatePassword/$1');
    $routes->post('User/updatePassword/(:num)', 'User::updatePassword/$1');
    $routes->post('User/updatepassword/(:num)', 'User::updatePassword/$1');
    
    $routes->get('user/deleteData/(:num)',  'User::deleteData/$1');
    $routes->get('user/deletedata/(:num)',  'User::deleteData/$1');
    $routes->get('User/deleteData/(:num)',  'User::deleteData/$1');
    $routes->get('User/deletedata/(:num)',  'User::deleteData/$1');
    $routes->get('User/deleteData/(:num)',  'User::deleteData/$1');
    $routes->get('User/deletedata/(:num)',  'User::deleteData/$1');
};

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'], $admin_route_list);
$routes->group('Admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'], $admin_route_list);

// =====================================================================
// BUMDES ROUTES (Panel BUMDes — dilindungi filter auth)
// =====================================================================
$routes->group('bumdes', ['namespace' => 'App\Controllers\Bumdes', 'filter' => 'auth'], static function ($routes) {
    // Beranda
    $routes->get('/',        'Beranda::index');
    $routes->get('beranda',  'Beranda::index');

    // Unit Usaha — CRUD Lengkap
    $routes->get('unit',                    'Unitusaha::index');
    $routes->get('unitusaha',               'Unitusaha::index');
    $routes->get('unit/create',             'Unitusaha::create');
    $routes->get('unitusaha/create',        'Unitusaha::create');
    $routes->post('unit/store',             'Unitusaha::store');
    $routes->post('unitusaha/store',        'Unitusaha::store');
    $routes->get('unit/edit/(:num)',        'Unitusaha::edit/$1');
    $routes->get('unitusaha/edit/(:num)',   'Unitusaha::edit/$1');
    $routes->post('unit/update/(:num)',     'Unitusaha::update/$1');
    $routes->post('unitusaha/update/(:num)', 'Unitusaha::update/$1');
    $routes->get('unit/delete/(:num)',      'Unitusaha::delete/$1');
    $routes->get('unitusaha/delete/(:num)', 'Unitusaha::delete/$1');
    $routes->get('unit/detail/(:num)',      'Unitusaha::detail/$1');
    $routes->get('unitusaha/detail/(:num)', 'Unitusaha::detail/$1');

    // Modul lain
    $routes->get('laporan',    'Laporan::getIndex');

    // Transaksi — CRUD Lengkap
    $routes->get('transaksi',               'Transaksi::index');
    $routes->get('transaksi/create',        'Transaksi::create');
    $routes->post('transaksi/store',        'Transaksi::store');
    $routes->get('transaksi/edit/(:num)',   'Transaksi::edit/$1');
    $routes->post('transaksi/update/(:num)', 'Transaksi::update/$1');
    $routes->get('transaksi/delete/(:num)', 'Transaksi::delete/$1');
    $routes->get('transaksi/detail/(:num)', 'Transaksi::detail/$1');

    // Produk — CRUD Lengkap
    $routes->get('produk',                  'Produk::index');
    $routes->get('produk/create',           'Produk::create');
    $routes->post('produk/store',           'Produk::store');
    $routes->get('produk/edit/(:num)',      'Produk::edit/$1');
    $routes->post('produk/update/(:num)',   'Produk::update/$1');
    $routes->get('produk/delete/(:num)',    'Produk::delete/$1');
    $routes->get('produk/detail/(:num)',    'Produk::detail/$1');

    // Kategori — CRUD Lengkap
    $routes->get('kategori',                'Kategori::index');
    $routes->get('kategori/create',         'Kategori::create');
    $routes->post('kategori/store',         'Kategori::store');
    $routes->get('kategori/edit/(:num)',    'Kategori::edit/$1');
    $routes->post('kategori/update/(:num)', 'Kategori::update/$1');
    $routes->get('kategori/delete/(:num)',  'Kategori::delete/$1');

    // Layanan — CRUD Lengkap
    $routes->get('layanan',                 'Layanan::index');
    $routes->get('layanan/create',          'Layanan::create');
    $routes->post('layanan/store',          'Layanan::store');
    $routes->get('layanan/edit/(:num)',     'Layanan::edit/$1');
    $routes->post('layanan/update/(:num)',  'Layanan::update/$1');
    $routes->get('layanan/delete/(:num)',   'Layanan::delete/$1');
    $routes->get('layanan/detail/(:num)',   'Layanan::detail/$1');

    // Pengumuman — CRUD Lengkap
    $routes->get('pengumuman',                 'Pengumuman::index');
    $routes->get('pengumuman/create',          'Pengumuman::create');
    $routes->post('pengumuman/store',          'Pengumuman::store');
    $routes->get('pengumuman/edit/(:num)',     'Pengumuman::edit/$1');
    $routes->post('pengumuman/update/(:num)',  'Pengumuman::update/$1');
    $routes->get('pengumuman/delete/(:num)',   'Pengumuman::delete/$1');
    $routes->get('pengumuman/detail/(:num)',   'Pengumuman::detail/$1');

    // Anggota — CRUD Lengkap
    $routes->get('anggota',                 'Anggota::index');
    $routes->get('anggota/create',          'Anggota::create');
    $routes->post('anggota/store',          'Anggota::store');
    $routes->get('anggota/edit/(:num)',     'Anggota::edit/$1');
    $routes->post('anggota/update/(:num)',  'Anggota::update/$1');
    $routes->get('anggota/delete/(:num)',   'Anggota::delete/$1');
    $routes->get('anggota/detail/(:num)',   'Anggota::detail/$1');
    $routes->get('profile',    'Profile::getIndex');
    $routes->post('profile/update',   'Profile::updateProfile');
    $routes->post('profile/password', 'Profile::changePassword');
    $routes->get('settings',   'Settings::getIndex');
    // User — CRUD Lengkap
    $routes->get('user',                    'User::index');
    $routes->get('user/create',             'User::create');
    $routes->post('user/store',             'User::store');
    $routes->get('user/edit/(:num)',        'User::edit/$1');
    $routes->post('user/update/(:num)',     'User::update/$1');
    $routes->get('user/delete/(:num)',      'User::delete/$1');
});
