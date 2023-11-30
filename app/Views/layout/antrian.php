<!DOCTYPE html>
<!--<html dir="rtl" lang="ar">-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= 'ADEL CCG - ' . esc($title) ?></title>
    <meta name="description" content="Garment Factory Process">
    <meta name="keyword" content="garment,factory,khonkaen,ocomshop">
    <meta name="author" content="ocomshop">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= csrf_meta()?>

    <link rel="stylesheet" href="<?= base_url("asset/plugins/fontawesome-free/css/all.min.css") ;?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("asset/css/adminlte.min.css") ;?>">
   <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="layout-fixed light-mode">
      <?php $instansi = SiteHelper::instansi();?>  
<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
    <div class="navbar-brand">
        <div class="user-block">
            <img class="img-circle elevation-3" src="<?php echo base_url('app/logo.png');?>" alt="user image"  width="64px">
            <span class="username" style="margin-left:75px;">
                <a href="#"><?php echo $instansi->nama_instansi ;?></a>
            </span>
            <span class="description" style="margin-left:75px;">
            <span><?php echo $instansi->alamat;?></span> <br>
            <span><?php echo $instansi->no_telp;?></span> 
            </span>
        </div>  
    </div>
   
        <div class="col-md-12">
            <div class="row">
           <div class="col-md-10"></div>
           <div class="col-md-2">
            <span class="description" >
             <span style="text-align: right;"><?php echo date('d-m-Y');?></span>    <br>
             <span style="text-align: right;"><?php echo date('H:i:s');?></span>
            </span>
           </div>
           </div>
        </div>

    <div class="form-inline mt-2 mt-md-0"><?php echo $instansi->deskripsi;?></div>
</nav>

        <section class="content">
            <div class="container-fluid">
           
                <?= $this->renderSection("content") ?>
              
            </div><!-- /.container-fluid -->
        </section>
<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">

    <div class="col-md-12">
    <div class="row">
    <div class="col-md-12" style="text-align: center;" >
        tes
        </div>

    
</div>
    </div>
</nav>
<script src="<?= base_url('asset/js/jquery.min.js') ?>"></script>
<?= $this->renderSection("pageScript") ?>
</body>
</html>