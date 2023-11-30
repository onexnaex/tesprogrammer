<!DOCTYPE html>
<html lang="en">
<!-- For RTL verison -->
<!-- <html lang="en" dir="rtl"> -->
  <head>
    <!-- icheck bootstrap -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>AdminLTE 4 | General Form Elements</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="title" content="AdminLTE 4 | General Form Elements">
<meta name="author" content="ColorlibHQ">
<meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
<!-- By adding ../../css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is light. -->
<meta name="color-scheme" content="light dark">
<!-- By adding ../../css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is dark. -->
<!-- <meta name="color-scheme" content="dark light"> -->

<!-- OPTIONAL LINKS -->

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" integrity="sha256-mUZM63G8m73Mcidfrv5E+Y61y7a12O5mW4ezU3bxqW4=" crossorigin="anonymous">

<!-- REQUIRED LINKS -->

<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>">


  </head>
  <body class="login-page">
  <?php $instansi = SiteHelper::instansi();?>
    <div class="login-box">
      <div class="login-logo">
      
       
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body text-center">

        <img src="<?= base_url('app/logo.png') ?>" alt="<?php echo $instansi->nama_app ;?>" class="brand-image" width="128px;">
         

          <form action="<?php echo site_url($controller.'/login');?>" method="post">
         <?php if($session->getFlashdata('error')){?>
           <div class="alert alert-danger alert-dismissible">
            <?php echo $session->getFlashdata('error'); ?>
                </div>
          <?php }?>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Username" name="username" id="username">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-12">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <p class="login-box-msg">Sign in to start your session</p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- OPTIONAL SCRIPTS -->

<!-- REQUIRED SCRIPTS -->

<!-- AdminLTE App -->
<?= $this->include('layout/globalscript') ?>

<!-- OPTIONAL SCRIPTS -->

<script>
 $("#username").focus();
</script>

  </body>
</html>
