<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul ?> | <?= $web['nama_kampus'] ?></title>

  <link rel="icon" href="<?= base_url('logo/' . $web['logo']) ?>" type="image/x-icon" />
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
  <!-- iCheck Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
  
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="content">
    <div class="login-box"></div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="card-header text-center">
              <!-- <img src="<?= base_url('logo/' . $web['logo']) ?>" width="180px"> -->
               <h2>Halaman Login tes</h2>
            </div>

            <?php
            session();
            $validasi = \Config\Services::validation();
            if (session()->get('pesan')) {
              echo '<div class="alert alert-danger hiden">';
              echo session()->get('pesan');
              echo '</div>';
            }
            ?>

            <form action="<?= base_url('ceklogin') ?>" method="post">
              <div class="form-group">
                <label>Username</label>
                <input name="username" class="form-control" placeholder="Username">
                <p class="text-danger"><?= $validasi->getError('username') ?></p>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password">
                <p class="text-danger"><?= $validasi->getError('password') ?></p>
              </div>

              <div class="row">
                <div class="col-6">
                  <a href="<?= base_url() ?>" class="btn btn-success btn-block btn-flat">
                    <i class="fas fa-globe"></i> Website
                  </a>
                </div>
                <div class="col-6">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">
                    <i class="fas fa-sign-in-alt"></i> Login
                  </button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

  <script>
    window.setTimeout(function() {
      $(".hiden").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);
  </script>
</body>
</html>
