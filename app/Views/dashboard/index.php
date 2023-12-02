<?= $this->extend("layout/master") ?>
<?= $this->section("content") ?>
<?php $instansi = SiteHelper::instansi();?>
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <div style="text-align:center;">
            <img src="<?= base_url('app/logo.png') ?>" alt="<?php echo $instansi->nama_app ;?>" class="brand-image" width="128px;">
            <h1><?php echo $instansi->nama_instansi;?></h1>
            <h3><?php echo $instansi->alamat;?></h3>
            <h5><?php echo $instansi->no_telp;?></h5>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $totalproduk;?></h3>

                    <p>Total Produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo site_url('produk');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalkategori;?></h3>

                <p>Total Kategori</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('kategori');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalstatus;?></h3>

                <p>Total Status</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo site_url('status');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
</div>
<?= $this->endSection() ?>
