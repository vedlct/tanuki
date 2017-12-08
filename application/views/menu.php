<!-- Header ================================================== -->
    <header>
    <div class="container-fluid">
        <div class="row">
            <div class="col--md-4 col-sm-4 col-xs-4">
                <a href="<?php echo base_url()?>" id="logo">
                <img style="margin-top:-15px; padding: 0px" src="<?php echo base_url()?>public/img/logo.png" width="70"  alt="" data-retina="true" class="hidden-xs">
                <img src="<?php echo base_url()?>public/img/logo_mobile.png" width="50" height="23" alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm">
                </a>
            </div>
            <nav class="col--md-8 col-sm-8 col-xs-8">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
            <div class="main-menu">
                <div id="header_menu">         
                    <img src="<?php echo base_url()?>public/img/logo.png" width="190" height="23" alt="" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                <ul>
                    <li>
                    	<a href="<?php echo base_url()?>">Menu</a>
                    </li>

                    <?php if($this->session->userdata('loggedin')=="true"){
                    $username=$this->session->userdata('name');
                    $userId=$this->session->userdata('id');
                    $usertype=$this->session->userdata('userType');
                    if($usertype=="Admin"){

                    ?>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $username ?>
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url()?>admin/Admin/Home">Admin Panel</a></li>
                                    <li><a href="<?php echo base_url()?>Login/logout">Log Out</a></li>

                                </ul>
                            </div>
                        </li>

                    <?php }else{?>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $username ?>
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url()?>Profile/showuser/<?php echo $userId; ?>">Profile</a></li>
                                    <li><a href="<?php echo base_url()?>Userorder/userOrders/<?php echo $userId; ?>">My Order</a></li>
                                    <li><a href="<?php echo base_url()?>Login/logout">Log Out</a></li>

                                </ul>
                            </div>
                        </li>
                    <?php }}else{?>
                    <button class="btn btn-sm btn-info" href="#0" data-toggle="modal" data-target="#login_2">User Login</button>
                     <a href="<?php echo base_url()?>Login/showRegitration"><button class="btn btn-sm btn-success">User Register</button></a>
                    <?php }?>
                </ul>
            </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div><!-- End container -->
    </header>
	<!-- End Header =============================================== -->