<?php
$db = mysqli_connect('localhost', 'pma_user', 'user', 'db_bumdes');
$tables = mysqli_query($db, "SHOW TABLES");
while ($row = mysqli_fetch_array($tables)) {
    $table = $row[0];
    $cols = mysqli_query($db, "DESCRIBE $table");
    $has_bumdes = false;
    while ($col = mysqli_fetch_array($cols)) {
        if ($col[0] == 'id_bumdes') {
            $has_bumdes = true;
            break;
        }
    }
    echo "$table: " . ($has_bumdes ? "YES" : "NO") . "\n";
}
