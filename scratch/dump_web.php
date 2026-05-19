<?php
require 'app/Config/Constants.php';
require 'system/bootstrap.php';
$db = \Config\Database::connect();
$row = $db->table('tbl_web')->get()->getRowArray();
print_r($row);
