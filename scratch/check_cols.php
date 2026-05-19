<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
require 'app/Config/Database.php';
$db = \Config\Database::connect();
$fields = $db->getFieldData('tbl_layanan');
foreach ($fields as $field) {
    echo $field->name . "\n";
}
