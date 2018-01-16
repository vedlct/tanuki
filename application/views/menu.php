<!-- Header ================================================== -->
<header style="z-index: 1111">
    <div  class="container-fluid">
        <div class="row">
            <div class="col--md-4 col-sm-4 col-xs-4">
                <a href="<?php echo base_url()?>Items" id="logo"  style="display: none">
                    <img style="margin-top:-14px; padding: 0px" src="<?php echo base_url()?>public/img/logo.png" width="70"  alt="" data-retina="true" class="hidden-xs">
                    <img src="<?php echo base_url()?>public/img/logo_mobile.png" width="32" height="25" alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm">
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

                        <li>


                            <button class="btn btn-sm default" href="#0"  onclick="selectid1(this)" >Restaurant Review</button>

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

<div id="myModal" class="modal1">
    <br/><br/><br/>
    <!-- Modal content -->
    <div class="modal1-content">
        <span class="close">×</span>

        <div id="txtHint"></div>

    </div>


</div>



<script>
var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];

function selectid1(x)
{

    $.ajax({
        type:'POST',
        url:'<?php echo base_url("Feedback/index" )?>',
        data:{},
        cache: false,
        success:function(data)
        {
            $('#txtHint').html(data);
        }

    });
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>
