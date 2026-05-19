<?php
include('../config.php');
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM content WHERE id=$id");
header("Location: dashboard.php?notif=Konten berhasil dihapus!");
?>