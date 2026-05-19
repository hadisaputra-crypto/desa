<?php include('../config.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tambah Konten</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Tambah Konten Baru</h2>
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Judul" required><br>
    <textarea name="description" placeholder="Deskripsi" required></textarea><br>
    <input type="file" name="image"><br>
    <button type="submit" name="save">Simpan</button>
  </form>

  <?php
  if (isset($_POST['save'])) {
      $title = $_POST['title'];
      $desc = $_POST['description'];
      $img = $_FILES['image']['name'];
      $tmp = $_FILES['image']['tmp_name'];

      move_uploaded_file($tmp, "../uploads/".$img);
      mysqli_query($conn, "INSERT INTO content (title, description, image) VALUES ('$title', '$desc', '$img')");
      header("Location: dashboard.php?notif=Konten berhasil ditambahkan!");
  }
  ?>
</body>
</html>