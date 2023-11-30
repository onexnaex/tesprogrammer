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
            <div class="col-md-6">
              <input type="hidden" name="id" value="<?php echo $model->id;?>">
                <div class="form-group">
                  <label for="loket">Loket</label>
                  <input type="text" name="loket" class="form-control" id="loket" value="<?php echo old('loket',$model->loket);?>" placeholder="Enter Loket" >
                </div>
                <div class="form-group">
                  <label for="username">Suara</label>
                  <input type="text" name="suara" id="suara" class="form-control">
                </div>
                <div class="form-group">
                  <label for="aktif">Aktif</label>
                  <?php $aktif = array(1=>'Aktif',0=>'Non Aktif');?>
                  <select class="form-control" name="aktif" id="aktif">
                    <?php foreach ($aktif as $key => $value) {?>
                      <option value="<?php echo $key;?>" <?php if($key==old('aktif',$model->aktif)) echo "selected";?>><?php echo $value;?></option>
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



