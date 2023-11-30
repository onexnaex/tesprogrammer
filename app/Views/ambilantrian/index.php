
<?= $this->extend("layout/antrian") ?>

<?= $this->section("content") ?>
<style>
    .tombol{
        background-color: green;
        color:white;
    }
    .tombol:hover {
        background-color: red;
        cursor: pointer;
    }
</style>
<a href="http://"></a>
<div style="margin-top: 10%;width:50%;margin-left:25%;">
        <div class="row">
        <?php foreach($loket as $rowloket){?>
          <div class="col-lg-4 col-6" >
            <!-- small box -->
            <div class="small-box tombol" style="text-align:center;"  ondragenter="alert('masuk');" ondragleave="alert('keluar');">
              <div class="inner">
                <h4><?php echo $rowloket->loket;?></h4>

                <p>Ambil Antrian</p>
              </div>
             
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
        <?php }?>
         
        
        </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("pageScript") ?>
    <script>
    /*    $(".tombol").mouseenter(function(){
           $(".tombol").addClass("bg-danger");
        });
        $(".tombol").mouseleave(function(){
            $(".tombol").removeClass("bg-danger");
        });
      */ 
    </script>
<?= $this->endSection() ?>

