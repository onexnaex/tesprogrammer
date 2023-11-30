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
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="<?php echo old('username',$model->username);?>" placeholder="Enter username" >
              </div>
              <div class="form-group">
                <label for="username">Group</label>
                <select name="fk_group" id="fk_group" class="form-control">
                  <?php foreach ($group as $key => $value) { ?>
                    <option value="<?php echo $value->id;?>" <?php if($value->id== old('fk_group',$model->fk_group)) echo "selected"; ?>><?php echo $value->group;?></option>
                  <?php }?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
              </div>
              <div class="form-group">
                <label for="Confirmpassword">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password">
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="<?php echo old('email',$model->email);?>" placeholder="Enter email" >
            </div>
            <div class="form-group">
              <label for="no_telp">No Telp</label>
              <input type="no_telp" name="no_telp" class="form-control" id="no_telp" value="<?php echo old('no_telp',$model->no_telp);?>" placeholder="Enter Telp">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
              <div class="custom-file">
                  <input type="file" class="custom-file-input" id="avatar" name="avatar">
                </div>
              </div>
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



