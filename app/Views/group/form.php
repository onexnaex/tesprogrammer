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
        <form role="form" method="post" action="<?php echo site_url($controller.'/save');?>" >
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
            <input type="hidden" name="id" value="<?php echo $model->id;?>">
            <div class="row mb-3">
                <label for="group" class="col-sm-2 col-form-label">Group</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" id="group" name="group" value="<?php echo old('group',$model->group);?>" />
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



