<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-10 mt-2">
            <h3 class="card-title"><?php echo $title;?></h3>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <form role="form"  method="post" action="<?php echo site_url($controller.'/save');?>">
        <div class="card-body">
        
       <?php if($session->getFlashdata('success')){ ?>
        <div class="alert alert-success alert-dismissible">
            <?php echo $session->getFlashdata('success'); ?>
                </div>
          
          <?php }
          elseif($session->getFlashdata('error')){?>
           <div class="alert alert-danger alert-dismissible">
            <?php $alert=$session->getFlashdata('error'); ?>
            <?php foreach ($alert as $key => $value) {
                echo $value."<br/>";
            }?>
                </div>
          <?php }?>
       

          <div class="row">
            <div class="col-md-12">
            <input type="hidden" name="id" value="<?php echo $model->id_produk;?>">
              <div class="form-group">
                <label for="produk">Produk</label>
                <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="<?php echo old('nama_produk',$model->nama_produk);?>" placeholder="Enter Produk Name" >
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" id="harga" value="<?php echo old('harga',$model->harga);?>">
              </div>
              <div class="form-group">
                <label for="Kategori">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                  <?php foreach ($kategori as $key => $value) { ?>
                    <option value="<?php echo $value->id_kategori;?>" <?php if($value->id_kategori== old('id_kategori',$model->kategori_id)) echo "selected"; ?>><?php echo $value->nama_kategori;?></option>
                  <?php }?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="Status">Status</label>
                <select name="status_id" id="status_id" class="form-control">
                  <?php foreach ($status as $key => $value) { ?>
                    <option value="<?php echo $value->id_status;?>" <?php if($value->id_status== old('id_status',$model->status_id)) echo "selected"; ?>><?php echo $value->nama_status;?></option>
                  <?php }?>
                  
                </select>
              </div>
              
         
          
          </div>
          </div>
        </div>
        
        <div class="card-footer">
          <a href="<?php echo site_url($controller);?>" class="btn btn-warning">Cancel</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

<!-- /Main content -->





<?= $this->endSection() ?>
<!-- /.content -->



