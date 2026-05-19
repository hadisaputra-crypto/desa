<?php
require 'app/Config/Database.php';
$db = \Config\Database::connect();
$fields = $db->getFieldNames('tbl_layanan');
print_r($fields);
