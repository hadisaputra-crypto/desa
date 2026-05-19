<?php
// We need to define ROOTPATH and other constants
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
require 'app/Config/Constants.php';
require 'system/bootstrap.php';

$db = \Config\Database::connect();
$test_content = "Test Update " . date('Y-m-d H:i:s');
$result = $db->table('tbl_web')
    ->where('id', 1)
    ->update(['tentang' => $test_content]);

if ($result) {
    echo "Update successful\n";
    $row = $db->table('tbl_web')->where('id', 1)->get()->getRowArray();
    echo "Current content: " . $row['tentang'] . "\n";
} else {
    echo "Update failed\n";
}
