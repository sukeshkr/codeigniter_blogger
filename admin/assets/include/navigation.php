 <header class="main-header">

        <!-- Logo -->

        <a href="<?= CUSTOM_BASE_URL;?>welcome" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          <span class="logo-mini ad-mini-logo">
            <img src="<?php echo base_url();?>assets/dist/img/logo_icon.png" alt="User Image">     
          </span>

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg ad-lg-logo">
            <img src="<?php echo base_url();?>assets/dist/img/logo.png" alt="User Image">       
          </span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button-->

          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </a>

          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

              <!-- Messages: style can be found in dropdown.less-->

              <li class="dropdown messages-menu">

              <li class="dropdown messages-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <i class="fa fa-envelope-o"></i>

                  <span class="label label-note-ab">4</span>

                </a>

                

              </li>

              <!-- Notifications: style can be found in dropdown.less -->

              

              <!-- Tasks: style can be found in dropdown.less -->

              

              <!-- User Account: style can be found in dropdown.less -->

                  

                <li class="dropdown user user-menu">

                    <!-- Menu Toggle Button -->

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

                        <!-- The user image in the navbar-->

                        <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

                        <!-- hidden-xs hides the username on small devices so only the image appears. -->

                        <span class="hidden-xs">
                          <?php $session_data=$this->session->userdata('userAdminDetails');
                                $username=ucfirst($session_data->username);
                                print_r($username);
                          ?>      
                        </span>

                    </a>

                    <ul class="dropdown-menu">

                        <!-- The user image in the menu -->

                        <li class="user-header">

                            <img src="<?php echo base_url();?>assets/dist/img/avatar2.png" class="img-circle" alt="User Image">

                            <div class="user-nm-ab"><?php print_r($username);?></div>

                            <a class="change-pass-ab" href="<?= CUSTOM_BASE_URL .'User/changepassword'?>" class="btn-primary">Change Password</a>
                        </li>

                        <!-- Menu Footer-->

                        <li class="user-footer">

                            <div class="pull-left">
                               <a href="<?= CUSTOM_BASE_URL .'User/user_profile'?>" class="btn sign-pro-12 btn-default btn-flat">Profile</a>
                            </div>


                            <div class="pull-right">

                                <a href="<?= CUSTOM_BASE_URL;?>login/logout" class="btn sign-pro-12 btn-default btn-flat">Sign out</a>

                            </div>

                        </li>

                    </ul>

                </li>

                              <!-- Control Sidebar Toggle Button -->

              <li>

<!--                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->

              </li>

            </ul>

          </div>

        </nav>

      </header>    





<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- Sidebar user panel -->

          <div class="user-panel">





          </div>

          <!-- search form -->

          <form action="#" method="get" class="sidebar-form">

            <div class="input-group">

              <input type="text" name="q" class="form-control" placeholder="Search...">

              <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>

              </span>

            </div>

          </form>

           <?php 
            $directoryURI = $_SERVER['REQUEST_URI'];
            $path = parse_url($directoryURI, PHP_URL_PATH);
            $components = explode('/', $path);
            $first_part = strtolower($components[3]);
          ?>

          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu">

         <li class="<?php if ($first_part=="welcome") {echo "active"; } else  {echo "";}?>"><a href="<?= CUSTOM_BASE_URL;?>welcome"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

           <li class="treeview <?php if ($first_part=="category") {echo "active"; } else  {echo "";}?>">
              <a href="#">
                <i class="fa fa-folder-open-o"></i> <span>Category</span><i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>category"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>category/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
              </ul>
            </li>

         <li class="treeview <?php if ($first_part=="blog") {echo "active"; } else  {echo "";}?>">
              <a href="#">
                <i class="fa fa-folder-open-o"></i> <span>Blog</span><i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>blog"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>blog/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
              </ul>
            </li>
          
              <li class="treeview <?php if ($first_part=="cart_banner") {echo "active"; } else  {echo "";}?>">
              <a href="#">
                <i class="fa fa-image"></i> <span>Banner</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>banner"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>cart_banner/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
              </ul>
            </li>

                <li class="treeview <?php if ($first_part=="banner-bottom") {echo "active"; } else  {echo "";}?>">
              <a href="#">
                <i class="fa fa-image"></i> <span>Bottom Banner</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>banner-bottom"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>banner-bottom/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
              </ul>
            </li>



            
          
        <li class="<?php if ($first_part=="subscriber") {echo "active"; } else  {echo "";}?>"><a href="<?= CUSTOM_BASE_URL;?>subscriber"><i class="fa fa-save"></i><span> Subscriber</span></a></li>
   


        <li class="treeview <?php if ($first_part=="user") {echo "active"; } else  {echo "";}?>">
              <a href="#">
                <i class="fa fa-cog"></i><span>Settings</span> <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL .'user'?>"><i class="fa fa-circle-o text-aqua"></i> Admin Settings</a></li>
              <li><a href="<?= CUSTOM_BASE_URL;?>clients"><i class="fa fa-circle-o text-aqua"></i> User Settings</a></li>
              </ul>
        </li>
        
          </ul>

        </section>

        <!-- /.sidebar -->

      </aside>

