<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
                <div class="card-body box-profile">
                  <div class="text-center">
                  <?php if (!empty($session->get('ava')))
                        {
                          $ava = base_url('ava/'.$session->get('ava'));
                        }
                        else
                        {
                          $ava =base_url('ava/avatar.png');
                        }
                  ?>

                    <img class="profile-user-img img-fluid img-circle"
                        src="<?php echo $ava;?>"
                        alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?php echo $session->get('usr');?></h3>

                  <a href="<?php echo site_url('users/logout');?>" class="btn btn-primary btn-block"><b>Log Out</b></a>
                </div>
          
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

