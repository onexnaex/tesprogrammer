<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- Main content -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-9 mt-2">
              <h3 class="card-title"><?php echo $title;?></h3>
            </div>
            <div class="col-3" style="text-align:right;">
              
              <a href="<?php echo site_url($controller.'/add');?>" class="btn float-right btn-success"  title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i>   <?= lang('App.new') ?></a>
             
              <a href="<?php echo site_url($controller.'/synproduk');?>" class="btn float-right btn-warning" style="margin-right:5%;"  title="SYN Data"> <i class="fa fa-refresh"></i>  Syn Data</a>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <?php if($session->getFlashdata('success')){ ?>
        <div class="alert alert-success alert-dismissible">
            <?php echo $session->getFlashdata('success'); ?>
                </div>
          
          <?php }
          elseif($session->getFlashdata('error')){?>
           <div class="alert alert-danger alert-dismissible">
            <?php echo $session->getFlashdata('success'); ?>
                </div>
          <?php }?>
          <table id="data_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Produk</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Status</th>

                    <th></th>
                          </tr>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

<!-- /Main content -->





<?= $this->endSection() ?>
<!-- /.content -->


<!-- page script -->
<?= $this->section("pageScript") ?>
<script>
  // dataTables
  $(function() {
    var table = $('#data_table').removeAttr('width').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollY": '45vh',
      "scrollX": true,
      "scrollCollapse": false,
      "responsive": false,
      "ajax": {
        "url": '<?php echo base_url($controller . "/all") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true"
      },
      'columnDefs': [
          {
              "targets": -1, // your case first column
              "className": "text-center"
        }
      ]
    });
  });

 
  function remove(id) {
    Swal.fire({
      title: "<?= lang("App.remove-title") ?>",
      text: "<?= lang("App.remove-text") ?>",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '<?= lang("App.confirm") ?>',
      cancelButtonText: '<?= lang("App.cancel") ?>'
    }).then((result) => {

      if (result.value) {
        $.ajax({
          url: '<?php echo base_url($controller . "/remove") ?>',
          type: 'post',
          data: {
            id : id
          },
          dataType: 'json',
          success: function(response) {

            if (response.success === true) {
              Swal.fire({
                toast:true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
              })
            } else {
              Swal.fire({
                toast:false,
                position: 'bottom-end',
                icon: 'error',
                title: response.messages,
                showConfirmButton: false,
                timer: 3000
              })
            }
          }
        });
      }
    })
  }
</script>


<?= $this->endSection() ?>
