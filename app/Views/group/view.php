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
          <tr>
              <td style="text-align:right;">Id</td>
              <td><?php echo $model->id;?></td>
            </tr>
            <tr>
              <td style="text-align:right;">Group</td>
              <td><?php echo $model->group;?></td>
            </tr>
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



