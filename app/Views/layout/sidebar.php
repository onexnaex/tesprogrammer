<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('dashboard');?>" class="brand-link">
      <?php $instansi = SiteHelper::instansi();?>
      <img src="<?php echo base_url('app/logo.png');?>" alt="<?php echo $instansi->nama_app ;?> Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $instansi->nama_app ;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php $menu = SiteHelper::menu();
        foreach ($menu as $key => $value) {
          $cekchild = SiteHelper::cekChild($value->id);
          if($value->menu==$title)
          {
            $active = "active";
          }
          else
          {
             $active = "";
          }
          if($cekchild>0)
          {
            $has = "has-treeview";
          }
          else
          {
            $has ="";
          }
          ?>
        <li class="nav-item <?php echo $has;?>">
              <a href="<?php echo site_url($value->url);?>" class="nav-link <?php echo $active;?>">
                <i class="nav-icon <?php echo $value->icon;?>"></i>
                <p>
                  <?php echo $value->menu ?>
                  <?php if ($cekchild > 0) { ?>
                    <i class="end fas fa-angle-left"></i>
                  <?php }?>
                </p>
              </a>
              <?php if ($cekchild > 0) { ?>
                <ul class="nav nav-treeview">
                  <?php $childmenu = SiteHelper::childmenu($value->id); ?>
                  <?php foreach ($childmenu as $key => $value) { 
                      if($value->menu==$title)
                      {
                        $active = "active";
                      }
                      else
                      {
                         $active = "";
                      }
                    ?>
                    <li class="nav-item">
                    <a href="<?php echo $value->url; ?>" class="nav-link <?php echo $active;?>">
                      <i class="nav-icon <?php echo $value->icon; ?>"></i>
                      <p><?php echo $value->menu; ?></p>
                    </a>
                  </li>
                  <?php }?>
                </ul>
              <?php }?>
        </li>  
        <?php }?>
        <li class="nav-header">Setting</li>
        <?php $menu = SiteHelper::childmenu(1);?>
        <?php foreach ($menu as $key => $value) { 
          if($value->menu==$title)
          {
            $active = "active";
          }
          else
          {
             $active = "";
          }
          ?>
          <li class="nav-item">
            <a href="<?php echo site_url($value->url);?>" class="nav-link <?php echo $active;?>">
              <i class="nav-icon <?php echo $value->icon;?> "></i>
              <p class="text"><?php echo $value->menu;?></p>
            </a>
          </li>
        <?php }?>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>