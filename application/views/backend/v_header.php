      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><b>Admin</b>WEB</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <?php
                $id_admin=$this->session->userdata('idadmin');
                $q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
                $c=$q->row_array();
              ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url().'assets/images/'.$c['photo'];?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $c['nama'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url().'assets/images/'.$c['photo'];?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $c['nama'];?>
                      <?php if($c['level']=='1'):?>
                        <small>Administrator</small>
                      <?php else:?>
                        <small>Operator</small>
                      <?php endif;?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo base_url().'administrator/logout'?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>