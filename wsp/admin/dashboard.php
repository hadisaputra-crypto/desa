<?php include('../config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Dashboard Admin</h1>
  <a href="add_content.php" class="btn">+ Tambah Konten</a>
  <hr>

  <?php
  if (isset($_GET['notif'])) {
      echo "<div class='notif'>".$_GET['notif']."</div>";
  }

  $result = mysqli_query($conn, "SELECT * FROM content ORDER BY id DESC");
  ?>

  <table>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <tr>
          <td>$no</td>
          <td>{$row['title']}</td>
          <td>{$row['description']}</td>
          <td><img src='../uploads/{$row['image']}' width='80'></td>
          <td>
            <a href='edit_content.php?id={$row['id']}'>Edit</a> | 
            <a href='delete_content.php?id={$row['id']}'>Hapus</a>
          </td>
        </tr>";
        $no++;
    }
    ?>
  </table>
</body>
</html>