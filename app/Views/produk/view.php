<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-10 mt-2">
              <h3 class="card-title"></h3>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <?php foreach ($model as $key => $value) {?>
             
        
          <tr>
              <td style="text-align:right;width:30%;">Id</td>
              <td><?php echo $value->id_produk;?></td>
            </tr>
            <tr>
              <td style="text-align:right;">Produk</td>
              <td><?php echo $value->nama_produk;?></td>
            </tr>
            <tr>
              <td style="text-align:right;">Harga</td>
              <td><?php echo $value->harga;?></td>
            </tr>
            <tr>
              <td style="text-align:right;">Kategori</td>
              <td><?php echo $value->nama_kategori;?></td>
            </tr>
            <tr>
              <td style="text-align:right;">Status</td>
              <td><?php echo $value->nama_status;?></td>
            </tr>
            <?php }?>
          </table>
          <div class="mt-2 ">
          <a href="<?php echo site_url($controller);?>" class="btn btn-warning"><span class="px-1 far fa-arrow-alt-circle-left"></span>Back</a>
          </div>
         
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

<!-- /Main content -->





<?= $this->endSection() ?>
<!-- /.content -->



