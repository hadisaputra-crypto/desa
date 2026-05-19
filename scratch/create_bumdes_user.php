<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
require 'app/Config/Database.php';
$db = \Config\Database::connect();

// Insert BUMDes
$bumdes_data = [
    'nama_bumdes' => 'BUMDes Berkah Mandiri',
    'desa' => 'Desa Makmur',
    'kecamatan' => 'Kecamatan Jaya',
    'kabupaten' => 'Kerinci',
    'provinsi' => 'Jambi',
    'status' => 1,
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s')
];
$db->table('tbl_bumdes')->insert($bumdes_data);
$id_bumdes = $db->insertID();

// Insert User
$user_data = [
    'nama_user' => 'Pengelola BUMDes Berkah',
    'username' => 'bumdes_berkah',
    'password' => sha1('password123'),
    'level' => 2,
    'id_bumdes' => $id_bumdes,
    'create_at' => date('Y-m-d H:i:s'),
    'update_at' => date('Y-m-d H:i:s')
];
$db->table('tbl_user')->insert($user_data);

echo "BUMDes and User created successfully!\n";
echo "ID BUMDes: $id_bumdes\n";
echo "Username: bumdes_berkah\n";
echo "Password: password123\n";
