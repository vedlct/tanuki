<!-- start header -->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo">
            <a href="Home">
                <img src="<?php echo base_url()?>images/logo/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- logo end -->
<!--        <form class="search-form-opened" action="#" method="GET">-->
<!--            <div class="input-group">-->
<!--                <input type="text" class="form-control" placeholder="Search..." name="query">-->
<!--                <span class="input-group-btn">-->
<!--                          <a href="javascript:;" class="btn submit">-->
<!--                             <i class="icon-magnifier"></i>-->
<!--                           </a>-->
<!--                        </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- start mobile menu -->
        <a style="margin-top: 50px" href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- end mobile menu -->
        <!-- start header menu -->

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">


                <!-- start manage user dropdown -->

                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
<!--                        <img alt="" class="img-circle " src="--><?php //echo base_url()?><!--public/img/dp.svg" />-->
                        <span class="username username-hide-on-mobile"><?php echo $this->session->userdata('name')?></span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li>
                            <a href="<?php echo base_url()?>login/logout">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- end manage user dropdown -->
            </ul>
            <?php if ($this->session->userdata('userType')!="Deli"){?>
            <a href="<?php echo base_url()?>../Items"> <button class="btn btn-skype" style="margin-top: 10px; float: right">Place Order</button></a>
            <?php } ?>
        </div>
    </div>
</div>
<!-- end header -->