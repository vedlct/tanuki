<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>

    <?php include ('head.php') ?>
    <title>Tanuki- Japanis Food</title>
    <style>
        label {
            margin-top: 20px;
        }
    </style>

</head>

<body>

<!--[if lte IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

<div id="preloader">
    <div class="sk-spinner sk-spinner-wave" id="status">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div><!-- End Preload -->

<!-- Header ================================================== -->
<?php include ('menu.php') ?>
<!-- End Header =============================================== -->

<!-- SubHeader =============================================== -->
<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url()?>public/img/sub_header_2.jpg" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id=""><img src="<?php echo base_url()?>public/img/tanuki.png"  height="150px" alt=""></div>
            <!--                     <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> (<small><a href="<?php echo base_url() ?>feedback">Read Items reviews</a></small>)</div>-->
            <!--            <h1 style="font-weight:bold; color:#ED1C24;">Tanuki</h1>-->
            <div><em>Japanese Restaurant</em></div>
            <div><i class="icon_pin"></i> 44260 Ice Rink Plz
                Ste 118 Ashburn, VA 20147 </div>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

<div id="position">
    <div class="container">
        <ul>
            <li><a href="<?php echo  base_url()?>">Home</a></li>
            <li><a href="#0">Tanuki's Dishes</a></li>
            <li>Page active</li>
        </ul>

    </div>
</div><!-- Position -->

<!-- Content ================================================== -->
<div class="container-fluid margin_60_35">
    <div  class="row">

        <?php if ($this->session->flashdata('errorMessage')!=null){?>
            <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
        <?php }
        elseif($this->session->flashdata('successMessage')!=null){?>
            <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
        <?php }?>

        <div align="center" style="color: red" class="login_icon"><i class="icon_key_alt"></i></div>
        <div class="col-md-2"></div>

        <div align="center"  class="box_style_2 col-md-8">

            <h2>Change Password</h2>
            <form method="post" action="<?php echo base_url()?>Login/updateNewPass/<?php echo $requestId?>" onsubmit="return changePass()">

                <div class="form-group col-md-12">
                    <div class="col-md-3">
                        <label>New Password</label>
                    </div>
                    <div class="col-md-9">
                        <p><font color="red"> <?php echo form_error('password'); ?></font></p>
                        <input type="password" class="form-control" maxlength="255" value="<?php echo set_value('password'); ?>" name="password" required placeholder="Password"  id="password">
                    </div>
                </div>
                <div class="form-group col-md-12">
                <div class="col-md-3">
                    <label>Confirm New Password</label>
                </div>
                <div class="col-md-9">
                    <p><font color="red"> <?php echo form_error('conPassword'); ?></font></p>
                    <input type="password" class="form-control" maxlength="255" value="<?php echo set_value('conPassword'); ?>" name="conPassword" required placeholder="Confirm password"  id="conPassword">
                </div>
                </div>
                <br><br>

                <div class="form-group">

                    <input type="submit" value="Submit" class="btn btn-primary">
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>


    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
<?php include ('footer.php') ?>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<?php include ('login_logout.php')?>


<!-- COMMON SCRIPTS -->
<?php include ('js.php')?>

</body>
</html>

<script>

    function changePass() {

       var newpass =document.getElementById('password');
       var connewpass =document.getElementById('conPassword');
       if (newpass.value == ""){
           alert('new password field can not be empty');
           return false;
       }
        if ((newpass.value).length < 255 ){
            alert('new password field can not be greater than 255 charecter ');
            return false;
        }
       if (connewpass.value == ""){
            alert('Confirm new password field can not be empty');
            return false;
       }
       if (connewpass.value != newpass.value){
            alert('new password and confirm new password must be matched!);
            return false;
       }


    }



</script>